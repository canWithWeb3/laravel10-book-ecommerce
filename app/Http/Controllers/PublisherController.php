<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::orderBy("id", "DESC")->get();
        return view("admin.publishers.publishers", compact("publishers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.publishers.create-publisher");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "bail|required|min:2|max:255"
        ]);

        $publisher = new Publisher();
        $publisher->name = $request->name;
        $publisher->save();

        return redirect("/admin/publishers")
                ->with("alert_status", "success")
                ->with("alert_message", "Publisher created");
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
        $publisher = Publisher::findOrFail($id);
        return view("admin.publishers.update-publisher", compact("publisher"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "bail|required|min:2|max:255"
        ]);

        $publisher = Publisher::findOrFail($id);
        $publisher->name = $request->name;
        $publisher->save();

        return redirect("/admin/publishers")
                ->with("alert_status", "success")
                ->with("alert_message", "Publisher updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        return redirect("/admin/publishers")
                ->with("alert_status", "success")
                ->with("alert_message", "Publisher deleted");
    }
}
