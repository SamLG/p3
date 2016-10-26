<?php

namespace p3\Http\Controllers;

use App/Http/Controllers/Controller;

class LoremController extends Controller
{
    /**
     * Responds to requests to GET /lorem-ipsum
     */
    public function index()
    {
        return 'Display Lorem page';
    }
} # end of class
