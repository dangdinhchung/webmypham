<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequestProduct;
use App\Http\Requests\UserRequestStoreShop;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\InvoiceEntered;
use App\Models\Keyword;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Shop;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SellerController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        return view('user.seller');
    }

    /**
     * @param UserRequestStoreShop $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequestStoreShop $request) {
        $user = \Auth::user();
        $user->user_type = "seller";
        $user->save();

        //insert seller
        $seller = new Seller();
        $seller->user_id = $user->id;
        $seller->save();

        //insert shop
        if(Shop::where('user_id', $user->id)->first() == null){
           Shop::create([
                'sp_user_id'     => $user->id,
                'sp_name'     =>  $request->name,
                'sp_address'      => $request->address,
                'sp_slug'  => Str::slug($request->name)
            ]);

            \Session::flash('toastr', [
                'type'    => 'success',
                'message' => 'Tạo shop thành công!'
            ]);
            return redirect()->back();
        }
        \Session::flash('toastr', [
            'type'    => 'error',
            'message' => 'Tạo shop thất bại!'
        ]);
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request) {
        $data = $request->except('_token','sp_logo');
        $shop = Shop::find(\Auth::id());
        $shop->update($data);

        \Session::flash('toastr', [
            'type'    => 'success',
            'message' => 'Cập nhật thành công'
        ]);

        return redirect()->back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail() {
        $idUser = Auth::user()->id;
        $detailShop = Shop::where('sp_user_id',$idUser)->get();
        return view('user.update_shop',compact('detailShop'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function product(Request $request) {
        $products  = Product::where('pro_user_id',Auth::user()->id)->with('category:id,c_name');
        $products   = $products->orderByDesc('id')->paginate(10);
        return view('user.seller_product',compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {
        $categories   = Category::all();
        $attributeOld = [];
        $keywordOld   = [];

        $attributes = $this->syncAttributeGroup();
        $keywords   = Keyword::all();
        return view('user.seller_product_create',compact('categories', 'attributeOld', 'attributes', 'keywords', 'keywordOld'));
    }

    public function storeSeller(AdminRequestProduct $request) {
        $data                      = $request->except('_token', 'pro_avatar', 'attribute', 'keywords', 'file', 'pro_sale');
        $data['pro_slug']          = Str::slug($request->pro_name);
        $data['pro_number'] = $request->pro_number_import;
        $data['pro_user_id'] = \Auth::user()->id;
        $data['created_at']        = Carbon::now();
        if ($request->pro_sale) {
            $data['pro_sale'] = $request->pro_sale;
        }

        if($request->pro_added_by) {
            $data['pro_added_by'] =  $request->pro_added_by;
        }

        if ($request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if ($image['code'] == 1)
                $data['pro_avatar'] = $image['name'];
        }

        $id = Product::insertGetId($data);

        if ($id) {
            $this->syncAttribute($request->attribute, $id);
//            $this->syncKeyword($request->keywords, $id);
            if ($request->file) {
                $this->syncAlbumImageAndProduct($request->file, $id);
            }
        }

        return redirect()->route('seller.product.index');
    }

    /**
     * @return array
     */
    public function syncAttributeGroup()
    {
        $attributes     = Attribute::get();
        $groupAttribute = [];

        foreach ($attributes as $key => $attribute) {
            $key                    = $attribute->gettype($attribute->atb_type)['name'];
            $groupAttribute[$key][] = $attribute->toArray();
        }

        return $groupAttribute;
    }

    /**
     * @param $attributes
     * @param $idProduct
     */
    protected function syncAttribute($attributes, $idProduct)
    {
        if (!empty($attributes)) {
            $datas = [];
            foreach ($attributes as $key => $value) {
                $datas[] = [
                    'pa_product_id'   => $idProduct,
                    'pa_attribute_id' => $value
                ];
            }
            if (!empty($datas)) {
                \DB::table('products_attributes')->where('pa_product_id', $idProduct)->delete();
                \DB::table('products_attributes')->insert($datas);
            }
        }
    }

    /**
     * @param $keywords
     * @param $idProduct
     */
   /* private function syncKeyword($keywords, $idProduct)
    {
        if (!empty($keywords)) {
            $datas = [];
            foreach ($keywords as $key => $keyword) {
                $datas[] = [
                    'pk_product_id' => $idProduct,
                    'pk_keyword_id' => $keyword
                ];
            }

           /* \DB::table('products_keywords')->where('pk_product_id', $idProduct)->delete();
            \DB::table('products_keywords')->insert($datas);
        }
    }*/

    /**
     * @param $files
     * @param $productID
     * @return bool
     */
    public function syncAlbumImageAndProduct($files, $productID)
    {
        foreach ($files as $key => $fileImage) {
            $ext    = $fileImage->getClientOriginalExtension();
            $extend = [
                'png', 'jpg', 'jpeg', 'PNG', 'JPG'
            ];

            if (!in_array($ext, $extend)) return false;

            $filename = date('Y-m-d__') . Str::slug($fileImage->getClientOriginalName()) . '.' . $ext;
            $path     = public_path() . '/uploads/' . date('Y/m/d/');
            if (!\File::exists($path)) {
                mkdir($path, 0777, true);
            }

            $fileImage->move($path, $filename);
            \DB::table('product_images')
                ->insert([
                    'pi_name'       => $fileImage->getClientOriginalName(),
                    'pi_slug'       => $filename,
                    'pi_product_id' => $productID,
                    'created_at'    => Carbon::now()
                ]);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id) {
        $product = Product::find($id);
        if ($product) $product->delete();

        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id) {
        $categories     = Category::all();
        $product        = Product::findOrFail($id);
        $attributes     = $this->syncAttributeGroup();
        $keywords       = Keyword::all();

        $attributeOld = \DB::table('products_attributes')
            ->where('pa_product_id', $id)
            ->pluck('pa_attribute_id')
            ->toArray();

      /*  $keywordOld = \DB::table('products_keywords')
            ->where('pk_product_id', $id)
            ->pluck('pk_keyword_id')
            ->toArray();*/

        if (!$attributeOld) $attributeOld = [];
        /*if (!$keywordOld) $keywordOld = [];*/
        $images = \DB::table('product_images')
            ->where("pi_product_id", $id)
            ->get();
        $viewData = [
            'categories'     => $categories,
            'product'        => $product,
            'attributes'     => $attributes,
            'attributeOld'   => $attributeOld,
            'keywords'       => $keywords,
            /*'keywordOld'     => $keywordOld,*/
            'images'         => $images ?? []
        ];

        return view('user.seller_product_update', $viewData);
    }

    public function updateShop(AdminRequestProduct $request, $id) {
        $product                   = Product::find($id);
        $productOld = $product;
        $data                      = $request->except('_token', 'pro_avatar', 'attribute', 'keywords', 'file', 'pro_sale','add_number');
        $data['pro_slug']          = Str::slug($request->pro_name);
        $data['updated_at']        = Carbon::now();
        if ($request->pro_sale) {
            $data['pro_sale'] = $request->pro_sale;
        }

        if ($request->pro_avatar) {
            $image = upload_image('pro_avatar');
            if ($image['code'] == 1)
                $data['pro_avatar'] = $image['name'];
        }

        $old_number = $product->pro_number_import;

        $update = $product->update($data);

        if ($update) {
            $invoiceEntered =  InvoiceEntered::where('ie_product_id', $product->id)->first();
            if ($old_number != $product->pro_number_import) {
                //  Đồng bộ lại đơn nhập
                if ($invoiceEntered) {
                    $invoiceEntered->ie_number = ($invoiceEntered->ie_number - $old_number + $product->pro_number_import);
                    $invoiceEntered->save();
                }
            }

            //  Xử lý thêm mới số lượng
            if ($addNumber = $request->add_number) {
                $product->pro_number_import += $addNumber;
                $product->save();
                if ($invoiceEntered) {
                    $invoiceEntered->ie_number += $addNumber;
                    $invoiceEntered->save();
                }
            }

            $this->syncAttribute($request->attribute, $id);
//            $this->syncKeyword($request->keywords, $id);

            if ($request->file) {
                $this->syncAlbumImageAndProduct($request->file, $id);
            }
        }

        activity('Product')
            ->performedOn($product)
            ->causedBy(Auth::guard('admins')->user())
            ->withProperties([
                'old' => $productOld,
                'new' => $product
            ])
            ->log('Cập nhật product');

        return redirect()->back();
    }
}
