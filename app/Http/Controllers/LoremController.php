<?php

namespace p3\Http\Controllers;

use p3\Http\Controllers\Controller;
use \Badcow\LoremIpsum\Generator;
use Illuminate\Http\Request;

class LoremController extends Controller
{
    /**
     * Responds to requests to GET /lorem-ipsum
     */
    public function index()
    {
        return view('lorem.index');
    }
    /**
     * Responds to requests to POST /lorem-ipsum
     * Show selection results
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request)
    {
        $this->validate($request, [
            'paragraph_count' => 'required|integer|between:1,99',
        ]);
        $p = $request->input('paragraph_count');
        $generator = new Generator();
        // paragraphs will be # chosen by user in form
        $paragraphs = $generator->getParagraphs($p);
        // $paragraphs = implode('<p>', $paragraphs);
        return view('lorem.submit')->with('paragraphs', $paragraphs)->with('p', $p);
    }
} # end of class
