<?php

namespace p3\Http\Controllers;

use p3\Http\Controllers\Controller;
use \Rych\Random\Random;

class RandomController extends Controller
{
    /**
     * Responds to requests to GET /random-user
     */
    public function index()
    {
        return view('random.index');
        // $random = new Random();
        // $randomYear = $random->getRandomInteger(1900, 2000);
        // $randomMonth = $random->getRandomInteger(1, 12);
        // $randomDay = 1;
        // switch ($randomMonth) {
        //     case '1':
        //     case '3':
        //     case '5':
        //     case '7':
        //     case '8':
        //     case '10':
        //     case '12':
        //         $randomDay = $random->getRandomInteger(1, 31);
        //         break;
        //     case '4':
        //     case '6':
        //     case '9':
        //     case '11':
        //         $randomDay = $random->getRandomInteger(1, 30);
        //         break;
        //     case '2':
        //         // does not account for leap years
        //         $randomDay = $random->getRandomInteger(1, 28);
        //         break;
        //     default:
        //         $randomDay = 1;
        //         break;
        // }
        // return 'Display Random-User page: '.$randomYear.'-'.$randomMonth.'-'.$randomDay;
    }
} # end of class
