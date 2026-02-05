<?php

namespace App\Repository;

use App\Core\Repository;
use App\Entity\Book;

class BookRepository extends Repository {

    public function __construct()
    {
        parent::__construct( Book::class );
    }

    
}