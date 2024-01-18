<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        
       try {
        // thrown new Exception('error');
        return Category::all();
       }catch(Exception $e){
        return response()->json([
                'message' => $e->getMessage(),
                'status' =>500
        ],500);
       }
    }
}
