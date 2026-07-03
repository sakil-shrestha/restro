<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use App\Models\Category;
use App\Models\MenuItem;
use Exception;
use Illuminate\Http\Request;

class MenuController extends Controller
{
        public function index()
        {
            try{

                $menus=MenuItem::with('category')->get();

                $categories=Category::all();

                return response()->json([
                    'status'=>true,
                    'message'=>"Menu fetched successfully",
                    'data'=>[
                       'menus'=> MenuResource::collection($menus),
                        'categories'=>$categories,
                    ],
                ]);
            }catch(Exception $e)
            {
                return response()->json([
                    'status'=>false,
                    'message'=>$e->getMessage(),

                ]);
            };

        }
    }
