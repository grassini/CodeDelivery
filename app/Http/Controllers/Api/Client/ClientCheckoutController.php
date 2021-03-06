<?php
namespace CodeDelivery\Http\Controllers\Api\Client;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;


class ClientCheckoutController extends Controller
{
    private $repository;
    private $userRepository;
    private $productRepository;
    private $service;

    public function __construct(
        OrderRepository $repository,
        UserRepository $userRepositoy,
        ProductRepository $productRepository,
        OrderService $service)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepositoy;
        $this->productRepository = $productRepository;
        $this->service = $service;
    }
    public function index()
    {

        #Proprietario do Acesso, pega o id do User Autenticado
        $id = Authorizer::getResourceOwnerId();

        $clientId = $this->userRepository->find($id)->client->id;

        $orders = $this->repository->with('items')->scopeQuery(function ($query) use($clientId){
            return $query->where('client_id','=',$clientId);
        })->paginate();


        return $orders;
    }


    public function store(Requests\CheckoutRequest $request)
    {
        $data = $request->all();
        $id = Authorizer::getResourceOwnerId();
        $clientId = $this->userRepository->find($id)->client->id;
        $data['client_id'] = $clientId;
        $o = $this->service->create($data);
        $o = $this->repository->with('items')->find($o->id);

        return $o;
    }


    public function show($id)
    {
        $o = $this->repository->with(['client', 'items', 'cupom'])->find($id);
        $o->items->each(function($item){
            $item->product;
        });
        return $o;
    }


    public function create()
    {
        $products = $this->productRepository->lists();

        return view ('customer.order.create', compact('products'));
    }



}