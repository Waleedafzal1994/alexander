@extends('layouts.admin')

@section('content')


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top:100px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Choose new category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <p>The category you are trying to delete contains services.
                    Please choose a new category and these services will be moved to it.</p>
                <p>After this, your previously chosen category will be deleted.
                </p>
                <br>
                <p>You are deleting category: <strong class="cat_name"></strong></p>
                <br>
                <br>
                <p>Move services from <span class="cat_name"></span> to:</p>
                
                <select name="new_cat_id" id="">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <br>
                <br>

                <button class="btn btn-primary delete-second">Submit</button>
            </div>
          
        </div>
    </div>
</div>

<div class="container-fluid admin-container">
    <h6>Admin Panel - Categories </h6>
    <small>{{date('Y-m-d H:i:s')}}</small>
    <p>Below you may find a list of all the categories and edit their info.</p>
    <br>
    <hr>
    <a href="/admin/categoryNew" class="btn btn-primary">New category</a>
    <br>
    <br>
    <label for="">Search for a category</label>
    <input type="text" class="search tablesearch-input" data-tablesearch-table="#datatable" id="searchInput">
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table class="table tablesearch-table table-striped" style="text-align: center" id="datatable">
                <thead>
                    <tr>
                        <th data-tablesort-type="string">Name</th>
                        <th data-tablesort-type="string">Menu</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="categoriesTbl">
                    @foreach($categories as $category)
                    <tr id="category_{{$category->id}}">
                        <td scope="row">{{$category->name}}</td>
                        <td>{{$category->menu->name}}</td>
                        <td>
                            <a href="#" class="btn btn-danger btnRemove" data-id="{{$category->id}}">Remove</a>
                            <a href="/admin/categories/{{$category->id}}" class="btn btn-success">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$categories->links()}}
        </div>
    </div>

</div>    
@endsection

@push('scripts')
    <script>
        var catToDelete = undefined;

        $('.btnRemove').click(function (e) {
            e.preventDefault();
            catToDelete = this.dataset.id;
            var a = confirm('Are you sure you wish to delete this category?');
            if(a) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/admin/removeCategory",
                    data: {id:catToDelete},
                    success: function (response) {
                      response = JSON.parse(response);
                      if(response['code'] == 'chk') {
                          $('.cat_name').text(response['cat_name']);
                        $('#deleteModal').modal('show');
                      } else if(response['code'] == 'Success') {
                            $('#category_' + catToDelete).remove();
                            Swal.fire('Success','Category has been deleted.','success');
                          }
                    }
                });
            }
        });


        $('.delete-second').click(function (e) {
            e.preventDefault();
            if($('select[name="new_cat_id"]').val() == catToDelete) {
                alert('Category to move services to must be different than the category you are trying to delete.');
                return;
            }
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/admin/removeCategory",
                    data: {id:catToDelete, new_cat_id:$('select[name="new_cat_id"]').val()},
                    success: function (response) {
                      response = JSON.parse(response);
                      if(response['code'] == 'chk') {
                          $('.cat_name').text(response['cat_name']);
                        $('#deleteModal').modal('show');
                      } else if(response['code'] == 'Success') {
                        $('#deleteModal').modal('hide');
                        $('#category_' + catToDelete).remove();
                        Swal.fire('Success','Category has been deleted.','success');
                      }
                    }
                });
            
        });
    </script>
@endpush