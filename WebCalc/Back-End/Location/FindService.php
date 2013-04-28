<?php

/**
 * Description of LocatorTest
 *
 * @author Juan Rivillas
 */

class FindService {

    public function searchService($action) {
        $xml = simplexml_load_file("../Location/ServicesLocation.xml");
        
        if($action == 'sum' || $action == 'multiply'){
            return $xml->wscalc[0]->url;
        }else if($action == 'subtract' || $action == 'divide'){
            return $xml->wscalc[1]->url;
        }
    }
}

?>
