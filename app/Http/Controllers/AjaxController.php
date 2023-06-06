<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function addToCart(Request $request){
        if(!Auth::check()) return "notAuth";

        $user_id = Auth::user()->id;

        if(!$request->has("id")) return "no";
        $book_id = $request->input("id");

        $count = DB::table("carts")->where("user_id", "=", $user_id)->where("book_id", "=", $book_id)->get();
        if(count($count)){
            try{
                DB::table('carts')
                    ->where("user_id", "=", $user_id)->where("book_id", "=", $book_id)
                    ->update([
                        'count' => DB::raw('count + 1'),
                ]);

                return "yes";
            }catch(Exception $err){
                return $err;
            }
        }else{
            try{
                Cart::create([
                    "user_id" => $user_id,
                    "book_id" => $book_id
                ]);

                return "yes";
            }catch(Exception $err){
                return $err;
            }
        }
    }
}
