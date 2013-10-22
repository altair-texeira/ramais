<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    function replace_char($string){ 
        $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿŔŕ-<>~.:|\/
            '; 
        $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr__________';
        $string = str_replace(" ","",  
                    str_replace("'","",
                        str_replace('"',"",str_replace('
                            ','',$string))));
        $string = utf8_decode(trim($string));     
        $string = strtr($string, utf8_decode($a), $b); 
        $string = strtolower($string); 
        return utf8_encode($string); 
    } 
    
    function db_date($date = '', $dmh = false)
    {
            $date = str_replace('/', '-', $date);
            $date = str_replace(' ','',$date);
            $date = str_replace('.','-',$date);
            $date = str_replace(PHP_EOL, '', $date);
            $date = explode('-', $date);
            $date = strlen($date[2]) == 4 ? "{$date[2]}-{$date[1]}-{$date[0]}" : "{$date[0]}-{$date[1]}-{$date[2]}";
            $date = explode('-', $date);
            $date[1] = strlen($date[1]) == 1 ? "0{$date[1]}" : $date[1];
            $date[2] = strlen($date[2]) == 1 ? "0{$date[2]}" : $date[2];
           
            if((int)$date[2]< 1 ||
               (int)$date[2]>31 ||
               strlen($date[2]) > 2 ||
               (int)$date[1] < 1 ||
               (int)$date[1] >12 ||
               strlen($date[1]) > 2 ||
               (int)$date[0] < 1969 ||
               strlen($date[0]) != 4)
            {
                return FALSE;
            }
            elseif($dmh){
                return "{$date[2]}-{$date[1]}-{$date[0]}";
            }
            else{
                return "{$date[0]}-{$date[1]}-{$date[2]}";
            }
    }
    function ajax_tab($rows =  array())
    {
        $li = array();
        foreach ($rows as $row)
        {
            $li[] = "<li> <a href='".base_url().$row['link']."'>{$row['title']}</a></li>";
        }
        return "<div id='tabs'>
                    <ul>".  join(PHP_EOL, $li)."</ul>
                </div>";
    }
    
    function array_to_json($array = array()){
       $array = implode("', '", $array);
       $array =  "['".$array."']";
       return $array;
    }
    
     function number_to_json($number = array()){
       $number = implode(', ', $number);
       $number =  '['.$number.']';
       return $number;
    }
    
    function drill_to_json($drill = array()){
        $drill = implode('}, {', $drill);
        $drill = '[{'.$drill. '}]';
        return $drill;
    }
    
?>
