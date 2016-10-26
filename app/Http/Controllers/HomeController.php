<?php

namespace p3\Http\Controllers;

use p3\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Responds to requests to GET /
     */
    public function index()
    {
        return 'Display Homepage';
    }
} # end of class
