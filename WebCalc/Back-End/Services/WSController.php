<?php

/**
 * Description of WSController
 *
 * @author Juan Rivillas
 */

include_once getcwd().'/../Location/FindService.php';

if(isset($_POST)){
    $action = $_POST['action'];
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $wsController = new WSController();
    
    $request_url = $wsController->serviceLocator($action);
    $request_url.= '?action='.$action;
    $request_url.= '&number1='.$number1;
    $request_url.= '&number2='.$number2;      
     
    $wsController->callRemoteService($request_url);
}

class WSController {
    
    public function callRemoteService($request_url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $request_url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        
        $array = explode('"' , $response);
        
        echo json_encode($array[1]);
    }
    
    public function serviceLocator($action){
        $locate = new FindService();
        
        return $locate->searchService($action);        
    }
}

?>
