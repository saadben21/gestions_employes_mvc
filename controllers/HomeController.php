<?php

class HomeController{
    public static function index($page){
      //  var_dump($page);
      //  include('views/'.$page.'.php');
      switch($page)
      {
        case 'register':UserController::register();
        break;
        case 'login':UserController::auth();
        break;
        case 'home':EmployerController::getAllEmployers();
        break;
        case 'update':EmployerController::getOneEmployer();
        break;
        case 'add':EmployerController::addEmployer();
        break;
        case 'delete':EmployerController::deleteEmployer();
        break;
        case 'logout':UserController::logout();break;
        default:
      }
    }

}
?>