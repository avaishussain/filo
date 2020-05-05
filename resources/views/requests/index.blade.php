@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Display all requests</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Item ID</th>
                                <th>Reason</th>
                                <?php
                                $id = $user = auth()->user();
                                $id = $id->role;
                                ?>
                                @if($id == 1)
                                <th colspan="2">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                            <tr>
                                <td>{{$request['userid']}}</td>
                                <td>{{$request['itemid']}}</td>
                                <td>{{$request['reason']}}</td>

                                @if($id == 1)

                                <td>
                                    <form action="{{action('RequestsController@destroy', $request['id'])}}" method="post"> @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit">Accept</button>
                                    </form>
                                </td>

                                <td>
                                    <form action="{{action('RequestsController@destroy', $request['id'])}}" method="post"> @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit">Deny</button>
                                    </form>
                                </td>

                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection