<?php

namespace App\entity;

class User {

    private int $usr_id;
    private string $usr_name;
    private string $usr_email;
    private string $usr_passwd;
    private string $usr_created_at;


    // usr_id
    public function getUsrId() :int
    {
        return $this->usr_id;
    }

    public function setUsrId( $data) :void
    {
        $this->usr_id = $data;
    }

    // usr_name
    public function getUsrName() :string
    {
        return $this->usr_name;
    }

    public function setUsrName( $data) :void
    {
        $this->usr_name = $data;
    }

    // usr_email
    public function getUsrEmail() :string
    {
        return $this->usr_email;
    }

    public function setUsrEmail( $data) :void
    {
        $this->usr_email = $data;
    }

    // usr_passwd
    public function getUsrPasswd() :string
    {
        return $this->usr_passwd;
    }

    public function setUsrPasswd( $data) :void
    {
        $this->usr_passwd = $data;
    }    
    // usr_created_at
    public function getUsrCreatedAt() :string
    {
        return $this->usr_created_at;
    }

    public function setUsrCreatedAt( $data) :void
    {
        $this->usr_created_at = $data;
    }

}