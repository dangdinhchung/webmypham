<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $guard_name = '*';

    //m-n
    public function permissions() {
        // dat ten theo alfa b thi khi insert bảng m-n mới đúng
        //table : role_permission | Nếu đúng trong db phải đặt là permission_role nhưng có thể custom được là truyền vào tên bảng như bên dưới
        return $this->belongsToMany(Permission::class,'role_permission','role_id','permission_id');
    }

}
