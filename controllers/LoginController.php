<?php require_once(__DIR__.'/../models/Users.php');
require_once(__DIR__.'/../helpers/Validation.php');

class LoginController 
{
    private $userModel;

    public function index()
    {
        $validation = new Validation;
        $options = array(
            'email' => FILTER_SANITIZE_EMAIL,
            'password' => FILTER_SANITIZE_STRING
        );
        $posts = filter_input_array(INPUT_POST, $options);
        if(!empty($posts)) {
            extract($posts);
            if (is_array($validation->email($email))) {
                return $validation->email($email);
            }
            else if (is_array($validation->password($password))) {
                return $validation->password($password);
            }
            $this->userModel = new UsersModel;
            $user = $this->userModel->getUserByEmail($email);
            if (($user[0]['email'] == $email) && ($user[0]['password'] == $password)) {
                session_start();
                $_SESSION['id'] = $user[0]['id'];
                header("Location: ../views/menu.php");
                exit;
            }
        }
    }

}