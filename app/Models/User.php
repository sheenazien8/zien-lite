<?php
/**
 * Created by PhpStorm.
 * User: zien
 * Date: 17/02/19
 * Time: 6:00
 */

namespace App\Models;

use ZL\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'username',
        'password',
        'email',
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function getUser($user)
    {
        $statement = $this->db->select()
            ->from($this->table)
            ->where('username', '=', $user['username'])
            ->execute();
        $data = $statement->fetch();


        return $data;
    }
}
