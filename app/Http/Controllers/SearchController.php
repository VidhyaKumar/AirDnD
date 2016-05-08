<?php

namespace App\Http\Controllers;

use App\Property;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Database\QueryException;

class SearchController extends Controller
{
    public function index()
    {
      $properties = Property::all();
      return $properties;
    }

    public function search(Request $request)
    {
      $params = $request->input();
      $name = isset($params['name']) ? $params['name'] : false;
      $min = isset($params['min']) ? $params['min'] : 0;
      $max = isset($params['max']) ? $params['max'] : 600000;
      $params = $this->validateRequest($params);

      if ($name && !empty($params)) { // search including name
        $query = Property::where($params)
                  ->where('name', 'like', "%{$name}%")
                  ->whereBetween('price', [$min, $max])
                  ->get();
      } elseif ($name && empty($params)) { // search only name
        $query = Property::where('name', 'like', "%{$name}%")->get();
      } else { // search excluding name
        $query = Property::where($params)
                  ->whereBetween('price', [$min, $max])
                  ->take(10)->get();
      }

      return $query;
    }

    public function show(Property $property)
    {
      return $property;
    }

    private function validateRequest($params)
    {
      if (empty($params)) { // validates empty request
        abort(400, 'Invalid search paramaters.');
      } else { // validates invalid paramater request
        unset($params['min'], $params['max'], $params['name']);
        try {
          $query = Property::where($params)->get();
        } catch (QueryException $e) {
          abort(400, 'Invalid search paramaters.');
        }
      }
      return $params;
    }
}
