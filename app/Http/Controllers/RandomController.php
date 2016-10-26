<?php

namespace p3\Http\Controllers;

use p3\Http\Controllers\Controller;
use \Rych\Random\Random;
use Illuminate\Http\Request;

class RandomController extends Controller
{
    /**
     * Responds to requests to GET /random-user
     */
    public function index()
    {
        return view('random.index');
    }

    function random_dob()
    {
        $random = new Random();
        $randomYear = $random->getRandomInteger(1900, 2000);
        $randomMonth = $random->getRandomInteger(1, 12);
        $randomDay = 1;
        switch ($randomMonth) {
            case '1':
            case '3':
            case '5':
            case '7':
            case '8':
            case '10':
            case '12':
                $randomDay = $random->getRandomInteger(1, 31);
                break;
            case '4':
            case '6':
            case '9':
            case '11':
                $randomDay = $random->getRandomInteger(1, 30);
                break;
            case '2':
                // does not account for leap years
                $randomDay = $random->getRandomInteger(1, 28);
                break;
            default:
                $randomDay = 1;
                break;
        }
        $date = $randomYear.'-'.$randomMonth.'-'.$randomDay;
        return $date;
    }
    public function submit(Request $request)
    {
        $usersArray = [];
        $user_count = $request->input('user_count');
        $dob = $request->input('dob');
        if ($dob == "on"){
            $dob = 'checked="checked"';
        }
        else {
            $dob = '';
        }
        for ($i=0; $i < $user_count; $i++) {
            $users = array(
                "name" => "name_first_last",
                "dob" => $this->random_dob(),
            );
            $usersArray[$i] = $users;
        }
        // $generator = new Generator();
        // // paragraphs will be # chosen by user in form
        // $paragraphs = $generator->getParagraphs($p);
        // // $paragraphs = implode('<p>', $paragraphs);
        return view('random.submit')->with('user_count', $user_count)->with('dob',$dob)->with('usersArray',$usersArray);
    }
} # end of class
