<?php

/**
 * Description of WSController
 *
 * @author Juan Rivillas
 */

include_once getcwd().'/../Location/FindService.php';

if(isset($_REQUEST)){
    $wsController = new WSController();
    $wsController->robot();
}

class WSController {
       
    public function robot(){
        
        $result = $this->readOperations();
        $childrenNo = $result['childrenNo0'];
                
        for ($index = 0; $index < $childrenNo; $index++) {
            $request_url = $result['url'.$index];
            $request_url.= '?action='.$result['method'.$index];
            $request_url.= '&number1='.$result['number1'.$index];
            $request_url.= '&number2='.$result['number2'.$index];      
            
            echo "Operation No " .$index;
            echo $this->callRemoteService($request_url);
            echo "<br>";
        }
    }
    
    public function callRemoteService($request_url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $request_url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        
        return json_encode($response);
    }
    
    public function readOperations(){
        $locate = new FindService();        
        return $locate->readOperations();        
    }
}

?>
