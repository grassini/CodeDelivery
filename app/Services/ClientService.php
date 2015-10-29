<?php
/**
 * Created by PhpStorm.
 * User: jefferson
 * Date: 19/10/15
 * Time: 19:52
 */

namespace CodeDelivery\Services;


use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;

class ClientService
{

    private $clientRepository;

    private $userRepository;

    public function __construct(ClientRepository $clientRepository, UserRepository $userRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->userRepository = $userRepository;
    }

    public function update(array $data, $id)
    {
        $this->clientRepository->update($data, $id);

        $userId = $this->clientRepository->find($id, ['user_id'])->user_id;

        $this->userRepository->update($data['user'], $userId);
    }


    public function create(array $data)
    {

        #atribuindo uma senha padrão
        $data['user']['password'] = bcrypt(123456);

        #atribuindo um Remenber Token
        $data['user']['remember_token'] = str_random(10);

        #criando o usuario
        $user = $this->userRepository->create($data['user']);

        #colocando o user_id no array
        $data['user_id'] = $user->id;

        #Gravando o Usuario
        $this->clientRepository->create($data);


    }

}