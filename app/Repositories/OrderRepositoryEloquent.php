<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class OrderRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{

    #Pegar Id da Order e Id do Deliveryman
    public function getByIdAndDeliveryman($id, $idDeliveryman)
    {

        $result = $this->with(['client', 'items', 'cupom'])->findWhere([
            'id' => $id,
            'user_deliveryman_id' => $idDeliveryman
        ]);


        #Se tiver uma instancia de Collection
        $result = $result->first();

            if($result){
                $result->items->each(function($item){
                    $item->product;
                });
            }

            return $result;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
