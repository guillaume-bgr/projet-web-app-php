<?php require_once('Model.php');

class ProjectsModel extends DefaultModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'projects';
    }

    public function getEmployeeProjects(int $id) 
    {
        $sql = 'SELECT * FROM project_role INNER JOIN projects ON `project_role`.`id_1` = `projects`.`id` WHERE `project_role`.`id` = ? LIMIT 0, 5';
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public function getLastProjects()
    {
        $sql = 'SELECT * FROM projects ORDER BY `projects`.`id` DESC LIMIT 0, 9';
        $query = $this->db->query($sql);
        return $query->fetchAll();
    }

    public function getProjectSteps(int $id) 
    {
        $sql = 'SELECT * FROM project_steps WHERE id_1= ? ORDER BY id DESC';
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public function getProjectStaff(int $id) 
    {
        $sql = 'SELECT * FROM project_role INNER JOIN employees ON `project_role`.`id` = `employees`.`id` WHERE id_1= ?';
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public function getProjectMeetings(int $id) 
    {
        $sql = 'SELECT * FROM project_meetings WHERE id_1= ?';
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        return $query->fetchAll();
    }
}
