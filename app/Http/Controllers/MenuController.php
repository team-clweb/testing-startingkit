<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dish;

class MenuController extends Controller
{
    //

    public function index()
    {
        $dishes = Dish::all();
        return view('menu.index', compact('dishes'));
    }

}
