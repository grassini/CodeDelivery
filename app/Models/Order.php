<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Order extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'client_id',
        'user_deliveryman_id',
        'total',
        'status',
    ];

    #Pegando os Itens atraves do relacionamentos
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }


    #Pegando o entregador do pedido
    public function deliveryman()
    {
        return $this->belongsTo(User::class);
    }


    #Criando relacionamento com produtos, onde uma categoria pode ter muitos produtos
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
