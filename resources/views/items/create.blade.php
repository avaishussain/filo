<!-- inherite master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 ">
            <div class="card">
                <div class="card-header">Create an new vehicle</div>
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
                    <form class="form-horizontal" method="POST" action="{{url('items') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-8">
                            <label>Item Type</label>
                            <select name="category">
                                <option value="pet">Pet</option>
                                <option value="phone">Phone</option>
                                <option value="jewellery">Jewellery</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label>Found Time</label>
                            <input type="datetime" name="found_time" placeholder="yyyy-mm-dd hh:mm:ss" value="" />
                        </div>
                        <div class="col-md-8">
                            <label>Found User</label>
                            <input type="text" name="found_user" placeholder="Found User" />
                        </div>
                        <div class="col-md-8">
                            <label>Found Place</label>
                            <input type="text" name="found_place" placeholder="Found Place" />
                        </div>
                        <div class="col-md-8">
                            <label>Colour</label>
                            <input type="text" name="colour" placeholder="Colour" />
                        </div>
                        <div class="col-md-8">
                            <label>Description</label><br>
                            <textarea rows="4" cols="50" name="description"> Notes about the item </textarea>
                        </div>
                        <div class="col-md-8">
                            <label>Image(</label>
                            <input type="file" name="image" placeholder="Image" />
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