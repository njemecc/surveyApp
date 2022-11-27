<?php

namespace app\controllers;

use app\core\Controller;
use app\core\DbConnection;
use app\core\Application;
use mysqli;

class ChartController extends Controller
{


  public function chartAverage()
  {
 
 
   $this->router->view("averageChart","nista",null);
 
 
 
  }
 
 
 public function chartAge()
 {
   $this->router->view("ageChart","nista",null);
 }
 

	public function authorize() {
    return ['admin','registered','surveyDone'];
	}
}
