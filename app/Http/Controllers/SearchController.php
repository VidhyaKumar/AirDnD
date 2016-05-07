<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;
use App\Http\Requests;

class SearchController extends Controller
{
    public function index()
    {
      $properties = Property::all();
      return response()->json($properties);
    }
}
