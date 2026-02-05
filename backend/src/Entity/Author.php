<?php

namespace src\entity;

class Author {
    private int $auth_id;
    private string $auth_firstname;
    private string $auth_lastname;

    //auth_id
    public function getAuthId() :int
    {
        return $this->auth_id;
    }

    public function setAuthId( $data) :void
    {
        $this->auth_id = $data;
    }

    //auth_firstname
    public function getAuthFirstname() :string
    {
        return $this->auth_firstname;
    }

    public function setAuthFirstname( $data) :void
    {
        $this->auth_firstname = $data;
    }

    //auth_lastname
    public function getAuthLastname() :string
    {
        return $this->auth_lastname;
    }

    public function setAuthLastname( $data) :void
    {
        $this->auth_lastname = $data;
    }

}