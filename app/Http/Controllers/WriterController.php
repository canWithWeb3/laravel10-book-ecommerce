<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Writer;
use Illuminate\Http\Request;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $writers = Writer::orderBy("id", "DESC")->get();
        return view("admin.writers.writers", compact("writers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.writers.create-writer");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "image" => "bail|required|mimes:jpeg,png,jpg|max:2048",
            "name" => "bail|required|min:2|max:255"
        ]);

        $fileName = time().$request->file("image")->getClientOriginalName();
        $path = $request->file("image")->storeAs("uploads/images", $fileName, "public");
        $image = "/storage/".$path;

        $writer = new Writer();
        $writer->name = $request->name;
        $writer->image = $image;
        $writer->save();

        return redirect("/admin/writers")
                ->with("alert_status", "success")
                ->with("alert_message", "Writer created");
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
        $writer = Writer::findOrFail($id);
        return view("admin.writers.update-writer", compact("writer"));
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

        $writer = Writer::findOrFail($id);

        if($request->file()){
            $fileName = time().$request->file("image")->getClientOriginalName();
            $path = $request->file("image")->storeAs("uploads/images", $fileName, "public");
            $writer->image = "/storage/".$path;
        }

        $writer->name = $request->name;
        $writer->save();

        return redirect("/admin/writers")
                ->with("alert_status", "success")
                ->with("alert_message", "Writer updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Writer $writer)
    {
        $writer->delete();

        return redirect("/admin/writers")
                ->with("alert_status", "success")
                ->with("alert_message", "Writer deleted");
    }
}
