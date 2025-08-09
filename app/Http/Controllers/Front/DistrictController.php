<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Districts;


class DistrictController extends Controller
{

    public function getDistrict(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            $districts =  Districts::orderby('name', 'asc')->limit(20)->get();
        } else {
            $districts = Districts::orderby('name', 'asc')->where('name', 'like', '%' . $search . '%')->limit(20)->get();
        }

        $response = [];
        array_push($response, [
            "id" => '',
            "text" => 'Select Districts'
        ]);
        foreach ($districts as $district) {
            $response[] = array(
                "id" => $district->id,
                "text" => $district->name
            );
        }
        return response()->json($response);
    }
}
