<?php require_once('Model.php');

class EmployeesModel extends DefaultModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'employees';
    }

    public function getLastProject(int $id) 
    {
        $sql = 'SELECT * FROM projects';
        $query = $this->db->prepare($sql.'WHERE id_1 = ? ORDER BY id LIMIT 0, 1');
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public function getAdvantages(int $id)
    {
        $sql = 'SELECT * FROM employee_advantage';
        $query = $this->db->prepare($sql.' WHERE employee_id = ?');
        $query->execute([$id]);
        return $query->fetchAll();
    }
}
