<?php

use Carbon\Carbon;
use Illuminate\Support\Arr;
use function foo\func;
use App\Models\Product;
use App\Models\FlashSale;
use App\Models\FlashSaleProduct;

if (!function_exists('upload_image')) {
    /**
     * @author chungdd
     * @param $file [tên file trùng tên input]
     * @param array $extend [ định dạng file có thể upload được]
     * @return array|int [ tham số trả về là 1 mảng - nếu lỗi trả về int ]
     */
    function upload_image($file, $folder = '', array $extend = array())
    {
        $code = 1;
        // lay duong dan anh
        $baseFilename = public_path() . '/uploads/' . $_FILES[$file]['name'];

        // thong tin file
        $info = new SplFileInfo($baseFilename);

        // duoi file
        $ext = strtolower($info->getExtension());

        // kiem tra dinh dang file
        if (!$extend)
            $extend = ['png', 'jpg', 'jpeg', 'webp'];

        if (!in_array($ext, $extend))
            return $data['code'] = 0;

        // Tên file mới
        $nameFile = trim(str_replace('.' . $ext, '', strtolower($info->getFilename())));
        $filename = date('Y-m-d__') . \Illuminate\Support\Str::slug($nameFile) . '.' . $ext;;

        // thu muc goc de upload
        $path = public_path() . '/uploads/' . date('Y/m/d/');
        if ($folder)
            $path = public_path() . '/uploads/' . $folder . '/' . date('Y/m/d/');

        if (!\File::exists($path))
            mkdir($path, 0777, true);

        // di chuyen file vao thu muc uploads
        move_uploaded_file($_FILES[$file]['tmp_name'], $path . $filename);

        $data = [
            'name'     => $filename,
            'code'     => $code,
            'path'     => $path,
            'path_img' => 'uploads/' . $filename
        ];

        return $data;
    }
}

if (!function_exists('get_client_ip')) {
    /**
     * @author chungdd
     * [get_client_ip description]
     * @return [type] [description]
     */
    function get_client_ip()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
    }
}


if (!function_exists('pare_url_file')) {
    /**
     * @author chungdd
     * [pare_url_file description]
     * @param  [type] $image  [description]
     * @param  string $folder [description]
     * @return [type]         [description]
     */
    function pare_url_file($image, $folder = '')
    {
        if (!$image) {
            return '/images/no-image.jpg';
        }
        $explode = explode('__', $image);

        if (isset($explode[0])) {
            $time = str_replace('_', '/', $explode[0]);
            return '/uploads' . $folder . '/' . date('Y/m/d', strtotime($time)) . '/' . $image;
        }
    }
}

if (!function_exists('device_agent')) {
    /**
     * @author chungdd
     * [device_agent description]
     * @return [type] [description]
     */
    function device_agent()
    {
        $agent = new Jenssegers\Agent\Agent();

        if ($agent->isMobile()) {
            return 'mobile';
        } elseif ($agent->isDesktop()) {
            return 'desktop';
        } elseif ($agent->isTablet()) {
            return 'tablet';
        }
    }
}

if (!function_exists('number_price')) {
    /**
     * @author chungdd
     * [number_price description]
     * @param  [type]  $price [description]
     * @param  integer $sale  [description]
     * @return [type]         [description]
     */
    function number_price($price, $sale = 0)
    {
        if ($sale == 0) {
            return $price;
        }

        $price = ((100 - $sale) * $price) / 100;

        return $price;
    }
}

if (!function_exists('get_data_user')) {
    /**
     * @author chungdd
     * [get_data_user description]
     * @param  [type] $type  [description]
     * @param  string $field [description]
     * @return [type]        [description]
     */
    function get_data_user($type, $field = 'id')
    {
        return Auth::guard($type)->user() ? Auth::guard($type)->user()->$field : '';
    }
}

if (!function_exists('get_name_short')) {
    /**
     * @author chungdd
     * [get_name_short description]
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    function get_name_short($name)
    {
        if ($name == '') return "[N\A]";

        $name      = trim($name);

        $arrayName = explode(' ', $name,2);
        $string = '';
        if (count($arrayName)) {
            foreach ($arrayName as $item) {
                $string .= mb_substr($item,0,1);
            }
        }

        return $string;
    }
}

if (!function_exists('detectDevice'))
{
    /**
     * @author chungdd
     * [detectDevice description]
     * @return [type] [description]
     */
    function detectDevice()
    {
        $instance = new Jenssegers\Agent\Agent();

        return $instance;
    }
}

if (!function_exists('get_agent'))
{
    /**
     * @author chungdd
     * [get_agent description]
     * @return [type] [description]
     */
    function get_agent()
    {
        return [
            'device'       => detectDevice()->device(),
            'platform'     => $platform = detectDevice()->platform(),
            'platform_ver' => detectDevice()->version($platform),
            'browser'      => $browser = detectDevice()->browser(),
            'browser_ver'  => detectDevice()->version($browser),
            'time'         => Carbon::now()
        ];
    }
}

if( !function_exists('get_time_login'))
{
    /**
     * @author chungdd
     * [get_time_login description]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    function get_time_login($data)
    {
        $data = json_decode($data, true);
        return Arr::last($data);
    }
}

if (!function_exists('check_admin'))
{
    /**
     * @author chungdd
     * [check_admin description]
     * @return [type] [description]
     */
	function check_admin()
	{
		return get_data_user('admins','level') == 1 ? true : false;
	}
}

if (!function_exists('create_time_carbon')) {
    /**
     * @author chungdd
     * [create_time_carbon description]
     * @param  [type] $time [description]
     * @return [type]       [description]
     */
	function create_time_carbon($time) {
		return \Illuminate\Support\Carbon::createFromTimeString($time);
	}
}


if (! function_exists('home_discounted_base_price')) {
    /**
     * @author chungdd
     * [home_discounted_base_price description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    function home_discounted_base_price($id)
    {
        $product = Product::findOrFail($id);
        $price = $product->pro_price;

        $flash_deal = \App\Models\FlashSale::where('fs_status', 1)->first();

        if ($flash_deal != null && strtotime(date('d-m-Y')) >= $flash_deal->fs_start_date && strtotime(date('d-m-Y')) <= $flash_deal->fs_end_date && FlashSaleProduct::where('fsp_flash_deal_id', $flash_deal->id)->where('fsp_product_id', $id)->first() != null) {

            $flash_deal_product = FlashSaleProduct::where('fsp_flash_deal_id', $flash_deal->id)->where('fsp_product_id', $id)->first();

            if($flash_deal_product->fsp_discount_type == 'percent'){
                $price -= ($price*$flash_deal_product->fsp_discount)/100;
            }
        }
        else{
           $price -= ($price*$product->pro_sale)/100;
        }
        return number_format($price,0,',','.');
    }
}


if (! function_exists('home_discounted_base_sale')) {
   /**
    * @author chungdd
    * [home_discounted_base_sale description]
    * @param  [type] $id [description]
    * @return [type]     [description]
    */
    function home_discounted_base_sale($id)
    {
        $product = Product::findOrFail($id);
       

        $flash_deal = \App\Models\FlashSale::where('fs_status', 1)->first();

        if ($flash_deal != null && strtotime(date('d-m-Y')) >= $flash_deal->fs_start_date && strtotime(date('d-m-Y')) <= $flash_deal->fs_end_date && FlashSaleProduct::where('fsp_flash_deal_id', $flash_deal->id)->where('fsp_product_id', $id)->first() != null) {

            $flash_deal_product = FlashSaleProduct::where('fsp_flash_deal_id', $flash_deal->id)->where('fsp_product_id', $id)->first();

            $sale = $flash_deal_product->fsp_discount;
        } else {
             $sale = $product->pro_sale;
        }
        return $sale;
    }
}


// if (! function_exists('home_discounted_price')) {
//     function home_discounted_price($id)
//     {
//         $product = Product::findOrFail($id);
//         $lowest_price = $product->unit_price;
//         $highest_price = $product->unit_price;

//         $flash_deal = \App\FlashDeal::where('status', 1)->first();
//         if ($flash_deal != null && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date && FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $id)->first() != null) {
//             $flash_deal_product = FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $id)->first();
//                 if($flash_deal_product->discount_type == 'percent'){
//                     $lowest_price -= ($lowest_price*$flash_deal_product->discount)/100;
//                     $highest_price -= ($highest_price*$flash_deal_product->discount)/100;
//                 }
//                 elseif($flash_deal_product->discount_type == 'amount'){
//                     $lowest_price -= $flash_deal_product->discount;
//                     $highest_price -= $flash_deal_product->discount;
//                 }
//         }
//         else{
//             if($product->discount_type == 'percent'){
//                 $lowest_price -= ($lowest_price*$product->discount)/100;
//                 $highest_price -= ($highest_price*$product->discount)/100;
//             }
//             elseif($product->discount_type == 'amount'){
//                 $lowest_price -= $product->discount;
//                 $highest_price -= $product->discount;
//             }
//         }

//          return format_price($lowest_price).' - '.format_price($highest_price);
//     }
// }
