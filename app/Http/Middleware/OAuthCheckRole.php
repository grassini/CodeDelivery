<?php

namespace CodeDelivery\Http\Middleware;

use Closure;
use CodeDelivery\Repositories\UserRepository;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class OAuthCheckRole
{

    private $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        #Proprietario do Acesso, pega o id do User Autenticado
        $id = Authorizer::getResourceOwnerId();

        #Consulta o Usuario Autenticado é um Client ou Admin
        $user = $this->userRepository->find($id);

        #Verifica se a Role é = a passada
        if($user->role != $role){
            abort(403, 'Access Forbidden - Negado!!');
        }

        return $next($request);
    }
}
