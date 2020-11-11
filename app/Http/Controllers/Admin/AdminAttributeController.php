<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestAttribute;
use App\Models\Category;
use App\Models\Attribute;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminAttributeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function index()
    {
        $attibutes = Attribute::with('category:id,c_name')->orderByDesc('id')
            ->get();

        $viewData = [
            'attibutes' => $attibutes
        ];

        return view('admin.attribute.index', $viewData);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function create()
    {
        $categories = Category::select('id','c_name')->get();
        $attribute_type = Attribute::getListType();

        return view('admin.attribute.create',compact('categories','attribute_type'));
    }

    /**
     * @param AdminRequestAttribute $request
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    public function store(AdminRequestAttribute $request)
    {
        $data = $request->except('_token');
        $data['atb_slug']     = Str::slug($request->atb_name);
        $data['atb_category_id'] = 1;
        $data['created_at'] = Carbon::now();

        $id = Attribute::insertGetId($data);
        if($id) {
            return redirect()->route('admin.attribute.index')->with('msg','Thêm thuộc tính thành công');
        } else {
            return redirect()->route('admin.attribute.index')->with('error','Thêm thuộc tính thất bại');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function edit($id)
    {
        $attribute = Attribute::find($id);
        $categories = Category::select('id','c_name')->get();
		$attribute_type = Attribute::getListType();
        return view('admin.attribute.update', compact('attribute','categories','attribute_type'));
    }

    /**
     * @param AdminRequestAttribute $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    public function update(AdminRequestAttribute $request, $id)
    {
        $attribute          = Attribute::find($id);
        $data               = $request->except('_token');
        $data['atb_slug']   = Str::slug($request->atb_name);
        $data['updated_at'] = Carbon::now(); 

        $attribute->update($data);
        return redirect()->route('admin.attribute.index')->with('msg','cập nhật thuộc tính thành công');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    public function delete($id)
    {
        $attribute          = Attribute::find($id);
        if ($attribute) $attribute->delete();

        return redirect()->route('admin.attribute.index')->with('msg','Xóa thuộc tính thành công');
    }
}
