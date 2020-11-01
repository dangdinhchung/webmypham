<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;

class CheckPermissionAcl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * @author chungdd
     */
    public function handle($request, Closure $next, $permission)
    {
       $idAdminLogin = get_data_user('admins');
       //1. lay nhóm quyền (role) ma user dang nhap
        $listRoleOfAdmin = \DB::table('admins')
            ->join('role_admin', 'admins.id', '=' , 'role_admin.admin_id')
            ->join('roles','role_admin.role_id','=','roles.id')
            ->where('admins.id',$idAdminLogin)
            ->select('roles.*')
            ->get()->pluck('id')->toArray();

        //2.lay tat ca cac quyen (permission)
        $listPermissonOfAdmin = \DB::table('roles')
            ->join('role_permission', 'roles.id', '=' , 'role_permission.role_id')
            ->join('permissions','role_permission.permission_id','=','permissions.id')
            ->whereIn('roles.id', $listRoleOfAdmin)
            ->select('permissions.*')
            ->get()->pluck('id')->unique();

       //3.lay ma man hinh tuong ung de check
        $checkPermission = Permission::where('name', $permission)->value('id');

        if ($listPermissonOfAdmin->contains($checkPermission)) {
            return $next($request);
        }

        return abort(403);
    }
}
