<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function index(Request $request)
    {
        $jsonContents = json_decode(file_get_contents(storage_path('app/carousel.json')), true);

        $filterByName = $request->query('name');
        $filterByDiscount = $request->query('discount');


        //Filter by name
        if ($filterByName) {
            $jsonContents = array_filter($jsonContents, function ($json) use ($filterByName) {
                return false !== str_contains($json['name'], $filterByName);
            });
        }

        //Filter by discount
        if ($filterByDiscount) {
            $jsonContents = array_filter($jsonContents, function ($json) use ($filterByDiscount) {
                return false !== strpos($json['discount_percentage'], $filterByDiscount);
            });
        }

        return response()->json($jsonContents)
        ->header('Content-Type', 'application/json');

    }
}
