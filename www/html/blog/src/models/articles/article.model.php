<?php

class Article
{
    private $table = 'articles';

    // Properties
    private $id;
    private $title;
    private $image;
    private $text;
    private $createAt;

    // Constructor
    public function __construct($id, $title, $image, $text, $createAt)
    {
        $this->id = $id;
        $this->title = $title;
        $this->image = $image;
        $this->text = $text;
        $this->createAt = $createAt;
    }


    // Setters and Getters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;
    }

    public function getCreateAt()
    {
        return $this->createAt;
    }

}