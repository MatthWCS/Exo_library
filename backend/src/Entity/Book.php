<?php

namespace src\entity;

class Book {

    private string $bk_isbn;
    private string $bk_name;
    private int $bk_author_id;
    private string $bk_original_name;
    private string $bk_translater;
    private string $bk_format;
    private string $bk_category_id;
    private int $bk_of_month;

    // bk_isbn;
    public function getBkIsbn() :string
    {
        return $this->bk_isbn;
    }

    public function setBkIsbn( $data) :void
    {
        $this->bk_isbn = $data;
    }

    // bk_name;
    public function getBkName() :string
    {
        return $this->bk_name;
    }

    public function setBkName( $data) :void
    {
        $this->bk_name = $data;
    }

    // bk_author_id;
    public function getBkAuthorId() :int
    {
        return $this->bk_author_id;
    }

    public function setBkAuthorId( $data) :void
    {
        $this->bk_author_id = $data;
    }

    // bk_original_name;
    public function getBkOriginalName() :string
    {
        return $this->bk_original_name;
    }

    public function setBkOriginalName( $data) :void
    {
        $this->bk_original_name = $data;
    }

    // bk_translater;
    public function getBkTranslater() :string
    {
        return $this->bk_translater;
    }

    public function setBkTranslater( $data) :void
    {
        $this->bk_translater = $data;
    }

    // bk_format;
    public function getBkFormat() :string
    {
        return $this->bk_format;
    }

    public function setBkFormat( $data) :void
    {
        $this->bk_format = $data;
    }

    // bk_category_id;
    public function getBkCategoryId() :string
    {
        return $this->bk_category_id;
    }

    public function setBkCategoryId( $data) :void
    {
        $this->bk_category_id = $data;
    }

    // bk_of_month;
    public function getBkOfMonth() :int
    {
        return $this->bk_of_month;
    }

    public function setBkOfMonth( $data) :void
    {
        $this->bk_of_month = $data;
    }
}
