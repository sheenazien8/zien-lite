<?php
namespace App\Models;

use ZL\Model;

class Home extends Model
{
    private $_db;
    public function __construct()
    {
        $this->_db = new Model;
    }
}
