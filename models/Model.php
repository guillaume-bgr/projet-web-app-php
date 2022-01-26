<?php require_once(__DIR__.'/../database/database.php');

class DefaultModel 
{
    protected $db;
    protected $id;
    protected $table;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM '.$this->table;
        $query = $this->db->query($sql);
        return $query->fetchAll();
    }

    public function getOne(int $id) 
    {
        $sql = 'SELECT * FROM '.$this->table;
        $query = $this->db->prepare($sql.' WHERE id=?');
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public function create(array $params) 
    {
        $inserts = '';
        $columns = '';
        foreach ($params as $key => $param) {
            $isString = is_string($param);
            $columns = $columns.($columns == '' ? '' : ' ,').$key;
            $inserts = $inserts.($inserts == '' ? '' : ' ,').($isString ? '"'.$param.'"': $param);
        }
        $columns = '('. $columns. ')';
        $inserts = ' VALUES ('. $inserts. ')';
        $sql = 'INSERT INTO '.$this->table.' ';
        $query = $this->db->prepare($sql.$columns.$inserts);
        return $query->execute();
    }

    public function update(int $id, array $params) 
    {
        $index = 1;
        $updates = '';
        foreach ($params as $key => $param) {
            $isString = is_string($param);
            $updates = $updates.($updates == '' ? '' : ' ,'). $key.' = '.($isString ? '"'.$param.'"': $param);
            $index = $index + 1;
        }
        $sql = 'UPDATE '.$this->table.' SET ';
        $where = 'WHERE id = ';
        $query = $this->db->prepare($sql.$updates.$where.$id);
        return $query->execute();
    } 

    public function delete(int $id)
    {
        $sql = 'DELETE FROM '.$this->table.' WHERE id='.$id;
        $query = $this->db->prepare($sql);
        $response = $query->execute();
    }
}

