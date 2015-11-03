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

    #Criando relacionamento com a tabela User->client
    public function client()
    {
        return $this->belongsTo((Client::class));
    }

    #Pegando os Itens atraves do relacionamentos
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }


    #Pegando o entregador do pedido
    public function deliveryman()
    {
        return $this->belongsTo(User::class, 'user_deliveryman_id', 'id');
    }


    #Criando relacionamento com produtos, onde uma categoria pode ter muitos produtos
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
