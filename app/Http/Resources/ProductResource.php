<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'ma_sp'=> $this->ma_sp,
            'ten_sp'=>$this->ten_sp,
            'donvitinh_sp'=>$this->donvi_sp,
            'gia_sp'=>$this->gia_sp,
            'id_nhom'=>$this->id_nhom,
        ];
    }
}
