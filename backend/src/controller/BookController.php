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
            $data = $bookOne[0]->bookPrepareJson();
            http_response_code(200);
            echo json_encode($data);

        } catch (Exception $e) {

            $errorMessage = $e->getMessage();
            var_dump( $errorMessage );
        }
    }

    static function create() {

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

    static function delete( ) {

        try {
            $raw = file_get_contents('php://input');
            parse_str($raw, $criteria);
            var_dump($criteria);
            $bookRepository = new BookRepository();
            $bookRemove = $bookRepository->remove($criteria);

            if( !$bookRemove )
            {
                throw new Exception("Impossible to delete book !");
            }
            http_response_code(200);
            echo json_encode(["message" => "Book Deleted"]);

        } catch (Exception $e) {

            $errorMessage = $e->getMessage();
            var_dump( $errorMessage );
        }
    }
}