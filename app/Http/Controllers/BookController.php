<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy("id", "DESC")->get();
        return view("admin.books.books", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy("name", "ASC")->get();
        $publishers = Publisher::orderBy("name", "ASC")->get();
        $writers = Writer::orderBy("name", "ASC")->get();
        return view("admin.books.create-book", compact("categories", "publishers", "writers"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "image" => "bail|required|mimes:jpeg,png,jpg|max:2048",
            "name" => "bail|required|min:2|max:255",
            "categories" => "bail|required|min:2|max:4"
        ]);

        $fileName = time().$request->file("image")->getClientOriginalName();
        $path = $request->file("image")->storeAs("uploads/images", $fileName, "public");
        $image = "/storage/".$path;

        $book = new Book();
        $book->image = $image;
        $book->name = $request->name;
        $book->description = $request->description;
        $book->save();

        foreach($request->categories as $category){
            $book->categories()->create([
                "book_id" => $book->id,
                "category_id" => $category
            ]);
        }

        return redirect("/admin/books")
                ->with("alert_status", "success")
                ->with("alert_message", "Book created");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view("admin.books.update-book", compact("book"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "image" => "bail|sometimes|required|mimes:jpeg,png,jpg|max:2048",
            "name" => "bail|required|min:2|max:255"
        ]);

        $book = Book::findOrFail($id);

        if($request->file()){
            $fileName = time().$request->file("image")->getClientOriginalName();
            $path = $request->file("image")->storeAs("uploads/images", $fileName, "public");
            $book->image = "/storage/".$path;
        }

        $book->name = $request->name;
        $book->save();

        return redirect("/admin/books")
                ->with("alert_status", "success")
                ->with("alert_message", "Book updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        $book->categories()->delete();
        DB::table("carts")->where("book_id", "=", $book->id)->delete();

        return redirect("/admin/books")
                ->with("alert_status", "success")
                ->with("alert_message", "Book deleted");
    }
}
