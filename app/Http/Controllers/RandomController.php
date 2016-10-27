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
        // http://www.quietaffiliate.com/free-first-name-and-last-name-databases-csv-and-sql/
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
    function random_phone()
    {
        $random = new Random();
        // http://www.bennetyee.org/ucsd-pages/area.html
        $randomArea = $random->getRandomInteger(201, 999);
        $randomFirstNum = $random->getRandomInteger(100, 999);
        $randomLastNum = $random->getRandomInteger(1000, 9999);
        $number = '('.$randomArea.')'.$randomFirstNum.'-'.$randomLastNum;
        // echo $number;
        return $number;
    }
    function random_email($name)
    {
        $random = new Random();
        $randomNum = $random->getRandomInteger(1, 999);
        $name = strtolower($name);
        $name = str_replace(' ','.',$name);
        $email = $name.$randomNum.'@provider.com';
        // echo $email;
        return $email;
    }
    function random_location($csvLocation)
    {
        // https://www.uscitieslist.org/
        // http://stackoverflow.com/questions/1269562/how-to-create-an-array-from-a-csv-file-using-php-and-the-fgetcsv-function
        $line = array();
        $csvData = file_get_contents($csvLocation);
        $lines = explode(PHP_EOL, $csvData);
        $array = array();
        foreach ($lines as $line) {
            $array[] = str_getcsv($line);
        }
        // print_r($array);
        $random = new Random();
        $random = $random->getRandomInteger(1, count($array));
        // echo $array[$random][1];
        return $array[$random][1];
    }
    function random_profile()
    {
        $generator = new Generator();
        $paragraphs = $generator->getParagraphs(1);
        return implode('<p>',$paragraphs);
    }
    function confirmCheck($item)
    {
        if ($item == "on"){
            $item = 'checked="checked"';
        }
        else {
            $item = '';
        }
        return $item;
    }
    public function submit(Request $request)
    {
        $usersArray = [];
        $user_count = $request->input('user_count');
        $dob = $request->input('dob');
        $dob = $this->confirmCheck($dob);
        $phone = $request->input('phone');
        $phone = $this->confirmCheck($phone);
        $email = $request->input('email');
        $email = $this->confirmCheck($email);
        $location = $request->input('location');
        $location = $this->confirmCheck($location);
        $profile = $request->input('profile');
        $profile = $this->confirmCheck($profile);
        for ($i=0; $i < $user_count; $i++) {
            $name = $this->randomName();
            $users = array(
                "name" => $name,
                "dob" => $this->random_dob(),
                "phone" => $this->random_phone(),
                "email"=> $this->random_email($name),
                "location" => $this->random_location('us-cities-sample.csv'),
                "profile" => $this->random_profile(),
            );
            $usersArray[$i] = $users;
        }
        // $generator = new Generator();
        // // paragraphs will be # chosen by user in form
        // $paragraphs = $generator->getParagraphs($p);
        // // $paragraphs = implode('<p>', $paragraphs);
        return view('random.submit')->with('user_count', $user_count)->with('dob',$dob)->with('phone',$phone)->with('email', $email)->with('location', $location)->with('profile', $profile)->with('usersArray',$usersArray);
    }
} # end of class
