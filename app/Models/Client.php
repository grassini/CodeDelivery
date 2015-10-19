<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Client extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'city',
        'state',
        'zipcode'
    ];

    #Cirando o relacionamento com a tabela user
    public function user()
    {
        #relancionando de 1 para 1
        return $this->hasOne(User::class, 'id', 'user_id');
    }

//    public function user()
//    {
//        return $this->belongsTo(User::class);
//    }



}
