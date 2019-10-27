<?php
function Danefy_time($Time)
{
  $dag = array("Man","Tir","Ons","Tor","Fre","Lør","Søn");
  $maaneder = array("Januar","Febuar","Marts","April","Maj","Juni","Juli","August","Oktober","September","November","December",);
  $dag_num = date("d", strtotime($Time));
  $DagiTal = date("N", strtotime($Time))-1;
  $MaanediTal = date("n", strtotime($Time))-1; //Er det i Marts giver date funktionen 3, trækkes 1 fra har vi positionen i arrayet ovenfor
  $TidKl = date("H:i", strtotime($Time));
  $aar = date("Y", strtotime($Time));
  return $dag_num.". ".$maaneder[$MaanediTal]." ".$aar." kl. ".$TidKl;
}
function timeAgo($time_ago)
{
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        return "Lige nu";
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1){
            return "et minut siden";
        }
        else{
            return "$minutes mintter siden";
        }
    }
    //Hours
    else if($hours <=24){
        if($hours==1){
            return "en time siden";
        }else{
            return "$hours timer siden";
        }
    }
    //Days
    else if($days <= 7){
        if($days==1){
            return "en dag siden";
        }else{
            return "$days dage siden";
        }
    }
    //Weeks
    else if($weeks <= 4.3){
        if($weeks==1){
            return "en uge siden";
        }else{
            return "$weeks uger siden";
        }
    }
    //Months
    else if($months <=12){
        if($months==1){
            return "et måned siden";
        }else{
            return "$months måneder siden";
        }
    }
    //Years
    else{
        if($years==1){
            return "et år siden";
        }else{
            return "$years år siden";
        }
    }
}

?>
