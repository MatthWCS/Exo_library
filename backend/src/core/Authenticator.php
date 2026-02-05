<?php

namespace src\Core;

use src\entity\User;

class Authenticator extends Controller {

    public static function isAdmin() : bool
    {
        if (!self::isUserAuthenticated())
        {
            return false;
        }

        $authUser = self::getAuthUser();

        $role = $authUser->getRole();
        return isset($role) && $authUser->getRole() === 'admin';
    }

    public static function isUserAuthenticated() : bool
    {

        return isset($_SESSION['user']) && !empty($_SESSION['user']);
    }

    public static function getAuthUser() : User|null
    {
        if(self::isUserAuthenticated())
        {
            return $_SESSION['user'];
        }
        return null;
    }

    public static function isAuthFormValid(array $data) : bool
    {

        return (
            ( $data['email']) && !empty($data['email']) &&
            ( $data['password']) && !empty($data['password'])
        );
    }

    public static function isRegisterFormValid(array $data) : bool
    {
        return(
            ( $data['email']) && !empty($data['email']) &&
            ( $data['password']) && !empty($data['password']) &&
            ( $data['firstname']) && !empty($data['firstname']) &&
            ( $data['lastname']) && !empty($data['lastname']) &&
            ( $data['address']) && !empty($data['address']) &&
            ( $data['phonenumber']) && !empty($data['phonenumber'])
        );
    }
    public static function isAvatarValid(array $data) : bool
    {
        return $data['name'] && !empty($data['name']) && $data['error'] === 0;
    }

    public static function signOut() : void
    {
        session_destroy();
    }
}
