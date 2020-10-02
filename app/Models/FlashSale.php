<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FlashSale extends Model
{
    protected $guarded = [''];

    public function flash_sale_products() {
    	return $this->hasMany(FlashSaleProduct::class,'fsp_flash_deal_id');
    }
}
