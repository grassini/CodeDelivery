<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Category extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
    ];

    #cirando relacionamento com produtos, onde uma categoria pode ter muitos produtos
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
