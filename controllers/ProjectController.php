<?php require_once(__DIR__ . '/../models/Employees.php');
require_once(__DIR__ . '/../models/Projects.php');
require_once(__DIR__ . '/../helpers/Validation.php');

class ProjectController
{
    private $projectModel;

    public function index()
    {
        $this->projectModel = new ProjectsModel;
        return $this->projectModel->getLastProjects();
    }

    public function getProject(int $id)
    {
        $this->projectModel = new ProjectsModel;
        $project = $this->projectModel->getOne($id);
        return $project[0];
    }

    public function getProjectSteps(int $id)
    {
        $this->projectModel = new ProjectsModel;
        return $this->projectModel->getProjectSteps($id);
    }

    public function getProjectStaff(int $id)
    {
        $this->projectModel = new ProjectsModel;
        return $this->projectModel->getProjectStaff($id);
    }

    public function getProjectMeetings(int $id)
    {
        $this->projectModel = new ProjectsModel;
        return $this->projectModel->getProjectMeetings($id);
    }

    public function update(int $id)
    {
        if (isset($_POST)) {
            $validation = new Validation;
            $options = array(
                'name' => FILTER_SANITIZE_STRING,
                'client' => FILTER_SANITIZE_STRING,
                'specs' => FILTER_SANITIZE_STRING,
            );
            $posts = filter_input_array(INPUT_POST, $options);
            if (!empty($posts)) {
                extract($posts);
                $errors = [];
                switch ($_GET['type_of_data']) {
                    case "details":
                        if (is_array($validation->shortString($name))) {
                            array_push($errors, $validation->shortString($name));
                        } else if (is_array($validation->shortString($client))) {
                            array_push($errors, $validation->shortString($client));
                        } else if (is_array($validation->string($specs))) {
                            array_push($errors, $validation->string($specs));
                        }
                        break;
                    default: 
                        $errors = ["no_type" => "no-type-given"];
                        break;
                }
                $projectModel = new ProjectsModel;
                if (empty($errors)) {
                    $projectModel->update($id, $posts);
                } else {
                    return $errors;
                }
            }
        }
    }
}
