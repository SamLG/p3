<?php

namespace p3\Http\Controllers;

use App/Http/Controllers/Controller;

class RandomController extends Controller
{
    /**
     * Responds to requests to GET /random-user
     */
    public function index()
    {
        return 'Display Random-User page';
    }
} # end of class
