<?php

namespace p3\Http\Controllers;

use p3\Http\Controllers\Controller;
use \Badcow\LoremIpsum\Generator;

class LoremController extends Controller
{
    /**
     * Responds to requests to GET /lorem-ipsum
     */
    public function index()
    {
        return view('lorem.index');
        // $generator = new Generator();
        // // paragraphs will be # chosen by user in form
        // $paragraphs = $generator->getParagraphs(5);
        // return 'Display Lorem page: '.implode('<p>', $paragraphs);
    }
} # end of class
