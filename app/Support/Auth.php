<?php

namespace App\Support;

use App\Http\Models\User;

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
            dd('Not the proper password, we retry login.');
        }

        $_SESSION['user'] = [
            'id' => $user->id,
            'email' => $user->email,
            'password' => $user->password
        ];

        return true;
    }

    public static function logout()
    {
        $_SESSION['user'] = [
            'id' => null,
            'email' => null,
            'password' => null,
        ];

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

}