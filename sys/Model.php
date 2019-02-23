<?php

namespace ZL;

use Slim\PDO\Database;

class Model implements \ZL\Database
{
    protected $db = null;
    protected $table;
    private $driver;
    private $host;
    private $dbname;
    private $dbuser;
    private $dbpass;
    private $driveHostDbName;
    private $statement;
    private $id;

    public function __construct()
    {
        $this->connect();
    }

    private function config()
    {
        require __DIR__ . '/../config/app.php';
        if ($config['database']['connection']) {
            $this->driver = $config['database']['driver'];
            $this->host = $config['database']['host'];
            $this->dbname = $config['database']['dbname'];
            $this->dbuser = $config['database']['username'];
            $this->dbpass = $config['database']['password'];
            $this->driveHostDbName = "$this->driver:host=$this->host;dbname=$this->dbname;charset=utf8";
            return true;
        }
        return false;
    }

    private function connect()
    {
        if ($this->config()) {
            $this->db = new Database($this->driveHostDbName, $this->dbuser, $this->dbpass);
        }

        return $this->db;
    }

    public function insert($data)
    {
        array_push($this->fillable, 'created_at');
        array_push($data, date('Y-m-d H:i:s'));
        return $this->db->insert($this->fillable)
            ->into($this->table)
            ->values($data)
            ->execute();
    }

    public function create(array $data)
    {

    }

    public function fetchAll()
    {
        return $this->db->select()
            ->from($this->table)
            ->execute()
            ->fetchAll();
    }

    public function find($id)
    {
        $this->id = $id;

        return $this;
    }

    public function delete()
    {
        return $this->db->delete()
            ->from($this->table)
            ->where('id', '=', $this->id)
            ->execute();
    }

    public function get()
    {
        return $this->db->select()
            ->from($this->table)
            ->where('id', '=', $this->id)->execute()->fetch();
    }

    public function update($data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $this->db->update($data)
            ->table($this->table)
            ->where('id', '=', $this->id)
            ->execute();
    }
}
