<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Comments;
use App\Models\Coupon;
use App\Models\Event;
use App\User;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Services\ProcessViewService;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ProductDetailController extends FrontendController
{
    /**
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\View\View
     * @throws \Throwable
     * @author chungdd
     */
	public function getProductDetail(Request $request, $slug)
	{
		$arraySlug = explode('-', $slug);
		$id        = array_pop($arraySlug);

		if ($id) {
			//1. Lấy thông tin sp
			$product = Cache::remember('PRODUCT_DETAIL_'. $id, 60 * 24 * 24, function () use ($id) {
				return Product::with('category:id,c_name,c_slug')->findOrFail($id);
			});

			//2. Xử lý view
			ProcessViewService::view('products', 'pro_view', 'product', $id);

			// 3. Lấy đánh giá
			$ratings = Cache::remember('RATING_PRODUCT_'. $id, 60 * 24 * 24, function () use ($id) {
				return Rating::with('user:id,name')
					->where('r_product_id', $id)
					->orderByDesc('id')
					->limit(5)
					->get();
			});
			$ratingsDashboard = Cache::remember('RATING_DASHBOARD_'. $id, 60 * 24 * 24, function () use ($id) {
				return Rating::groupBy('r_number')
					->where('r_product_id', $id)
					->select(\DB::raw('count(r_number) as count_number'), \DB::raw('sum(r_number) as total'))
					->addSelect('r_number')
					->get()->toArray();
			});

			$ratingDefault = $this->mapRatingDefault();

			foreach ($ratingsDashboard as $key => $item) {
				$ratingDefault[$item['r_number']] = $item;
			}

			// Lấy album ảnh
			//  4 Lấy comment
			$page_comment = $request->page ?? 1;
			$comments = Cache::remember('COMMENT_PRODUCT_'. $id.'_PAGE_'. $page_comment, 60 * 24 * 24, function () use ($id) {
				return Comments::with('user:id,name', 'reply')
					->where([
						'cmt_product_id' => $id,
						'cmt_parent_id'  => 0
					])
					->orderByDesc('id')
					->paginate(10);
			});

			if ($request->ajax()) {
				$html = view('frontend.pages.product_detail.include._inc_list_comments', compact('comments', 'product'))->render();
				return response(['html' => $html]);
			}

			$attributeOld = Cache::remember('ATTRIBUTE_PRODUCT_'. $id, 60 * 24 * 24, function () use ($id) {
				return \DB::table('products_attributes')
					->where('pa_product_id', $id)
					->pluck('pa_attribute_id')
					->toArray();

			});

			// Lấy event hiển thị đầu
			$event1 = Cache::remember('HOME.EVENT_1', 60 * 24 * 10, function () {
				return Event::where('e_position_1', 1)
					->first();
			});

			$event3 = Cache::remember('HOME.EVENT_3', 60 * 24 * 10, function () {
				return Event::where('e_position_3', 1)
					->first();
			});

			//lay ma giam gia
            $dateNow = strtotime(date('Y-m-d'));
            $couponList = Coupon::where('cp_start_date','<=' , $dateNow)->where('cp_end_date', '>=' , $dateNow)->get();

            //get user active
            $user = User::where('id',Auth::id())->pluck('active')->first();


			$viewData = [
                'isPopupCaptcha'   => 0,
//				'isPopupCaptcha'   => \Auth::user()->count_comment ?? 0,
                'ratingDefault'    => $ratingDefault,
                'product'          => $product,
                'ratings'          => $ratings,
//				'images'           => $images,
                'event1'           => $event1,
                'event3'           => $event3,
                'attribute'        => $this->syncAttributeGroup(),
                'comments'         => $comments,
                'attributeOld'     => $attributeOld,
                'title_page'       => $product->pro_name,
                'couponList'       => $couponList,
                'productsSuggests' => $this->getProductSuggests($product->pro_category_id),
                'user'             => $user
			];
			return view('frontend.pages.product_detail.index', $viewData);
		}

		return redirect()->to('/');
	}

    /**
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\View\View
     * @throws \Throwable
     * @author chungdd
     */
	public function getListRatingProduct(Request $request, $slug)
	{
		$arraySlug = explode('-', $slug);
		$id        = array_pop($arraySlug);
		if ($id) {

			//1.Lấy sản phẩm
			$product = Product::with('category:id,c_name,c_slug', 'keywords')->findOrFail($id);

			//2. Lấy đánh giá by ID và điều kiện lọc

			$ratings = Rating::with('user:id,name')
				->where('r_product_id', $id);
			if ($number = $request->s) $ratings->where('r_number', $number);

			$ratings = $ratings->orderByDesc('id')
				->paginate(5);

			if ($request->ajax()) {
				$query = $request->query();
				$html  = view('frontend.pages.product_detail.include._inc_list_reviews', compact('ratings', 'query'))->render();
				return response(['html' => $html]);
			}

			//3 Hiển thị thông kê
			$ratingsDashboard = Rating::groupBy('r_number')
				->where('r_product_id', $id)
				->select(\DB::raw('count(r_number) as count_number'), \DB::raw('sum(r_number) as total'))
				->addSelect('r_number')
				->get()->toArray();

			$ratingDefault = $this->mapRatingDefault();

			foreach ($ratingsDashboard as $key => $item) {
				$ratingDefault[$item['r_number']] = $item;
			}

			$viewData = [
				'product'       => $product,
				'ratings'       => $ratings,
				'ratingDefault' => $ratingDefault,
				'query'         => $request->query(),
				'title_page'    => "Review, đánh gía sản phẩm " . $product->pro_name,
			];

			return view('frontend.pages.product_detail.product_ratings', $viewData);
		}
		return redirect()->to('/');
	}

    /**
     * @return array
     * @author chungdd
     */
	private function mapRatingDefault()
	{
		$ratingDefault = [];
		for ($i = 1; $i <= 5; $i++) {
			$ratingDefault[$i] = [
				"count_number" => 0,
				"total"        => 0,
				"r_number"     => 0
			];
		}


		return $ratingDefault;
	}

    /**
     * @param $categoriID
     * @return mixed
     * @author chungdd
     */
	private function getProductSuggests($categoriID)
	{
		$products = Cache::remember('PRODUCT_RELATE_'.$categoriID, 60 * 24 * 10, function () use ($categoriID) {
			return Product::where([
				'pro_active'      => 1,
				'pro_category_id' => $categoriID
			])
				->orderByDesc('id')
				->select('id', 'pro_name', 'pro_slug', 'pro_sale', 'pro_number','pro_avatar', 'pro_price', 'pro_review_total', 'pro_review_star')
				->limit(12)
				->get();
		});

		return $products;
	}

    /**
     * @return array
     * @author chungdd
     */
	public function syncAttributeGroup()
	{
		$attributes     = Attribute::get();
		$groupAttribute = [];

		foreach ($attributes as $key => $attribute) {
			$key                                  = $attribute->gettype($attribute->atb_type)['name'];
			$groupAttribute[$key][$attribute->id] = $attribute->toArray();
		}

		return $groupAttribute;
	}

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
	public function listCompare() {
        return view('frontend.pages.compare.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
	public function addCompare(Request $request){
        if($request->session()->has('compare')){
            $compare = $request->session()->get('compare', collect([]));
            if(!$compare->contains($request->id)){
                if(count($compare) == 3){
                    $compare->forget(0);
                    $compare->push($request->id);
                }
                else{
                    $compare->push($request->id);
                }
            }
        }
        else{
            $compare = collect([$request->id]);
            $request->session()->put('compare', $compare);
        }

        return view('frontend.pages.compare.header_compare');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    public function resetCompare(Request $request) {
        $request->session()->forget('compare');
        return back();
    }
}
