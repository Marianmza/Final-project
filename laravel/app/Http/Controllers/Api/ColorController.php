<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;


class ColorController extends Controller
{
    public function index()
    {
        $colors = DB::table('shoes')->pluck('color')->unique();

        $formattedColors = [];

        foreach ($colors as $color) {
            $colorArray = explode(" ", $color);
            if (count($colorArray) > 1) {
                foreach ($colorArray as $c) {
                    if ($c == 'and' || $c == '&') {
                        false;
                    } else {
                        in_array($c, $formattedColors) ? false : $formattedColors[] = $c;
                    }
                    
                }
            } else {
                in_array($c, $formattedColors) ? false : $formattedColors[] = strtolower($color);
            }
        }

        return $formattedColors;
    }
}
