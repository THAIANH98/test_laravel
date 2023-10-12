<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_product extends Model
{
    use HasFactory;
    protected $fillable = [
        'ma_sp',
        'ten_sp',
        'donvi_sp',
        'gia_sp',
        'id_nhom',
    ];

    public function cate()
    {
        return $this->hasOne(tbl_category::class, 'id', 'id_nhom');
    }
}
