<?php require_once(__DIR__.'/../models/Employees.php');
require_once(__DIR__.'/../models/Projects.php');
require_once(__DIR__.'/../helpers/Validation.php');

class TeamController 
{
    private $employeeModel;
    private $projectModel;

    public function index()
    {
        $this->employeeModel = new EmployeesModel;
        return $this->employeeModel->getAll();
    }

    public function getEmployee(int $id)
    {
        $this->employeeModel = new EmployeesModel;
        $employee = $this->employeeModel->getOne($id);
        return $employee[0];
    }

    public function getAdvantages(int $id)
    {
        $this->employeeModel = new EmployeesModel;
        return $this->employeeModel->getAdvantages($id);
    }

    public function getLastProjects(int $id)
    {
        $this->projectModel = new ProjectsModel;
        return $this->projectModel->getEmployeeProjects($id);
    }

    public function delete(int $id) {
        $this->projectModel = new EmployeesModel;
        return $this->projectModel->delete($id);
    }

    public function update(int $id)
    {
        if(isset($_POST)) {
            $validation = new Validation;
            $options = array(
                'first_name' => FILTER_SANITIZE_STRING,
                'last_name' => FILTER_SANITIZE_STRING,
                'email' => FILTER_SANITIZE_EMAIL,
                'job' => FILTER_SANITIZE_STRING,
                'age' => FILTER_SANITIZE_NUMBER_INT,
                'start_hour' => FILTER_SANITIZE_NUMBER_INT,
                'end_hour' => FILTER_SANITIZE_NUMBER_INT,
                'turnover' => FILTER_SANITIZE_NUMBER_INT,
                'hire_date' => FILTER_SANITIZE_STRING
            );
            $posts = filter_input_array(INPUT_POST, $options);
            if(!empty($posts)) {
                extract($posts);
                $errors = [];
                if (is_array($validation->shortString($first_name))) {
                    array_push($errors, $validation->shortString($first_name));
                }
                else if (is_array($validation->shortString($last_name))) {
                    array_push($errors, $validation->shortString($last_name));
                }
                else if (is_array($validation->email($email))) {
                    array_push($errors, $validation->email($last_name));
                }
                else if (is_array($validation->shortString($job))) {
                    array_push($errors, $validation->shortString($job));
                }
                else if (is_array($validation->int($age))) {
                    array_push($errors, $validation->int($age));
                }
                else if (is_array($validation->int($start_hour))) {
                    array_push($errors, $validation->int($start_hour));
                }
                else if (is_array($validation->int($end_hour))) {
                    array_push($errors, $validation->int($end_hour));
                }
                else if (is_array($validation->int($turnover))) {
                    array_push($errors, $validation->int($turnover));
                }
                else if (is_array($validation->date($hire_date))) {
                    array_push($errors, $validation->date($hire_date));
                }
                $employeeModel = new EmployeesModel;
                if (empty($errors)) {
                    $employeeModel->update($id, $posts);
                }
                else {
                    return $errors;
                }
            }
        }
    }
}

$controller = new TeamController;

if (isset($_GET['method']) && $_GET['method'] == "index") {
    $json = json_encode($controller->index());
    echo $json;
}

if (isset($_GET['method']) && $_GET['method'] == "advantages") {
    if (isset($_GET['id'])) {
        $json = json_encode($controller->getAdvantages($_GET['id']));
        echo $json;
    }
}

if(isset($_GET['method']) && $_GET['method'] == "delete") {
    if (isset($_GET['id'])) {
        $json = json_encode($controller->delete($_GET['id']));
    }
}