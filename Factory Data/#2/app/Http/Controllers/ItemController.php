<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function getItems()
    {
        // $item = DB::table('items')->get();
        // $item = DB::table('items')->whereBetween('id', [1, 5])->get();
        // $item = DB::table('items')->whereNotBetween('id', [1, 5])->get();
        // $item = DB::table('items')->wherein('id', [1,2,5])->get();


        // $item = DB::table('items')->orderBy('email')->get();
        // $item = DB::table('items')->orderBy('id', 'desc')->get();
        // $item = DB::table('items')->orderByDesc('id')->get();
        // $item = DB::table('items')->inRandomOrder()->get();

        // $item = DB::table('items')->count('id');
        // $item = DB::table('items')->max('id');
        // $item = DB::table('items')->min('id');
        // $item = DB::table('items')->sum('id');
        // $item = DB::table('items')->avg('id');

        $item = DB::table('items')->skip(5)->take(1)->get();
        return $item;
    }

}
