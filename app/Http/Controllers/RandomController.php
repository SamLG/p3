<?php

namespace p3\Http\Controllers;

use p3\Http\Controllers\Controller;
use \Rych\Random\Random;
use \Badcow\LoremIpsum\Generator;
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
    function readCSV($csvFile){
        $file = file_get_contents($csvFile);
        $names = explode(",", $file);
        $randomItem = array_rand($names);
        return $names[$randomItem];
    }
    function randomName()
    {
        // $first = $this->randomArrayItem('CSV_Database_of_First_Names.csv');
        // $last = $this->randomArrayItem('CSV_Database_of_Last_Names.csv');
        // return $first.' '.$last;
        return $this->readCSV('CSV_Database_of_First_Names.csv').' '.$this->readCSV('CSV_Database_of_Last_Names.csv');
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
    function random_profile()
    {
        $generator = new Generator();
        $paragraphs = $generator->getParagraphs(1);
        return implode('<p>',$paragraphs);
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
        $profile = $request->input('profile');
        if ($profile == "on"){
            $profile = 'checked="checked"';
        }
        else {
            $profile = '';
        }
        for ($i=0; $i < $user_count; $i++) {
            $users = array(
                "name" => $this->randomName(),
                "dob" => $this->random_dob(),
                "profile" => $this->random_profile(),
            );
            $usersArray[$i] = $users;
        }
        // $generator = new Generator();
        // // paragraphs will be # chosen by user in form
        // $paragraphs = $generator->getParagraphs($p);
        // // $paragraphs = implode('<p>', $paragraphs);
        return view('random.submit')->with('user_count', $user_count)->with('dob',$dob)->with('profile', $profile)->with('usersArray',$usersArray);
    }
} # end of class
