<?php
namespace App\tagController;
use App\Models\tag;

class tagController
{
    public $tag;
    public function __construct()
    {
        $this->tag = new tag();
    }

    
}