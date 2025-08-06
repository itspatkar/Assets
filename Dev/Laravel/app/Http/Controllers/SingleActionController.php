<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleActionController extends Controller
{
    /* The single action controller is the one that contains the invoke method, which is called automatically when calling the class.
    The class can have other methods that can be called with a name, but calling the class invokes the invoked method.*/

    public function __invoke()
    {
        return "Single Action Controller";
    }
}
