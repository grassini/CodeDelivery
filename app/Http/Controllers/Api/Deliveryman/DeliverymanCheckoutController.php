<?php
namespace CodeDelivery\Http\Controllers\Api\Deliveryman;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;


class DeliverymanCheckoutController extends Controller
{
    private $repository;
    private $userRepository;
    private $service;

    public function __construct(
        OrderRepository $repository,
        UserRepository $userRepositoy,
        OrderService $service)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepositoy;
        $this->service = $service;
    }
    public function index()
    {

        $id = Authorizer::getResourceOwnerId();
        $orders = $this->repository->with('items')->scopeQuery(function ($query) use($id){
            return $query->where('user_deliveryman_id','=',$id);
        })->paginate();


        return $orders;
    }


    public function show($id)
    {
        $idDeliveyman = Authorizer::getResourceOwnerId();
        $order = $this->repository->getByIdAndDeliveryman($id, $idDeliveyman);

        return $order;
    }

    public function updateStatus(Request $request, $id)
    {
        $idDeliveyman = Authorizer::getResourceOwnerId();
        $order = $this->service->updateStatus($id, $idDeliveyman, $request->get('status'));
        if($order){
            return $order;
        }

        abort(400, 'Order não encontrada');


    }



}