<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class AclPermissionController extends Controller
{
	public function index()
	{
		$permissions = Permission::all();

		$viewData = [
			'permissions' => $permissions
		];

		return view('admin.permission.index',$viewData);
	}

	public function create()
	{
		return view('admin.permission.create');
	}

	public function store(Request $request)
	{
		$permission                   = new Permission();
		$permission->name             = $request->name;
		$permission->description      = $request->description;
		$permission->display_name       = $request->display_name;
		$permission->save();

		return redirect()->back();
	}

	public function edit($id)
	{
		$permission = Permission::findOrFail($id);
		return view('admin.permission.update', compact( 'permission'));
	}

	public function update(Request $request, $id)
	{
		$permission                   = Permission::findOrFail($id);
		$permission->name             = $request->name;
		$permission->description      = $request->description;
		$permission->display_name       = $request->display_name;
		$permission->save();
		return redirect()->back();
	}

	public function delete($id)
	{
		Permission::findOrFail($id)->delete();
		return redirect()->back();
	}

//	private function getGroupPermission()
//	{
//		$group_permission = config('permission.group_permission') ?? [];
//		return $group_permission;
//	}
}
