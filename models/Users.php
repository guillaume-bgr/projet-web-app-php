<?php require_once('Model.php');

class UsersModel extends DefaultModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'users';
    }

    public function getUserByEmail(string $email) 
    {
        $sql = 'SELECT * FROM '.$this->table;
        $query = $this->db->prepare($sql.' WHERE email=?');
        $query->execute([$email]);
        return $query->fetchAll();
    }
}
