<?php 
    $status = 400;
    $data = "Error"; 

    $name1 = str_replace(" ","", strtolower($_REQUEST['name1']));
    $name2 = str_replace(" ","", strtolower($_REQUEST['name2']));

    /* START FLAMES CODE */
    
    $str1 = str_split($name1);
    $str2 = str_split($name2);

    foreach ($str1 as $char1) {
        foreach ($str2 as $char2){
            if ($char1 === $char2){
                $key1 = array_search($char1, $str1, true);
                unset($str1[$key1]);
                $key2 = array_search($char2, $str2, true);
                unset($str2[$key2]);
            }
        }
    }

    $count= (count($str1) + count($str2)) % 6;

    switch ($count) {
        case 0 :
            $data = "Soulmates";
            break;
        case 1 :
            $data = "Friends";
            break;
        case 2 :
            $data = "Lovers";
            break;
        case 3 :
            $data = "Admirers";
            break;
        case 4 :
            $data = "Marriage";
            break;
        case 5 :
            $data = "Enemies";
            break;
    }
        
    $status = 200;
    /* END FLAMES CODE */

    $myObj = array(
        'status' => $status,
        'data' => $data,
    );
    echo json_encode($myObj, JSON_FORCE_OBJECT);
?>