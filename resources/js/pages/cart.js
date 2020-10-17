import 'slider-pro';
import 'owl.carousel/dist/owl.carousel.min';
import RunCommon from './../common/run_common';
import toast  from 'toastr';
import 'jquery-modal'
import html2canvas from 'html2canvas';
import jsPDF from  'jsPDF'
var Cart = {
    init(){
        this.deleteItemTransaction();
        this.jsIncreaseQty();
        this.jsReductionQty();
        this.showInvoiceTransaction();
        this.exportPdfTransaction();
        this.showCancelOrder();
        this.processCancelOrder();
    },

    exportPdfTransaction()
    {
        $(".js-export-pdf").click(function (event) {
            event.preventDefault();
            let html = `<i class="fa fa-spin fa-spinner" aria-hidden="true"></i> Đang xử lý`;
            let $this = $(this);
            $this.html(html);
            const filename  = 'hoa-don-mua-hang.pdf';

            html2canvas(document.querySelector('#wrapper'),
                {scale: 1}
            ).then(canvas => {
                let pdf = new jsPDF('p', 'mm', 'A4');
                pdf.addImage(canvas.toDataURL('image/png'), 'PNG',0,0,0,0);
                pdf.save(filename);
                $this.html('Export PDF')
            });
        })
    },
    showInvoiceTransaction()
    {
        $(".js-show-invoice_transaction").click( function(event){
            event.preventDefault();
            let $this = $(this);
            let URL = $this.attr('href');

            $.ajax({
                url: URL,
                async: false,
            }).done(function( results ) {
                $("#popup-transaction .content").html(results.html);
                $("#popup-transaction").modal({
                    escapeClose: false,
                    clickClose: false,
                    showClose: false
                });
            });
        });
    },

    showCancelOrder() {
        $(".btn-cancel-order").click( function(event){
            event.preventDefault();
            var idTransaction = $(this).data('transaction');
            var route = $(this).data('href');
            $("#popup-cancel").modal({
                escapeClose: false,
                clickClose: false,
                showClose: false
            });
            $('#id_update').val(idTransaction);
            $('#url_route').val(route);
        });
    },

    processCancelOrder() {
        $(".js-cancel-order").click( function(event){
            event.preventDefault();
            var contentReason =$('input[name="tst_reason"]:checked').val();
            var route = $('#url_route').val();
            $.ajax({
                type : 'post',
                url : route,
                data: {
                    'tst_reason': contentReason,
                },
                success : function(response){
                    var data = JSON.parse(response);
                   if(data.success == "success") {
                       location.reload();
                       toast.success("Hủy đơn hàng thành công");
                   }
                } ,
                error(jq, status , throwE){
                    console.log('error cancel order');
                }
            });
        });
    },

    deleteItemTransaction()
    {
        $(".js-delete-item").click( function(event){
            event.preventDefault();
            let $this = $(this);
            let url    = $this.attr('href');

            if(url) {
                $.ajax({
                    url: url,
                }).done(function( results ) {
                    toast.success(results.messages);
                    $this.parents('tr').remove();
                    $("#sub-total").text(results.totalMoney+ " đ");
                });
            }
        })

    },
    jsReductionQty()
    {
        $('.js-reduction').click(function (event) {
            let $this  = $(this);
            let $input = $this.parent().prev();
            let number = parseInt($input.val());
            if (number <= 1) {
                toast.warning("Số lượng sản phẩm phải >= 1");
                return false;
            }
            let URL       = $this.parent().attr('data-url');
            let productID = $this.parent().attr("data-id-product");
            number = number - 1;
            $.ajax({
                url: URL,
                data: {
                    qty        : number,
                    idProduct  : productID
                }
            }).done(function( results ) {
                if (typeof results.error != "undefined") {
                    toast.warning(results.messages);
                    return false;
                }

                if (typeof results.totalMoney !== "undefined") {
                    let shipMoney = 20000;
                    let totalMoney = results.totalMoney;
                    // let totalConvert =  parseInt(totalMoney.replaceAll(',','')) + parseInt(shipMoney);
                    let totalConvert =  parseInt(totalMoney.replaceAll(',',''));
                    let money = totalConvert.toLocaleString('it-IT');

                    $input.val(number);
                    $("#subtotal").text(money+ " đ");
                    $("#subtotalend").text(money+ " đ");
                    toast.success(results.messages);
                    $this.parents('tr').find(".js-total-item").text(results.totalItem +' đ');
                }else {
                    $input.val(number + 1);
                }
            });
        })
    },

    jsIncreaseQty()
    {
        $('.js-increase').click(function (event) {
            event.preventDefault();
            let $this = $(this);
            let $input = $this.parent().prev();
            let number = parseInt($input.val());
            if (number >= 10) {
                toast.warning("Mỗi sản phẩm chỉ được mua tối đa số lượng 10 lần / 1 lần mua");
                return false;
            }

            let price = $this.parent().attr('data-price');
            let URL = $this.parent().attr('data-url');
            let productID = $this.parent().attr("data-id-product");

            number = number + 1;
            $.ajax({
                url: URL,
                data: {
                    qty        : number,
                    idProduct  : productID
                }
            }).done(function( results ) {
                if (typeof results.error != "undefined") {
                    toast.warning(results.messages);
                    return false;
                }
                if (typeof results.totalMoney !== "undefined") {
                    let shipMoney = 20000;
                    let totalMoney = results.totalMoney;
                    // let totalConvert =  parseInt(totalMoney.replaceAll(',','')) + parseInt(shipMoney);
                    let totalConvert =  parseInt(totalMoney.replaceAll(',',''));
                    let money = totalConvert.toLocaleString('it-IT');

                    $("#subtotal").text(totalMoney + " đ");
                    $("#subtotalend").text(money + " đ");
                    $input.val(number);
                    toast.success(results.messages);
                    $this.parents('tr').find(".js-total-item").text(results.totalItem +' đ');
                }else {
                    $input.val(number - 1);
                }
            });
        })
    }

};
$(function () {
    Cart.init();
    RunCommon.init();
    $(".js-menu-cate").mouseenter(function(){
        $("#menu-main").show();
    })
});
