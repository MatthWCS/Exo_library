<?php

namespace Controller;

use App\Repository\BookRepository;
use \Exception;

class BookController extends Controller {

    static function list() {

        try {

            $bookRepository = new BookRepository();

            $bookList = $bookRepository->findAll();

            if( !$bookList )
            {
                throw new Exception("Books not found !");
            }

            echo json_encode($bookList);

        } catch (Exception $e)
        {
            $errorMessage = $e->getMessage();
            var_dump( $errorMessage );
        }
    }

    public function one() {

        try {
            $bookRepository = new BookRepository();
            $bookOne = $bookRepository->find();

            if( !$bookOne )
            {
                throw new Exception("Book not found !");
            }

            echo json_encode($bookOne);

        } catch (Exception $e) {

            $errorMessage = $e->getMessage();
            var_dump( $errorMessage );
        }
    }

    public function create() {

        try {
            $bookRepository = new BookRepository();
            $bookCreated = $bookRepository->insert();

            if( !$bookCreated )
            {
                throw new Exception("Impossible to create book !");
            }

            echo json_encode($bookCreated);

        } catch (Exception $e) {

            $errorMessage = $e->getMessage();
            var_dump( $errorMessage );
        }
    }

    public function update() {

        try {

            $bookRepository = new BookRepository();
            $bookUpdated = $bookRepository->update();

            if( !$bookUpdated )
            {
                throw new Exception("Impossible to update book !");
            }

            echo json_encode($bookUpdated);

        } catch (Exception $e) {

            $errorMessage = $e->getMessage();
            var_dump( $errorMessage );
        }
    }
    public function delete() {

        try {
            $bookRepository = new BookRepository();
            $bookRemove = $bookRepository->remove();

            if( !$bookRemove )
            {
                throw new Exception("Impossible to delete book !");
            }

            echo json_encode($bookRemove);

        } catch (Exception $e) {

            $errorMessage = $e->getMessage();
            var_dump( $errorMessage );
        }
    }
}