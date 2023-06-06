<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    protected $get_categories = [];

    public function __construct() {
        $get_categories = Category::all();
    }

    public function home(){
        $books = Book::all();
        return view("pages.home", compact("books"));
    }

    public function book_detail($id){
        $book = Book::findOrFail($id);
        return view("pages.book-detail", compact("book"));
    }

    public function cart(){
        $carts = Cart::where("user_id", Auth::id())->get();
        // $user_id = Auth::user()->id;
        // $carts = DB::table("carts")->where("user_id", "=", $user_id)->get();
        // $books = [];
        // foreach($carts as $c){
        //     $item = DB::table("books")->where("id", "=", $c->book_id)->get();
        //     $item = $item[0];
        //     $item["count"] = $c->count;
        //     array_push($books, $item);
        // }
        // dd($books);
        return view("pages.cart", compact("carts"));
    }
}
