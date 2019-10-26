<?php

function results($x){
        $x = isset($_REQUEST[$x]) ? $_REQUEST[$x] : '';
        if($x!=''){
            $x = htmlspecialchars(trim($x));
            return $x;
    }
}

function dodaj() {
    
    $array = isset($_REQUEST['tech']) ? $_REQUEST['tech'] : '';
    if(!empty($array)){
        foreach($array as $item) {
            $item = htmlspecialchars(trim($item));
        }}

    $args = array(

        'lastName' => ['filter' => FILTER_VALIDATE_REGEXP,
                    'options' => ['regexp' => '/^[A-Z]{1}+[a-ząęółśżźćń]{1,25}$/']
        ],
        'email' => FILTER_VALIDATE_EMAIL,
        'country' => FILTER_SANITIZE_FULL_SPECIAL_CHARS

        );

        $dane = filter_input_array(INPUT_POST, $args);
        
        //var_dump($dane);

        $errors = "";
        foreach ($dane as $key => $val) {
            if ($val === false or $val === NULL) {
            $errors .= $key . " ";
        }
        }
        if ($errors === "") {

            $myObj = new stdClass();
            $myObj->lastName = results('lastName');
            $myObj->email = results('email');
            $myObj->country = results('country');
            $myObj->language = $array;
            
            $myfile = file_get_contents($_SERVER['DOCUMENT_ROOT']."/PLIKI/file.json");
            $tmpJsonArray = json_decode($myfile,true);
        
            array_push($tmpJsonArray,$myObj);
            $toSendJSON = json_encode($tmpJsonArray);
            file_put_contents($_SERVER['DOCUMENT_ROOT']."/PLIKI/file.json",$toSendJSON);

             //techs stats
               
        $array = isset($_REQUEST['tech']) ? $_REQUEST['tech'] : '';
        if(!empty($array)){
            foreach($array as $item) {
                $item = htmlspecialchars(trim($item));
            }}

        $myfile2 = file_get_contents($_SERVER['DOCUMENT_ROOT']."/PLIKI/ankieta.json");
        $tmpJsonArray = json_decode($myfile2,true);

            if(!empty($array)){
               

                    foreach ($tmpJsonArray as &$currentJson) { 

                        foreach($array as $keyUp){

                            if($keyUp == $currentJson['languageSingleton'])  {
                                $currentJson['quantity'] ++;
                            }  
                }   
                }  
            }
            $toSendJSON = json_encode($tmpJsonArray); 
            file_put_contents($_SERVER['DOCUMENT_ROOT']."/PLIKI/ankieta.json",$toSendJSON);

        } else {
        echo "<br>Nie poprawnie dane: " .  $errors;
        }


       
       
 }
 
function pokazAll(){
    
    $json_data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/PLIKI/file.json");
  
    $array= json_decode($json_data,true);
    
    $i = 1;
    foreach ($array as $key => $jsons) { 
        print ("Values for JSON No. ".$i.": <br />");
                $i++;
        foreach($jsons as $key => $value) {
            if(!is_array($value) ){
                print($value."<br />");
            }else {
                foreach($value as $item){
                    print($item."<br />");
                }
            }
            
       }
       print("<br />");
   }

}


function pokazJezyk($jezyk){
    
    $json_data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/PLIKI/file.json");
  
    $array= json_decode($json_data,true);
    
    $bool = false;
    $i = 1;

    foreach ($array as $key => $jsons) {

        foreach($jsons as $key => $value){
            if(is_array($value)){
                if( in_array($jezyk,$value) ){
                    $bool = true;
                }
            }
        }

        if($bool){
                print ("Values for JSON No. ".$i.": <br />");
                        $i++;
                foreach($jsons as $key => $value) {
                    if(!is_array($value) ){
                        print($value."<br />");
                    }else {
                        foreach($value as $item){
                            print($item."<br />");
                        }
                    }
                    
            }
            print("<br />");
        }
        $bool = false;
    }
    
}

function showStats(){

    $json_data = file_get_contents($_SERVER['DOCUMENT_ROOT']."/PLIKI/ankieta.json");
  
    $array= json_decode($json_data,true);
    $tablica = '<table class="stats1">';

    foreach ($array as $key => $jsons) { 
        $tablica = $tablica.'<tr class="stats2">';
        foreach($jsons as $key => $value) {
            if(!is_array($value) ){
                $tablica = $tablica.'<td class="stats2">'.(string)$value.'</td>';
                }
            }
            $tablica = $tablica.'<tr />';
            
       } 
        $tablica."<table/>";
       echo $tablica;

}



