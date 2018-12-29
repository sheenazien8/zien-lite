<?php
namespace App\Models;

use ZL\Model;

class Home extends Model
{
    private $DB;
    public function __construct()
    {
        $this->DB = new Model;
    }
}
