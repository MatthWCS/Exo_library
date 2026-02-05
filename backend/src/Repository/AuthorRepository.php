<?php

namespace Repository;

use Entity\Author;

class AuthorRepository extends Repository {

    public function __construct()
    {
        parent::__construct( Author::class );
    }
}