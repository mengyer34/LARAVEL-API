<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Mango;

class MangoController extends Controller
{
    public function getInfo()
    {
        // $result = Mango::all();
        // $result = Mango::get();
        // $result = Mango::find(1);
        // $result = Mango::first();
        // $result = Mango::get(['name', 'price']);
        // $result = Mango::where('id','>', 9)->get();
        // $result = Mango::whereBetween('id', ['1', '5'])->get();
        // $result = Mango::find([1,2,3,4,5]);
        // $result = Mango::whereNotBetween('id', ['1', '5'])->get();
        // $result = Mango::orderByDesc('id')->get();
        // $result = Mango::inRandomOrder()->get();
        // $result = Mango::max('price');
        // $result = Mango::min('price');
        // $result = Mango::avg('id');
        // $result = Mango::sum('price');
        $result = Mango::skip(1)->take(3)->get();
        return $result;
    }

}
