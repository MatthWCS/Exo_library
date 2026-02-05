<?php

namespace App\Controller;

use App\Core\Controller;
use App\Repository\BookRepository;

use \Exception;

class BookController extends Controller {

    static function all() {

        try {

            $bookRepository = new BookRepository();
            $data = [];
            $bookList = $bookRepository->findAll();
            if( !$bookList )
            {
                throw new Exception("Books not found !");
            }
            foreach($bookList as $book)
            {
                array_push($data, $book->bookPrepareJson());
            }

            http_response_code(200);
            echo json_encode($data);
            

        } catch (Exception $e)
        {
            $errorMessage = $e->getMessage();
            var_dump( $errorMessage );
        }
    }

        static function one( int $id) {

        try {
            $bookRepository = new BookRepository();
            $bookOne = $bookRepository->find(['bk_isbn' => $id]);

            if( !$bookOne )
            {
                throw new Exception("Book not found !");
            }
            http_response_code(200);
            echo json_encode($bookOne);

        } catch (Exception $e) {

            $errorMessage = $e->getMessage();
            var_dump( $errorMessage );
        }
    }

    public function create() {

        try {
            $bookRepository = new BookRepository();
            $bookCreated = $bookRepository->insert($_POST);

            if( !$bookCreated )
            {
                throw new Exception("Impossible to create book !");
            }
            http_response_code(201);
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
            http_response_code(200);
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
            http_response_code(204);
            echo json_encode($bookRemove);

        } catch (Exception $e) {

            $errorMessage = $e->getMessage();
            var_dump( $errorMessage );
        }
    }
}