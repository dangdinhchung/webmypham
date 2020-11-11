<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestSlide;
use Carbon\Carbon;
use App\Models\Slide;

class AdminSlideController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @author chungdd
     */
    public function index()
    {
        if (!check_admin()) {
            return redirect()->route('get.admin.index');
        }
        $slides = Slide::paginate(20);
        return view('admin.slide.index', compact('slides'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function create()
    {
        return view('admin.slide.create');
    }

    /**@param AdminRequestSlide $request
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    public function store(AdminRequestSlide $request)
    {
        $data = $request->except('_token', 'sd_avatar');
        $data['created_at'] = Carbon::now();

        if ($request->sd_avatar) {
            $image = upload_image('sd_avatar');
            if ($image['code'] == 1) {
                $data['sd_image'] = $image['name'];
            }
        }

        $id = Slide::insertGetId($data);
        if($id) {
            return redirect()->route('admin.slide.index')->with('msg','Thêm slide thành công');
        }
        return redirect()->route('admin.slide.index')->with('error','Thêm slide thất bại');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
    public function edit($id)
    {
        $slide = Slide::find($id);
        return view('admin.slide.update', compact('slide'));
    }

    /**
     * @param AdminRequestSlide $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    public function update(AdminRequestSlide $request, $id)
    {
        $slide = Slide::find($id);
        $data = $request->except('_token', 'sd_avatar');
        $data['created_at'] = Carbon::now();

        if ($request->sd_avatar) {
            $image = upload_image('sd_avatar');
            if ($image['code'] == 1) {
                $data['sd_image'] = $image['name'];
            }
        }

        $update = $slide->update($data);
        return redirect()->route('admin.slide.index')->with('msg','Cập nhật slide thành công');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    public function active($id)
    {
        $slide = Slide::find($id);
        $slide->sd_active = !$slide->sd_active;
        $slide->save();

        return redirect()->back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
    public function delete($id)
    {
        $slide = Slide::find($id);
        if ($slide) {
            $slide->delete();
        }
        return redirect()->route('admin.slide.index')->with('msg','Xóa slide thành công');
    }

}
