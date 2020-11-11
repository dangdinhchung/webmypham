<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class AclPermissionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
	public function index()
	{
		$permissions = Permission::all();

		$viewData = [
			'permissions' => $permissions
		];

		return view('admin.permission.index',$viewData);
	}

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
	public function create()
	{
		return view('admin.permission.create');
	}

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
	public function store(Request $request)
	{
		$permission                   = new Permission();
		$permission->name             = $request->name;
		$permission->description      = $request->description;
		$permission->display_name       = $request->display_name;
		$permission->save();

        return redirect()->route('admin.permission.list')->with('msg','Thêm quyền thành công');
	}

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author chungdd
     */
	public function edit($id)
	{
		$permission = Permission::findOrFail($id);
		return view('admin.permission.update', compact( 'permission'));
	}

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
	public function update(Request $request, $id)
	{
		$permission                   = Permission::findOrFail($id);
		$permission->name             = $request->name;
		$permission->description      = $request->description;
		$permission->display_name       = $request->display_name;
		$permission->save();
        return redirect()->route('admin.permission.list')->with('msg','Cập nhật quyền thành công');
	}

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @author chungdd
     */
	public function delete($id)
	{
		Permission::findOrFail($id)->delete();
        return redirect()->route('admin.permission.list')->with('msg','Xóa quyền thành công');
	}

//	private function getGroupPermission()
//	{
//		$group_permission = config('permission.group_permission') ?? [];
//		return $group_permission;
//	}
}
