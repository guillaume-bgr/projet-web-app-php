<?php require_once(__DIR__.'/../models/Users.php');
require_once(__DIR__.'/../helpers/Validation.php');

class RegisterController 
{
    private $userModel;

    public function index()
    {
        if(isset($_POST)) {
            $validation = new Validation;
            $options = array(
                'first_name' => FILTER_SANITIZE_STRING,
                'last_name' => FILTER_SANITIZE_STRING,
                'email' => FILTER_SANITIZE_EMAIL,
                'role' => FILTER_SANITIZE_NUMBER_INT,
                'company' => FILTER_SANITIZE_STRING,
                'password' => FILTER_SANITIZE_STRING,
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
                else if (is_array($validation->shortString($role))) {
                    array_push($errors, $validation->shortString($role));
                }
                else if (is_array($validation->shortString($company))) {
                    array_push($errors, $validation->shortString($company));
                }
                else if (is_array($validation->shortString($password))) {
                    array_push($errors, $validation->shortString($password));
                }
                $this->userModel = new UsersModel;
                if (empty($errors)) {
                    $this->userModel->create($posts);
                }
                else {
                    
                    return $errors;
                }
            }
        }
    }
}