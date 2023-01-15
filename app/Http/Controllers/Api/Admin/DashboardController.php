<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\User;
use App\Models\Place;
use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // statistik categories
        $categories = Category::count();

        // statistik place
        $places = Place::count();

        // statistik sliders
        $sliders = Slider::count();

        // statistik users
        $users = User::count();

        return response()->json([
            'success' => true,
            'message' => 'Statistik Data',
            'data'    => [
                'categories' => $categories,
                'places' => $places,
                'sliders' => $sliders,
                'users' => $users
            ]
        ]);
    }
}
