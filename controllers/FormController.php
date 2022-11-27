<?php

namespace app\controllers;
use app\core\Controller;
use app\core\DbConnection;
use app\core\Application;
use mysqli;

class FormController extends Controller
{


  public function index()
  {
    $this->view("survey", "nista", null);
  }
  
  public function createData()
  {
    header('Content-Type: application/json');

  if(isset($_POST['submit'])){

    $new_message = array( 
      "serbia" => $_POST['Serbia'],
      "malta" => $_POST['Malta'],
      "kipar" => $_POST['Kipar'],
      "italia" => $_POST['Italia'],
      "island" => $_POST['Island'],

      "portugal" => $_POST['Portugal'],
      "andora" => $_POST['Andora'],
      "spain" => $_POST['Spain'],
      "france" => $_POST['France'],
      "greece" => $_POST['Greece'],
    );

    $s = $_POST['Serbia'];
    $m = $_POST['Malta'];
    $k = $_POST['Kipar'];
    $it = $_POST['Italia'];
    $is = $_POST['Island'];

    $p = $_POST['Portugal'];
    $a = $_POST['Andora'];
    $sp = $_POST['Spain'];
    $f = $_POST['France'];
    $g = $_POST['Greece'];

   
    if(filesize("country.json") == 0 ){
     
      $first_record = array($new_message);

      $data_to_save = $first_record;

    }else{

      $old_records = json_decode(file_get_contents("country.json"));

    $serbia1 = $old_records[0]->serbia;
    $malta1 = $old_records[1]->malta;
    $kipar1 = $old_records[2]->kipar;
    $italia1 = $old_records[3]->italia;
    $island1 = $old_records[4]->island;

    $portugal1 = $old_records[5]->portugal;
    $andora1 = $old_records[6]->andora;
    $spain1 = $old_records[7]->spain;
    $france1 = $old_records[8]->france;
    $greece1 = $old_records[9]->greece;
 

      $serbia = json_encode($serbia1,JSON_NUMERIC_CHECK);
      $serbia += $s;
      
      $malta = json_encode($malta1,JSON_NUMERIC_CHECK);
      $malta += $m;

      $kipar = json_encode($kipar1,JSON_NUMERIC_CHECK) ;
      $kipar +=$k; 

      $italia = json_encode($italia1,JSON_NUMERIC_CHECK);
      $italia +=$it;

      $island = json_encode($island1,JSON_NUMERIC_CHECK) ;
      $island +=$is;

      $portugal = json_encode($portugal1,JSON_NUMERIC_CHECK);
      $portugal += $p;

      $andora = json_encode($andora1,JSON_NUMERIC_CHECK);
      $andora += $a;

      $spain = json_encode($spain1,JSON_NUMERIC_CHECK);
      $spain += $sp;

      $france = json_encode($france1,JSON_NUMERIC_CHECK);
      $france += $f;

      $greece = json_encode($greece1,JSON_NUMERIC_CHECK);
      $greece += $g;
      
      $iterator = json_encode($old_records[10]->numberUsers);
      $iterator += 1;
     
      $new_message = array( 
        
        array("serbia" =>  $serbia),
        array("malta" =>  $malta) ,
        array("kipar" =>  $kipar) ,
        array("italia" =>  $italia) ,
        array("island" => $island) ,
        array("portugal" =>  $portugal),
        array("andora" =>  $andora) ,
        array("spain" =>  $spain) ,
        array("france" =>  $france) ,
        array("greece" => $greece),

        array("numberUsers" => $iterator)
        );

    
      array_push($new_message);



      $connection = new DbConnection();
      $email =  Application::$app->session->get(Application::$app->session->USER_SESSION);

      $updateSurvey = $connection->con()->query("
        UPDATE users SET is_survey = 'yes' 
        WHERE users.email = '$email';
        ");

      $SurveyYesUsers = $connection->con()->query("

      SELECT users.user_id FROM users 
      WHERE users.is_survey = 'yes';
      
      ");
    
     $Number_of_Users = count(array($SurveyYesUsers));

     // Ukupno za grafik racunamo sada

      $avgSerbia = $serbia/$iterator;
      $avgMalta = $malta/$iterator;
      $avgKipar = $kipar/$iterator;
      $avgItalia = $italia/$iterator;
      $avgIsland = $island/$iterator;
      $avgPortugal =$portugal/$iterator;
      $avgAndora = $andora/$iterator;
      $avgSpain = $spain/$iterator;
      $avgFrance = $france/$iterator;
      $avgGreece = $greece/$iterator;
      
      $data_to_save = $new_message;

     /* return [
      $avgSerbia,
      $avgMalta,
      $avgKipar,
      $avgItalia,
      $avgIsland,
      $avgPortugal,
      $avgAndora,
      $avgSpain,
      $avgFrance,
      $avgGreece
      ];*/


      header("Location: /chartAverage");

    if(!file_put_contents("country.json",json_encode($data_to_save,JSON_PRETTY_PRINT),LOCK_EX)){
      $error = "error storing message,please try again";
    }else{
      $success = "Your answers are stored successfully";
    }
  }


  }
 }


public function getAges()
{
  header('Content-Type: application/json; charset=utf-8');
  

  $mysql =  new mysqli("localhost", "root", "", "anketa") or die();

  $dbResult =  $mysql -> query("select age from users ;") or die(mysqli_error($mysql));

  $resultArray = [];

  while ($result = $dbResult->fetch_assoc()) {
      $resultArray[] = $result;
  }


  echo json_encode($resultArray);


  //echo json_encode(array('text' => 'eggs'));
}

	public function authorize() {

    return ['registered','admin'];
	}
}
