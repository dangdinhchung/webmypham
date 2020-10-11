<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestCategory;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Category;

class AdminCategoryController extends AdminController
{
    /**
     * @author chungdd
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::paginate(10);

        $viewData = [
            'categories' => $categories
        ];

        return view('admin.category.index', $viewData);
    }

    /**
     * @author chungdd
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = $this->getCategoriesSort();
        return view('admin.category.create',compact('categories'));
    }

    /**
     * @author chungdd
     * @param AdminRequestCategory $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminRequestCategory $request)
    {
        $data               = $request->except('_token','c_avatar');
        $data['c_slug']     = Str::slug($request->c_name);
        $data['created_at'] = Carbon::now();
        if ($request->c_avatar) {
            $image = upload_image('c_avatar');
            if ($image['code'] == 1)
                $data['c_avatar'] = $image['name'];
        }

        $id = Category::insertGetId($data);
        return redirect()->back();
    }

    /**
     * @author chungdd
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = $this->getCategoriesSort();
        return view('admin.category.update', compact('category','categories'));
    }

    /**
     * @author chungdd
     * @param AdminRequestCategory $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminRequestCategory $request, $id)
    {
        $category           = Category::find($id);
        $data               = $request->except('_token','c_avatar');
        $data['c_slug']     = Str::slug($request->c_name);
        $data['updated_at'] = Carbon::now();

        if ($request->c_avatar) {
            $image = upload_image('c_avatar');
            if ($image['code'] == 1)
                $data['c_avatar'] = $image['name'];
        }

        $category->update($data);
        return redirect()->back();
    }

    /**
     * @author chungdd
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function active($id)
    {
        $category = Category::find($id);
        $category->c_status = ! $category->c_status;
        $category->save();

        return redirect()->back();
    }

    /**
     * @author chungdd
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function hot($id)
    {
        $category = Category::find($id);
        $category->c_hot = ! $category->c_hot;
        $category->save();

        return redirect()->back();
    }

    /**
     * @author chungdd
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $category = Category::find($id);
        if ($category) $category->delete();

        return redirect()->back();
    }

    /**
     * @author chungdd
     * @return array
     */
    protected function getCategoriesSort()
    {
        $categories = Category::where('c_status', Category::STATUS_ACTIVE)
            ->select('id', 'c_parent_id', 'c_name')->get();

        $listCategoriesSort = [];
        Category::recursive($categories, $parent = 0, $level = 1, $listCategoriesSort);
        return $listCategoriesSort;
    }
}
