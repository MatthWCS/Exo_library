<?php

namespace src\entity;

class Category {

    private int $ctg_id;
    private string $ctg_name;

    // ctg_id
    public function getCtgId() :int
    {
        return $this->ctg_id;
    }

    public function setCtgId( $data) :void
    {
        $this->ctg_id = $data;
    }

    // ctg_name
        public function getCtgName() :string
    {
        return $this->ctg_name;
    }

    public function setCtgName( $data) :void
    {
        $this->ctg_name = $data;
    }
}