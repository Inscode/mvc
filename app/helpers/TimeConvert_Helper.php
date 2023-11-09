<?php

    date_default_timezone_set('Asia/Colombo');

    function convertTimeToReadableFormat($time){
        $time_ago = strtotime($time);
        $current_time = time();
        $time_difference = $current_time - $time_ago;

        $seconds = $time_difference;
        $minutes = round($seconds/60);
        $hours = round($seconds/3600);
        $days = round($seconds/86400);
        $weeks = round($seconds/604800);
        $months = round($seconds/2629440);
        $years = round($seconds/315532880);

        if($seconds<=60){
            return 'Just now';
        }else if($minutes<=60){
            if($minutes==60){
                return 'one minute age';
            }
            else{
                return $minutes.' minutes age';
            }
        }
        else if($hours <=24){
            if($hours==1){
                return 'one hour age';
            }
            else{
                return $hours.' hours ago';
            }
        }
        else if($days<=7){
            if($days==1){
                return 'one day ago';
            }
            else{
                return $days.' days ago';
            }
        }
        else if($weeks<=4.3){
            if($weeks==1){
                return 'one day ago';
            }
            else{
                return $weeks.' weeks ago';
            }
        }
        else if($months<=12){
            if($months==1){
                return 'a month ago';
            }
            else{
                return $months.' months ago';
            }

        }
        else{
            if($years==1){
                return 'one year ago';
            }
            else{
                return $years.' years ago';
            }
        }

    }