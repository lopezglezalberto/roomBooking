<?php
/**
 * Created by PhpStorm.
 * User: alberto89
 * Date: 5/4/2019
 * Time: 09:40
 */
function toJsJson($var){
    return addslashes(json_encode($var));
}

function convertDate($date)
{

    if($date != "--"){
        $d = 0;
        $m = '';
        $day = substr($date, 8, 2);
        $month = substr($date, 5, 2);

        switch ($day) {
            case 1:
                $d = 1;
                break;
            case 2:
                $d = 2;
                break;
            case 3:
                $d = 3;
                break;
            case 4:
                $d = 4;
                break;
            case 5:
                $d = 5;
                break;
            case 6:
                $d = 6;
                break;
            case 7:
                $d = 7;
                break;
            case 8:
                $d = 8;
                break;
            case 9:
                $d = 9;
                break;
        }

        switch ($month) {
            case 1:
                $m = 'enero';
                break;
            case 2:
                $m = 'febrero';
                break;
            case 3:
                $m = 'marzo';
                break;
            case 4:
                $m = 'abril';
                break;
            case 5:
                $m = 'mayo';
                break;
            case 6:
                $m = 'junio';
                break;
            case 7:
                $m = 'julio';
                break;
            case 8:
                $m = 'agosto';
                break;
            case 9:
                $m = 'septiembre';
                break;
            case 10:
                $m = 'octubre';
                break;
            case 11:
                $m = 'noviembre';
                break;
            case 12:
                $m = 'diciembre';
                break;
        }

        if($d == 0){
            $d = $day;
        }

        return $d.' de '.$m.' de '.substr($date, 0, 4);
    } else{
        return "--";
    }

}


