@extends('layouts.admin')

@section('content')
<div class="container-fluid admin-container">
    <h6>Admin Panel - Users </h6>
    <small>{{date('Y-m-d H:i:s')}}</small>
    <p>Below you may find a list of all the users, search for a specific user and editing their info.</p>
    <br>
    <hr>
    <br>
    <label for="">Search for an User (Name, Email)</label>
    <input type="search" id="searchInput" id="">
    <br>
    <br>



            <div class="table-responsive">
            <table class="table table-striped" style="text-align: center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Last Login</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="usersTbl">
                    @foreach($users as $user)
                    <tr>
                        <td scope="row">{{$user->name}}</td>
                        <td>{{$user->country}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td><a href="/admin/users/{{$user->id}}" class="btn btn-primary">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            {{$users->links()}}


</div>    
@endsection

@push('scripts')
    <script>
        var usersOld = $('#usersTbl').html();

        function debounce(func, timeout = 500){
            let timer;
            return (...args) => {
              clearTimeout(timer);
              timer = setTimeout(() => { func.apply(this, args); }, timeout);
            };
          }

        const searchForUser = debounce(() => searchUser());


        function searchUser(query) {
            var query = $('#searchInput').val();
            if(query.length > 3) {
                $.ajax({
                    type: "GET",
                    url: "/admin/usersSearch/",
                    data: {q: query},
                    success: function (response) {
                        var users = JSON.parse(response);
                        var html = '';
                        console.log(typeof users);
                        if(typeof users == 'object' && users.length > 0) {
                            users.forEach(user => {
                                html += '<tr><td>'+user['name']+'</td><td></td><td></td><td><a href="/admin/users/'+user['id']+'" class="btn btn-primary">Edit</a></td></tr>';
                            });
                            $('#usersTbl').html(html);
                        } else {
                            $('#usersTbl').html('<td colspan="4">No results.</td>');
                        } 
                    }
                });
            } else {
                $('#usersTbl').html(usersOld);
            }
        }

        $('#searchInput').keydown(function (e) { 
            searchForUser();
        });

    
    </script>
@endpush