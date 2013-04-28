<?php

/**
 * Description of WebService
 *
 * @author Juan Rivillas
 */

include '/../Interface/WSCalc1Interface.php';

if(!$_REQUEST){
    exit;
}

if(isset($_REQUEST)){
    $webService = new WebService();
    $nameService = $_REQUEST['action'];
    $number1 = $_REQUEST['number1'];
    $number2 = $_REQUEST['number2'];
    
    if($nameService == 'sum'){
        $webService->sum($number1, $number2);
    }else if($nameService == 'multiply'){
        $webService->multiply($number1, $number2);
    }
}

class WebService{
    
    public function sum($number1, $number2){
        $this->result = "The result is ". ($number1 + $number2);
        echo json_encode($this->result);
    }
    
    public function multiply($number1, $number2){
        $this->result = "The result is ". ($number1 * $number2);
        echo json_encode($this->result);
    }
}

?>
