<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Items;

class ItemsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $items = Items::all()->toArray();
    return view('items.index', compact('items'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('items.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $item = $this->validate(request(), [
      'found_time' => 'required|date_format:Y-m-d H:i:s',
      'found_user' => 'required',
      'found_place' => 'required',
      'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:256',
      'description' => 'max:256',
    ]);

    //Handles the uploading of the image
    if ($request->hasFile('image')) {
      //Gets the filename with the extension
      $fileNameWithExt = $request->file('image')->getClientOriginalName();
      //just gets the filename
      $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
      //Just gets the extension
      $extension = $request->file('image')->getClientOriginalExtension();
      //Gets the filename to store
      $fileNameToStore = $filename . '_' . time() . '.' . $extension;
      //Uploads the image
      $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
    } else {
      $fileNameToStore = 'noimage.jpg';
    }

    // create a items object and set its values from the input
    $item = new Items;
    $item->category = $request->input('category');
    $item->found_time = $request->input('found_time');
    $item->found_user = $request->input('found_user');
    $item->found_place = $request->input('found_place');
    $item->colour = $request->input('colour');
    $item->description = $request->input('description');
    $item->image = $fileNameToStore;

    $item->created_at = now();
    // save the items object
    $item->save();
    // generate a redirect HTTP response with a success message
    return back()->with('success', 'Item has been added');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $items = Items::find($id);
    return view('items.show', compact('items'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $items = Items::find($id);
    return view('items.edit', compact('items'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
  }
}
