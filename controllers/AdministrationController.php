<?php

namespace app\controllers;

use app\core\Controller;
use mysqli;

class AdministrationController  extends Controller
{
    public function users()
    {
        $this->view("users", "dashboard", null);
    }

public function ApiuserList()
{
    $mysql =  new mysqli("localhost", "root", "", "anketa") or die();

    $dbResult =  $mysql -> query("select * from users where is_survey != 'yes' ;") or die(mysqli_error($mysql));

    
    $resultArray = [];

    while ($result = $dbResult->fetch_assoc()) {
        $resultArray[] = $result;
    }

    echo json_encode($resultArray);

}


public function userList()
{
   $this->router->view("users","dashboard",null);
}

 

    public function authorize()
    {
        return ["admin"];
    }
}