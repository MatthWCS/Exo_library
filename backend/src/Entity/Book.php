<?php

namespace App\Entity;

class Book {

    private string $bk_isbn;
    private string $bk_name;
    private int $bk_author_id;
    private ?string $bk_original_name=null;
    private ?string $bk_translater=null;
    private string $bk_format;
    private string $bk_category_id;
    private int $bk_of_month;
    private ?string $bk_cover=null;

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
    public function getBkOriginalName() :string|null
    {
        return $this->bk_original_name;
    }

    public function setBkOriginalName( $data) :void
    {
        $this->bk_original_name = $data;
    }

    // bk_translater;
    public function getBkTranslater() :string|null
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

    // bk_cover;
    public function getBkCover() :string|null
    {
        return $this->bk_cover;
    }

    public function setBkCover( $data) :void
    {
        $this->bk_cover = $data;
    }

    public function bookPrepareJson() :array
    {
            $data=
            [
                'bk_isbn' => $this->getBkIsbn(),
                'bk_name' => $this->getBkName(),
                'bk_author_id' => $this->getBkAuthorId(),
                'bk_original_name' => $this->getBkOriginalName(),
                'bk_translater' => $this->getBkTranslater(),
                'bk_format' => $this->getBkFormat(),
                'bk_category_id' => $this->getBkCategoryId(),
                'bk_of_month' => $this->getBkOfMonth(),
                'bk_cover' => $this->getBkCover()
            ];

            return $data;
    }

    // public function bookJsonSerialize() :array
    // {
       
    //     foreach ($data as $key => $value) 
    //     {
    //         $data=
    //         [
    //             'bk_isbn' => $this->bk_isbn,
    //             'bk_name' => $this->bk_name,
    //             'bk_author_id' => $this->bk_author_id,
    //             'bk_original_name' => $this->bk_original_name,
    //             'bk_translater' => $this->bk_translater,
    //             'bk_format' => $this->bk_format,
    //             'bk_category_id' => $this->bk_category_id,
    //             'bk_of_month' => $this->bk_of_month,
    //             'bk_cover' => $this->bk_cover
    //         ];

    //         return $data;
    //     }
    // }
}
