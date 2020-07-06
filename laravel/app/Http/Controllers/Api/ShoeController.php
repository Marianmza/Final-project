<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shoe;
use Croppa;

class ShoeController extends Controller
{
    //
    public function index()
    {
        $shoes = Shoe::query()
            ->with('images')
            ->with('brand')
            // ->limit(8)
            ->get();

        foreach ($shoes as $shoe) {
            if ($shoe->images->count() > 0) {
                $shoe->image_url = Croppa::url('images/shoes/'.$shoe->images->first()->path, 100, null, ['resize']);
            }
        }

        return $shoes;
    }

    // public function show()
    // {
    //     $show = Shoe::findOrFail('shoe_id')
    // }
}
