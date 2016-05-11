<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\QueryException;

class SearchController extends Controller
{
    public function index() // list all data
    {
      return Property::all();
    }

    public function search(Request $request) // search method
    {
      $params = $this->validateRequest($request);
      $name = $request->input('name');
      $min = $request->input('min') ?? 0;
      $max = $request->input('max') ?? 600000;
      $query = new Property;

      if (isset($name, $params)) { // search including name
        $query = $query->where($params)
                 ->where('name', 'like', "%{$name}%")
                 ->whereBetween('price', [$min, $max]);
      } elseif (isset($name) && empty($params)) { // search only name
        $query = $query->where('name', 'like', "%{$name}%");
      } else { // search excluding name
        $query = $query->where($params)
                 ->whereBetween('price', [$min, $max])
                 ->take(10);
      }
      sleep(2); // simulate server load
      return $query->get();
    }

    public function show(Property $property) // show specific data based on ID
    {
      return $property;
    }

    private function validateRequest($request) // validate GET paramaters
    {
      $whitelist = ['bedrooms','bathrooms','storeys','garages'];
      $params = array_filter($request->only($whitelist));
      return $params;
    }
}
