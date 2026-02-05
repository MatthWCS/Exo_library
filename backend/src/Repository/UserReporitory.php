<?php

namespace Repository;

use App\Entity\User;

class UserRepository extends Repository {

    public function __construct()
    {
        parent::__construct( User::class );
    }
}