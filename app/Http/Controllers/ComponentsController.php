<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComponentsController extends Controller
{
    public function clientList(){
    	$items = Client::all();

        return view('components.clientlist', ['items' => $items]);
    }
}
