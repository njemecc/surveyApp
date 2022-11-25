<?php

namespace app\core;

abstract class Controller
{
    public Router $router;

    public function __construct()
    {
        $this->router = new Router();
        $this->checkRoles();
    }

    abstract public function authorize();

    public function view($view, $layout, $params)
    {
        return $this->router->view($view, $layout, $params);
    }

    public function partialView($view, $params)
    {
        return $this->router->partialView($view, $params);
    }

    public function checkRoles()
    {
        $roles = $this->authorize();
        if ($roles === []) return;

        
        $access = false;
        $email = Application::$app->session->get(Application::$app->session->USER_SESSION);
        $userRoles = $this->getRoles();

   
        
        if ($email !== false) {
            foreach ($roles as $role) {
                foreach ($userRoles as $userRole)
                {
                    if ($role === $userRole)
                    {
                        $access = true;
                    }
                }
            }

            if (!$access) {
                header("location:" . "/accessDenied");
            }
            return;
        }

        header("location:" . "/login");
    }

    public function getRoles() 
    {

        if (Application::$app->session->get(Application::$app->session->ROLE_SESSION) !== false)
        {

            

            return Application::$app->session->get(Application::$app->session->ROLE_SESSION);
        }

        $connection = new DbConnection();
        $email =  Application::$app->session->get(Application::$app->session->USER_SESSION);

       
       
        

        $resultFromDb = $connection->con()->query("
        SELECT r.role_name FROM users u 
        INNER JOIN user_roles ur ON u.user_id = ur.id_user
        INNER JOIN roles r ON ur.id_role = r.role_id
        WHERE u.email = '$email';
        ");

        
      

        $resultArray = [];

        while ($result = $resultFromDb->fetch_assoc()) {
            $resultArray[] = $result["role_name"];
        }

        Application::$app->session->set(Application::$app->session->ROLE_SESSION, $resultArray);

        
        return $resultArray;
    }
}