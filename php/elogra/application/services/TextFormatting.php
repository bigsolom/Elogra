<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TextFormatting
 *
 * @author efoad
 */
class Application_Service_TextFormatting {
    //put your code here
    
    public static function htmlNlEncoding2Br($input){
        return preg_replace("/&#13;&#10;/", "<br/>", $input);
    }
    
    public static function htmlNlEncoding2LineFeed($input){
        return preg_replace("/&#13;&#10;/", "\\n", $input);
    }
    
    public static function isArabic($char){
        $pattern = '/^[\x{0600}-\x{06FF}]$/u';
        return(preg_match($pattern, $char));
    }
    
     public static function time_difference($date){
        if(empty($date)) {
            return "No date provided";
        }

        $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
        $lengths = array("60","60","24","7","4.35","12","10");

        $now = time();
        $unix_date = strtotime($date);

        // check validity of date
        if(empty($unix_date)) {   
            return "Bad date";
        }

        // is it future date or past date
        if($now > $unix_date) {   
            $difference = $now - $unix_date;
            $tense = "ago";

        } else {
            $difference = $unix_date - $now;
            $tense = "from now";
        }

        for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
            $difference /= $lengths[$j];
        }

        $difference = round($difference);

        /*if($difference != 1) {
            $periods[$j].= "s";
        }*/

        //return "$difference $periods[$j] {$tense}";
        if($j > 3){
            return Application_Service_Translate::_('ago');
        }else{
            return self::englishToArabic($difference, $periods[$j]);
        }
    }
    
    public static function englishToArabic($number_en, $period) {
        $periods = array("second", "minute", "hour", "day", "week", "month", "year");
        $periods_ar = array("ثانية", "دقيقة", "ساعة", "يوم", "اسبوع", "شهر", "سنه");
        $_arabic = array('&#x0660','&#x0661', '&#x0662', '&#x0663', '&#x0664', '&#x0665', '&#x0666', '&#x0667', '&#x0668', '&#x0669');
        $_en = array('0','1', '2', '3', '4', '5', '6', '7', '8', '9');
        
        $number_ar ='';
        for($i = 0, $maxI = strlen($number_en); $i< $maxI; $i++) {
            $v = substr($number_en, $i, 1);
            $idx = array_search($v, $_en);

            if($idx !== FALSE) {
                $number_ar .= $_arabic[$idx];
            }
        }
        
        $periodIdx = array_search($period, $periods);
        $periodAr = $periods_ar[$periodIdx];
//return "$number_ar ".Application_Service_Translate::_($period);
        return "$number_ar $periodAr";
    }
    
    /**
     * check if the given string is empty, null or contains spaces only
     * @param type $str
     * @return type boolean
     */
    public static function isNullOrEmptyOrSpacesOnly($str) {
        if ($str == null || $str == '')
            return true;
        $trimmedStr = trim($str);
        if ($trimmedStr == '')
            return true;

        return false;
    }
}

?>
