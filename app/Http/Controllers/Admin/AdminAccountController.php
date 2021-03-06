<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\AdminRequestAccount;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AdminAccountController extends Controller
{
    /**
     * @author chungdd
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
		if (!check_admin()) return redirect()->route('get.admin.index');
        $admins = Admin::get();
        $viewData = [
            'admins' => $admins
        ];
        return view('admin.admin.index', $viewData);
    }

    /**
     * @author chungdd
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
		$roles    = Role::all();
        return view('admin.admin.create',compact('roles'));
    }

    /**
     * @author chungdd
     * @param AdminRequestAccount $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminRequestAccount $request)
    {
       try {
           DB::beginTransaction();
           $data = $request->except("_token","roles");
           $data['password']   =  Hash::make($data['password']);
           $data['created_at'] = Carbon::now();
           if ($request->avatar) {
               $image = upload_image('avatar');
               if ($image['code'] == 1)
                   $data['avatar'] = $image['name'];
           }
           $id = Admin::insertGetId($data);
           $admin = Admin::find($id);
           $admin->roles()->attach($request->roles);
           DB::commit();
           return redirect()->route('admin.account_admin.index')->with('msg','Thêm nhân viên thành công');

       } catch (\Exception $exception) {
           DB::rollBack();
           return redirect()->route('admin.account_admin.index')->with('error','Thêm nhân viên thất bại');
       }
    }

    /**
     * @author chungdd
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
		$roles     =Role::all();
        $listRoleOfAdmin = \DB::table('role_admin')->where('admin_id',$id)->pluck('role_id');
        return view('admin.admin.update', compact('admin','listRoleOfAdmin','roles'));
    }

    /**
     * @author chungdd
     * @param AdminRequestAccount $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminRequestAccount $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = $request->except("_token","password","roles");
            $admin = Admin::find($id);
            if ($request->password) {
                $admin->password   =  Hash::make($request->password);
            }
            $data['updated_at'] = Carbon::now();
            if ($request->avatar) {
                $image = upload_image('avatar');
                if ($image['code'] == 1) {
                    $data['avatar'] = $image['name'];
                }
            }
            $admin->fill($data)->save();

            //update role
            \DB::table('role_admin')->where('admin_id',$id)->delete();
            $admin->roles()->attach($request->roles);
            DB::commit();
            return redirect()->route('admin.account_admin.index')->with('msg','Cập nhật nhân viên thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->route('admin.account_admin.index')->with('error','Cập nhật nhân viên thất bại');
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
           $admin = Admin::find($id);
          /* if (get_data_user('admins','level') != 1)
           {
               return redirect()->back();
           }*/
           $admin->delete();
           //delete user of role
           $admin->roles()->detach();
           DB::commit();
           return redirect()->route('admin.account_admin.index')->with('msg','Xóa nhân viên thành công');
       } catch (\Exception $exception) {
           DB::rollBack();
           Log::error('Loi: ' . $exception->getMessage() . $exception->getLine());
           return redirect()->route('admin.account_admin.index')->with('error','Xóa nhân viên thất bại');
       }
    }
}
