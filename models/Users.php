<?php
class Users{
    private int $id;
    private string $fullname;
    private string $username;
    private string $password;
    public function __construct($id, $fullname, $username, $password) {
        $this->id = $id;
        $this->fullname = htmlentities($fullname);
        $this->username = htmlentities($username);
        $this->password = htmlentities($password);
    }
    public function getid(){
        return $this->id;
    }
    public function getfullname(){
        return $this->fullname;
    }
    public function getusername(){
        return $this->username;
    }
    public function getpassword(){
        return $this->password;
    }
}
?>