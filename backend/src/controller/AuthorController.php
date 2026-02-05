<?php

namespace App\Controller;

use App\Repository\AuthorRepository;
use \Exception;
use src\Core\Controller;

class AuthorController extends Controller {

    static function list() {

        try {

            $authorRepository = new AuthorRepository();
            $authorList = $authorRepository->finAll();

            if( !$authorList ) {
                throw new Exception("Authors not found !");
            }

            echo json_encode($authorList);

        } catch(Exception $e) {
            $errorMessage = $e->getMessage();
            var_dump( $errorMessage );
        }
    }

    static function one() {

        try {

            $authorRepository = new AuthorRepository();
            $author = $authorRepository->find();

            if( !$author ) {
                throw new Exception("Author not found !");
            }

            echo json_encode($author);

        } catch(Exception $e) {
            $errorMessage = $e->getMessage();
            var_dump( $errorMessage );
        }
    }

    static function update() {

        try {

            $authorRepository = new AuthorRepository();
            $authorUpdate = $authorRepository->update();

            if(!$authorUpdate) {
                throw new Exception("Impossible to update author !");
            }

            echo json_encode($authorUpdate);

        } catch(Exception $e) {
            $errorMessage = $e->getMessage();
            var_dump( $errorMessage );
        }
    }

    static function create() {

        try {

            $authorRepository = new AuthorRepository();
            $authorCreate = $authorRepository->create();

            if(!$authorCreate) {
                throw new Exception("Impossible to create author !");
            }

            echo json_encode($authorCreate);

        } catch(Exception $e) {
            $errorMessage = $e->getMessage();
            var_dump( $errorMessage );
        }
    }

    static function delete() {

        try {

            $authorRepository = new AuthorRepository();
            $authorDelete = $authorRepository->delete();

            if(!$authorDelete) {
                throw new Exception("Impossible to delete author !");
            }

            echo json_encode($authorDelete);

        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            var_dump( $errorMessage );
        }
    }
}