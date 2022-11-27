<?php
namespace app\models;
use app\core\DbModel;

class RegistrationModel extends DbModel
{
    public $age;
    public string $email;
  
    public string $password;

    public function rules(): array
    {
        return [
            'email' => [self::RULE_EMAIL],
          
            'password' => [self::RULE_REQUIRED]
            ];
    }

    public function registration()
    {
        $user = new UserModel();
        $role = new RoleModel();
        $userRoles = new UserRolesModel();
        $user->mapData($user->one("email = '$this->email'"));
        
      $nesto =  $user->one("email = '$this->email'")?? null;

      $BazaEmail = $nesto['email']?? '';
      
        if($BazaEmail == null){

            $this->password = password_hash($this->password, PASSWORD_DEFAULT);
            $this->create();
            
            $user2 = new UserModel();
            $user2->mapData($user2->one("email = '$this->email'"));
        

            $role->mapData($role->one("role_name = 'registered'"));

            $email = $user->email;
    
    
    
    
            
    
           
    
    
            $userRoles->id_user = $user2->user_id;

          

            $userRoles->id_role = $role->role_id;
            $userRoles->create();

        }else{
            echo "Email se vec koristi";
        }




    }

    public function tableName()
    {
        return "users";
    }

    public function attributes(): array
    {
        return [
            "email",
            
            "password",
            "age"
        ];
    }
}