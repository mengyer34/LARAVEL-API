<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use queries builder ===============================================
use Illuminate\Support\Facades\DB;

class ProductContoller extends Controller
{
    public function getProduct()
    {
        // SELECT QUERY BASIC
        // $product = DB::select('SELECT * FROM products');
        // $product = DB::selectOne('SELECT * FROM products');

        // SELECT QUERY BASIC WITH WHERE CONDITION
        // $product = DB::select('SELECT * FROM products WHERE price = 10');
        // $product = DB::select('SELECT * FROM products WHERE id = ?', [120]);
        // $product = DB::select('SELECT * FROM products WHERE id = :id', ['id'=>106]);

        // CRUD ========================
        // $product = DB::select('SELECT * FROM products');
        // $product = DB::insert('INSERT INTO products(name, price) VALUES(?, ?)', ['hello', 1]);
        // $product = DB::update('UPDATE products SET name =?, price =? WHERE id=101', ['banana', 10]);
        // $product = DB::delete('DELETE FROM products WHERE id=?', [101]);
        // $product = DB::delete('DELETE FROM products WHERE id=102');
        // $product = DB::delete('DELETE FROM products WHERE updated_at=?', ['2022-05-18 08:43:37']);
        // dd($product);
        // print_r($product);

        // $product = DB::table('products')->get();
        // $product = DB::table('products')->select('name', 'id')->get();
        // $product = DB::table('products')->where('id', '>', 160)->get();
        // $product = DB::table('products')->where('id', 160)->get();

        // $product = DB::table('products')->where('id','=', 163)->get();
        $product = DB::table('products')->first();
        $product = DB::table('products')->find(169);
        $product = DB::table('products')->value(37);
        return $product;    }
}
