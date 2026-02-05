<?php

namespace Repository;

use Entity\Book;

class BookRepository extends Repository {

    public function __construct()
    {
        parent::__construct( Book::class );
    }
}