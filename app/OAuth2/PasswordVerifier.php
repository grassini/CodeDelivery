<?php
/**
 * Created by PhpStorm.
 * User: jefferson
 * Date: 08/11/15
 * Time: 18:11
 */

namespace CodeDelivery\OAuth2;

use Illuminate\Support\Facades\Auth;

class PasswordVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }

        return false;
    }
}