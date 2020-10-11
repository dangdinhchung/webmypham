<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AclRoleController extends Controller
{
    /**
     * @author chungdd
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function index()
	{
		$roles    = Role::all();
		$viewData = [
			'roles' => $roles
		];
		return view('admin.role.index', $viewData);
	}

    /**
     * @author chungdd
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function create()
	{
		$permissions      = Permission::all();
		$viewData         = [
			'permissions' => $permissions,
		];

		return view('admin.role.create', $viewData);
	}

    /**
     * @author chungdd
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
	public function store(Request $request)
	{
		try {
		    DB::beginTransaction();
            $data = $request->except("_token","permissions");
            $data['name'] = $request->name;
            $data['display_name'] = $request->display_name;
            $data['name_slug'] = Str::slug($request->name);
            $data['description'] = $request->description;
            $data['created_at'] = Carbon::now();
            $id = Role::insertGetId($data);
            $role = Role::find($id);
            $role->permissions()->attach($request->permissions);
            DB::commit();
            return redirect()->back();
        } catch (\Exception $exception) {
		    DB::rollBack();
		    Log::error('Loi: ' . $exception->getMessage() . $exception->getLine());
        }
	}

    /**
     * @author chungdd
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function edit($id)
	{
        $permissions = Permission::all();
		$role               = Role::findOrFail($id);
        $getAllPermissionOfRole = \DB::table('role_permission')->where('role_id',$id)->pluck('permission_id');

		$viewData = [
            'permissions'            => $permissions,
            'role'                   => $role,
            'getAllPermissionOfRole' => $getAllPermissionOfRole
		];

		return view('admin.role.update', $viewData);
	}

    /**
     * @author chungdd
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
	public function update(Request $request, $id)
	{
		try {
          DB::beginTransaction();
            $role              = Role::findOrFail($id);
            $role->name        = $request->name;
            $role->name_slug   = Str::slug($request->name);
            $role->display_name  = $request->display_name;
            $role->description = $request->description;
            $role->save();

            //update role_permission table
            \DB::table('role_permission')->where('role_id',$id)->delete();
            $role->permissions()->attach($request->permissions);

            DB::commit();
            return redirect()->back();
        } catch (\Exception $exception) {
		    DB::rollBack();
		    Log::error('Loi: ' . $exception->getMessage() . $exception->getLine());
        }
	}

    /**
     * @author chungdd
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $role = Role::find($id);
            $role->delete();
            //delete user of role
            $role->permissions()->detach();
            DB::commit();
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }
}
