<?php

/**
 * Description of LocatorTest
 *
 * @author Juan Rivillas
 */

class FindService {

    public function readOperations() {
        $xml = simplexml_load_file("../Location/ServicesLocation.xml");
        
        $childrenNumber = $xml->children()->count();
        $finalArray = array();
        
        for ($index = 0; $index < $childrenNumber; $index++) {
            $url = $xml->webservice[$index]->url;            
            $method = $xml->webservice[$index]->method;
            $number1 = $xml->webservice[$index]->params[0]->p1;
            $number2 = $xml->webservice[$index]->params[0]->p2;
            
            $newArray = array('childrenNo'.$index => $childrenNumber , 'url'.$index => $url, 'method'.$index => $method, 
                'number1'.$index => $number1, 'number2'.$index => $number2);  
            
            $finalArray = array_merge($finalArray , $newArray);
        }
        
        return $finalArray;
    }
}

?>
 