<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;

use Exception;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    //get all books
    public function index()
    {
        
       try {
        // thrown new Exception('error');
        return Book::filter(request(['category']))->paginate(6);
       }catch(Exception $e){
        return response()->json([
                'message' => $e->getMessage(),
                'status' =>500
        ],500);
       }
    }

        //store a recipes
        //post
        //title,description,category_id,photo url
    public function store(){
        try{
                //validation 
                $validator =Validator::make(request()->all(),[
                    'title' =>'required',
                    'description' =>'required',
                    'category_id' =>['required',Rule::exists('categories','id')],
                    'image' =>'required',

                ]);
                if($validator->fails()){
                    
                    $flattened = collect($validator->errors())->flatMap(function ($e,$field) {
                        return [$field=>$e[0]];
                    });
                    return response()->json([
                        'errors' => $flattened,
                        'status'=> 400
                    ],400);
                }



                //if validation pass
                $book =new Book();
                $book->title =request('title');
                $book->description =request('description');
                $book->category_id =request('category_id');

                $book->image =request('image');
                $book->save();
                return response()->json($book,201);
        }catch(Exception $e){
            return response()->json([
                    'message' => $e->getMessage(),
                    'status' =>500
            ],500);
           }
    }

      //update a recipes
        //post
        //title,description,category_id,photo url
        public function update($id){
            try{
                $book = Book::find($id);
        //if data is not found condition
        if(!$book){
            return response()->json([
                'message' => 'book not found',
                'status' =>404
        ],404);
        }
        return $book;
                    //validation 
                    $validator =Validator::make(request()->all(),[
                        'title' =>'required',
                        'description' =>'required',
                        'category_id' =>['required',Rule::exists('categories','id')],
                        'image' =>'required',
    
                    ]);
                    if($validator->fails()){
                        
                        $flattened = collect($validator->errors())->flatMap(function ($e,$field) {
                            return [$field=>$e[0]];
                        });
                        return response()->json([
                            'errors' => $flattened,
                            'status'=> 400
                        ],400);
                    }
    
    
    
                    //if validation pass
                    // $book =new Book();
                    $book->title =request('title');
                    $book->description =request('description');
                    $book->category_id =request('category_id');
                    $book->image =request('image');
                    $book->save();
                    return response()->json($book,201);
            }catch(Exception $e){
                return response()->json([
                        'message' => $e->getMessage(),
                        'status' =>500
                ],500);
               }
        }

    //get single book
    //get/api/books/:id
    public function show($id)
    {
        
       try {
        // thrown new Exception('error');
// dd($id);
        $book = Book::find($id);
        //if data is not found condition
        if(!$book){
            return response()->json([
                'message' => 'book not found',
                'status' =>404
        ],404);
        }
        return $book;
       }catch(Exception $e){
        return response()->json([
                'message' => $e->getMessage(),
                'status' =>500
        ],500);
       }
    }
    public function destroy($id){
        // dd('hit');
        try {
            // thrown new Exception('error');
    // dd($id);
            $book = Book::find($id);
            //if data is not found condition
            if(!$book){
                return response()->json([
                    'message' => 'book not found',
                    'status' =>404
            ],404);
            }
             $book->delete();
             return $book;
           }catch(Exception $e){
            return response()->json([
                    'message' => $e->getMessage(),
                    'status' =>500
            ],500);
           }
    }
    //upload photo
    //post/
    public function upload(){
        // dd('hit');
        try{

            //validation 
            $validator =Validator::make(request()->all(),[
                
                'image' =>['required','image'],

            ]);
            if($validator->fails()){
                
                $flattened = collect($validator->errors())->flatMap(function ($e,$field) {
                    return [$field=>$e[0]];
                });
                return response()->json([
                    'errors' => $flattened,
                    'status'=> 400
                ],400);
            }
            $path ='/storage/'.request('image')->store('/books');
            return[
                'path '=>$path,
                'status'=>200
            ];
        }catch(Exception $e){
            return response()->json([
                    'message' => $e->getMessage(),
                    'status' =>500
            ],500);
           }
    }
}
