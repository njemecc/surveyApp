<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\LoginModel;
use app\models\RegistrationModel;
use app\core\DbConnection;
use app\models\UserModel;
use app\models\UserRolesModel;

class AuthController extends Controller
{
    public function login()
    {
        if (Application::$app->session->get(Application::$app->session->USER_SESSION) !== false)
        {
            header("location:" . "/home");
        }
        return $this->view("login", "auth", null);
    }

    public function accessDenied()
    {
        return $this->view("accessDenied", "auth", null);
    }

    public function loginProcess()
    {
        $login = new LoginModel();
        $user_roles = new UserRolesModel();
        $login->mapData($this->router->request->all());
        $login->validate();
        if ($login->errors)
        {
            return $this->view("login", "auth", $login);
        }

        if ($login->login())
        {
            Application::$app->session->set(Application::$app->session->USER_SESSION, $login->email);
           
            
          
            
        $connection = new DbConnection();
        $email =  Application::$app->session->get(Application::$app->session->USER_SESSION);

        
      $Dbquery = $connection->con()->query("
        SELECT is_survey from users 
        WHERE users.email = '$email';
        ");
      
       $resultArray = [];

       while ($result = $Dbquery->fetch_assoc()) {
           $resultArray[] = $result;
       }

       $rola = $connection->con()->query("
       
       SELECT id_role from user_roles 
       INNER JOIN users on user_roles.id_user = users.user_id
       WHERE users.email = '$email';
       
       
       "
    );

  
    $pravaRola = $rola->fetch_assoc()["id_role"];

 
     
       if($resultArray[0]['is_survey'] == 'yes'){
        

        if($pravaRola == '2'){

            header("location:" . "/home");
            exit;
        }

        


        $kveri = $connection->con()->query("
        SELECT user_id from users  
        where users.email = '$email';
        ");

       
      $user_id = $kveri->fetch_assoc()['user_id'];
 

        header("location:" . "/chartAverage");
       
        $query =  $connection->con()->query("
        UPDATE user_roles SET id_role = '3'
        WHERE user_roles.id_user = '$user_id';
        ");


       }
        
        else{

            header("location:" . "/home");
        }
    
            

        }

        Application::$app->session->setFlash(Application::$app->session->FLASH_MESSAGE_ERROR, "Login nije uspesno prosao!");

        return $this->view("login", "auth", $login);
    }

    public function logout()
    {
        Application::$app->session->remove(Application::$app->session->USER_SESSION);
        Application::$app->session->remove(Application::$app->session->ROLE_SESSION);
        header("location:" . "/login");
    }

    public function registration()
    {
        return $this->view("registration", "auth", null);
    }

    public function registrationProcess()
    {
        $registration = new RegistrationModel();
        $registration->mapData($this->router->request->all());
        $registration->validate();

        if ($registration->errors)
        {
            Application::$app->session->setFlash(Application::$app->session->FLASH_MESSAGE_ERROR, "Registracija nije uspesno zavrsena!");

            return $this->view("registration", "auth", $registration);
        }

        $registration->registration();

        Application::$app->session->setFlash(Application::$app->session->FLASH_MESSAGE_SUCCESS, "Uspesna registracija!");

        return $this->view("registration", "auth", null);
    }

    public function authorize()
    {
        return [];
    }
}