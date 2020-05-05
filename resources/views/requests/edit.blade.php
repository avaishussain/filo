<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 ">
      <div class="card">
        <div class="card-header">Request a lost item</div>
        <!-- display the errors -->
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul> @foreach ($errors->all() as $error)
            <li>{{ $error }}</li> @endforeach
          </ul>
        </div><br /> @endif
        <!-- display the success status -->
        @if (\Session::has('success'))
        <div class="alert alert-success">
          <p>{{ \Session::get('success') }}</p>
        </div><br /> @endif
        <!-- define the form -->
        <div class="card-body">
          <form class="form-horizontal" method="POST" action="{{url('requests') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-8">
              <label>User ID</label>
              <?php
              $user = auth()->user();
              ?>
              <input type="bigInteger" name="userid" value="{{$user->id}}" readonly />
            </div>
            <div class="col-md-8">
              <label>Item ID</label>
              <input type="bigInteger" name="itemid" value="{{$item->id}}" readonly />
            </div>
            <div class="col-md-8">
              <label>Reason for request</label><br>
              <textarea rows="4" cols="50" name="reason"> Reason for requesting the item </textarea>
            </div>
            <div class="col-md-6 col-md-offset-4">
              <input type="submit" class="btn btn-primary" />
              <input type="reset" class="btn btn-primary" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection