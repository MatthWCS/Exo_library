<?php

namespace Repository;

use Entity\Category;

class CategoryRepository extends Repository {

    public function __construct()
    {
        parent::__construct( Category::class );
    }
}