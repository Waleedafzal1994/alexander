@extends('layouts.app')

@section('content')
<div class="container-fluid admin-container">
    <h6>Seller Panel - Services </h6>
    <small>{{date('Y-m-d H:i:s')}}</small>
    <p>Below you may find a list of all the services and edit their info.</p>
    <br>
    <hr>
    <label for="">Search for a service (Name, Price)</label>
    <input type="text" class="search" id="searchInput">
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table class="table" style="text-align: center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="servicesTbl">
                    @foreach($services as $service)
                    <tr>
                        <td scope="row">{{$service->name}}</td>
                        <td>{{$service->category->name}}</td>
                        <td>{{$service->price}}</td>
                        <td><a href="/seller/services/{{$service->id}}" class="btn btn-primary">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$services->links()}}
        </div>
    </div>

</div>    
@endsection