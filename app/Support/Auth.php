<?php

namespace App\Support;

use App\Http\Models\User;
use Firebase\JWT\JWT;

class Auth
{
    public static function attempt($email, $password)
    {
        $user = User::where('email', $email);

        if ( ! $user->exists() ) {
           return false;
        }

        $user = $user->first()->getAttributes();

        if ($password !== $user['password']) {
           return false;
        }

        return self::token($user);
    }

    public static function token($user)
    {
        unset($user['password']);
        $domain = env('APP_DOMAIN');
        $iat = time();
        $exp = $iat + 60 * 60;

        $key = env("JWT_SECRET");
        $payload = array(
            "iss" => $domain,
            "aud" => $domain,
            "iat" => $iat,
            "exp" => $exp,
            'user' => $user,
        );

        /**
         * IMPORTANT:
         * You must specify supported algorithms for your application. See
         * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
         * for a list of spec-compliant algorithms.
         */
        $jwt = JWT::encode($payload, $key);

        return json_encode(['Bearer'=> $jwt, 'expires'=>$exp]);
    }
}