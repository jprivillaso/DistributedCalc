<?php

/**
 * Description of WebService
 *
 * @author Juan Rivillas
 */


if(!$_REQUEST){
    exit;
}

if(isset($_REQUEST)){
    $webService = new WebService();
    $nameService = $_REQUEST['action'];
    $number1 = $_REQUEST['number1'];
    $number2 = $_REQUEST['number2'];
    
    if($nameService == 'subtract'){
        $webService->subtract($number1, $number2);
    }else if($nameService == 'divide'){
        $webService->divide($number1, $number2);
    }
}

class WebService {
    
    private $result;
    
    public function divide($number1, $number2) {
        $this->result = "The result is ". ($number1 / $number2);
        echo json_encode($this->result);
    }

    public function subtract($number1, $number2) {
        $this->result = "The result is ". ($number1 - $number2);
        echo json_encode($this->result);
    }
}

?>
