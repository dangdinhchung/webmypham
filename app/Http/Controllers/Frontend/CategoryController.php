<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends FrontendController
{
    /**
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function index(Request $request, $process, $slug)
    {
        /*$arraySlug = explode('-', $slug);*/
        /*$id = array_pop($arraySlug);*/
        preg_match_all('!\d+!', $slug, $matches);
        $id = $matches[0][0];
        if ($id) {
            $category = Category::find($id);

          /*  $products = Product::where([
                'pro_active'      => 1,
                'pro_category_id' => $id
            ]);*/

            if($process == 'children') {
                $products = Product::where([
                    'pro_active'      => 1,
                    'pro_category_id' => $id
                ]);
            }

            if($process == 'parent') {
                $categoryGetId = Category::where([
                    'c_status'      => 1,
                    'c_parent_id' => $category->id
                ])->get()->pluck('id')->toArray();
                $products =Product::where('pro_active',1)->whereIn('pro_category_id',$categoryGetId);
            }

            $paramAtbSearch = $request->except('price', 'page', 'k', 'country', 'rv', 'sort');
            $paramAtbSearch = array_values($paramAtbSearch);

            if (!empty($paramAtbSearch)) {
                $products->whereHas('attributes', function ($query) use ($paramAtbSearch) {
                    $query->whereIn('pa_attribute_id', $paramAtbSearch);
                });
            }

            if ($request->price) {
                $price = $request->price;
                if ($price == 6) {
                    $products->where('pro_price', '>', 100000);
                } else {
                    $products->where('pro_price', '<=', 20000 * $price);
                }
            }
            if ($request->k) {
                $products->where('pro_name', 'like', '%' . $request->k . '%');
            }
            if ($request->rv) {
                $products->where('pro_review_star', $request->rv);
            }
            if ($request->sort) {
                $products->orderBy('id', $request->sort);
            }

            $products = $products->select('id', 'pro_name', 'pro_slug', 'pro_sale', 'pro_number', 'pro_avatar',
                'pro_price', 'pro_review_total', 'pro_review_star')
                ->paginate(12);
            $modelProduct = new Product();

            // Lấy thuộc tính
            $attributes = $this->syncAttributeGroup();

            $viewData = [
                'attributes'  => $attributes,
                'products'    => $products,
                'title_page'  => $category->c_name,
                'query'       => $request->query(),
                'country'     => $modelProduct->country,
                'link_search' => request()->fullUrlWithQuery(['k' => \Request::get('k')])
            ];

            return view('frontend.pages.product.index', $viewData);
        }
    }
}
