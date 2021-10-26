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

        $user = $user->first();

        if ($password !== $user->password) {
           return false;
        }

        $_SESSION['user'] = [
            'id' => $user->id,
            'email' => $user->email,
            'password' => $user->password
        ];

        $token = self::token($_SESSION['user']);

        $_SESSION['Authorization'] = $token;

        return true;
    }

    public static function logout()
    {
        $_SESSION['user'] = [
            'id' => null,
            'email' => null,
            'password' => null,
        ];

        unset($_SESSION['Authorization']);

        return self::guest();
    }

    public static function user()
    {
        $user_in_session = isset($_SESSION['user']);

        if ( ! $user_in_session ) {
            return false;
        }

        $query = User::where($_SESSION['user']);

        return $query->exists() ? $query->first() : false ;
    }

    public static function check() : bool
    {
        return (bool) self::user();
    }

    public static function guest() : bool
    {
        return (bool) self::check() === false;
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