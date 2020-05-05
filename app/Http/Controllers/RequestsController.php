<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\Items;
use App\Requests;
use Mail;

class RequestsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $requests = Requests::all()->toArray();
    return view('requests.index', compact('requests'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // form validation
    $item = $this->validate(request(), [
      'userid' => 'required',
      'itemid' => 'required',
      'reason' => 'required|max:256',
    ]);

    // create a requests object and set its values from the input
    $requests = new Requests;
    $requests->userid = $request->input('userid');
    $requests->itemid = $request->input('itemid');
    $requests->reason = $request->input('reason');
    $requests->created_at = now();
    // save the requests object
    $requests->save();
    // generate a redirect HTTP response with a success message
    return back()->with('success', 'Request has been made');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $item = Items::find($id);
    return view('requests.edit', compact('item'));
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
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $requests = Requests::find($id);
    $requests->delete();
    return redirect('requests')->with('success', 'Item has been deleted');
  }
}
