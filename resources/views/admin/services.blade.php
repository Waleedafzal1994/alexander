@extends('layouts.admin')

@section('content')
<div class="container-fluid admin-container">
    <h6>Admin Panel - Services </h6>
    <small>{{date('Y-m-d H:i:s')}}</small>
    <p>Below you may find a list of all the services and edit their info.</p>
    <br>
    <hr>
    <label for="">Search for a Service (Service Name, User Name)</label>
    <input type="search" id="searchInput" id="">
    <br>
    <br>
    <br>
    <div class="row">
        
        <div class="col-md-12">
            <div class="table-responsive">

            <table class="table tablesearch-table table-striped" style="text-align: center" id="datatable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>User</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="servicesTbl">
                    @foreach($services as $service)
                    <tr>
                        <td scope="row">{{$service->name}}</td>
                        <td><a href="/profile/{{$service->user->id}}">{{$service->user->name}}</a></td>
                        <td>{{$service->category->name}}</td>
                        <td><a href="/admin/services/{{$service->id}}" class="btn btn-primary">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            {{$services->links()}}
        </div>
    </div>

</div>    
@endsection



@push('scripts')
    <script>
        var servicesOld = $('#servicesTbl').html();

        function debounce(func, timeout = 500){
            let timer;
            return (...args) => {
              clearTimeout(timer);
              timer = setTimeout(() => { func.apply(this, args); }, timeout);
            };
          }

        const searchForService = debounce(() => searchService());


        function searchService(query) {
            var query = $('#searchInput').val();
            if(query.length > 3) {
                $.ajax({
                    type: "GET",
                    url: "/admin/servicesSearch/",
                    data: {q: query},
                    success: function (response) {
                        var services = JSON.parse(response);
                        var html = '';
                        console.log(typeof services);
                        if(typeof services == 'object' && services.length > 0) {
                            services.forEach(service => {
                                html += '<tr><td>'+service['name']+'</td><td><a href="/profile/'+service['user_id']+'">'+service['user']+'</a></td><td>'+service['cat']+'</td><td><a href="/admin/services/'+service['id']+'" class="btn btn-primary">Edit</a></td></tr>';
                            });
                            $('#servicesTbl').html(html);
                        } else {
                            $('#servicesTbl').html('<td colspan="4">No results.</td>');
                        } 
                    }
                });
            } else {
                $('#servicesTbl').html(servicesOld);
            }
        }

        $('#searchInput').keydown(function (e) { 
            searchForService();
        });

    
    </script>
@endpush