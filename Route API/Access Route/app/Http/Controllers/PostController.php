<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getAllItems()
    {
        return "All items";
    }
    public function getOneItem($id)
    {
        return "One items ". $id;
    }
    public function createItem()
    {
        return "Create a new item";
    }
    public function updateItem($id)
    {
        return "Update a new item ". $id;
    }
    public function deleteItem($id)
    {
        return "Delete items ". $id;
    }

}
