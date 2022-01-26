<?php 

class Validation 
{   
    private $regexpassword = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/';

    public function string(string $string)
    {
        $errors = [];
        if(empty($string)) {
            $errors['shortString'] = "Le champ est requis";
            return $errors;
        }
        else {
            return $string;
        }
    }

    public function shortString(string $string)
    {
        $errors = [];
        if(empty($string)) {
            $errors['shortString'] = "Le champ est requis";
            return $errors;
        }
        elseif(strlen($string) > 30) {
            $errors['shortString'] = "Trop long";
            return $errors;
        }
        else {
            return $string;
        }
    }

    public function email(string $email)
    {
        $errors = [];
        if(empty($email)) {
            $errors['email'] = "Le champ est requis";
            return $errors;
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Le format n'est pas correct";
            return $errors;
        }
        else {
            return $email;
        }
    }

    public function password(string $password)
    {
        $errors = [];
        if(empty($password)) {
            $errors['password'] = "Le champ est requis";
            return $errors;
        }
        elseif(!preg_match($this->regexpassword, $password)) {
            $errors['password'] = "Le format n'est pas correct";
            return $errors;
        }
        else {
            return $password;
        }
    }

    public function int(int $int)
    {
        $errors = [];
        if(empty($int)) {
            $errors['int'] = "Le champ est requis";
            return $errors;
        }
        elseif(!filter_var($int, FILTER_VALIDATE_INT)) {
            $errors['int'] = "Le format n'est pas correct";
            return $errors;
        }
        else {
            return $int;
        }
    }

    public function date(string $date)
    {
        $errors = [];
        if(empty($date)) {
            $errors['date'] = "Le champ est requis";
            return $errors;
        }
        elseif(!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date)) {
            $errors['date'] = "Le format n'est pas correct";
            return $errors;
        }
        else {
            return $date;
        }
    }
}