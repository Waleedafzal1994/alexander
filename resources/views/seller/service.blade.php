@extends('layouts.app')
@section('style')
<style>
    .nav .active {
        color:black !important;
    }

    .active label {
        color:black !important;
    }
</style>
@endsection
@section('content')

<!-- Modal -->
<div class="modal fade" id="optionsModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Service Image Actions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div style="text-align:center;">
                    <img src="" alt="" style="height:128px; width:128px; object-fit:cover; border-radius:4px;" id="serviceImg">
                </div>
                <br>
                
                <button class="btn-block btn-success" id="defaultBtn">Make default</button>
                <button class="btn-block btn-danger" id="deleteBtn">Delete</button>
            </div>

        </div>
    </div>
</div>

<div class="header-page rounded">
    <div>
        <h1>Service Page - Service #{{$service->id}}</h1>
        <p>Here you may find the various details regarding your service and edit them.</p>
    </div>
</div>
    <div class="container-fluid" style="padding:0 30px;">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General Info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="schedule-tab" data-toggle="tab" href="#schedule" role="tab" aria-controls="schedule" aria-selected="false">Schedule</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="photos-tab" data-toggle="tab" href="#photos" role="tab" aria-controls="photos" aria-selected="false">Photos</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">


            {{-- General tab --}}
            <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                <br>
                <form action="/seller/service/{{$service->id}}/update" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$service->id}}">
                <input type="hidden" name="category_id" value="{{$seller_gen_info['category_id']}}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Service Name</label>
                            <input type="text" name="name" value="{{$service->name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Service Description</label>
                            <textarea name="description"  rows="3">{{$seller_gen_info['description']}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Service Instructions (to buyers)</label>
                            <textarea name="instructions"  rows="3">{{$seller_gen_info['instructions']}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" name="price" step="0.01" min="0.01" value="{{$service->price}}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Service duration type</label>
                            <select name="service_duration_type" required>
                                <option value="">Select type</option>
                                <option value="per game" @if( $service->service_duration_type == 'per game') selected @endif >per game</option>
                                <option value="15 min" @if( $service->service_duration_type == '15 min') selected @endif >15 min</option>
                                <option value="30 min" @if( $service->service_duration_type == '30 min') selected @endif > 30 min</option>
                                <option value="1 hour" @if( $service->service_duration_type == '1 hour') selected @endif >1 hour</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Active</label>
                            <input name="active" type="checkbox" class="form-control" style="width:30px;"
                            @if($service->active)
                             checked
                              @endif
                              >
                            <small class="text-danger"></small>
                        </div>
                    </div>

                    <div class="col-md-12" style="text-align: center">
                        <br>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>

                </form>
            </div>



            {{-- Schedule Tab --}}
            <div class="tab-pane fade" id="schedule" role="tabpanel" aria-labelledby="schedule-tab">
                <form action="/seller/service/{{$service->id}}/updateSchedule" method="POST">
                <br>
                @csrf
                <h5 style="color:black !important;">Availability</h5>
                <small style="color:black !important;">Current server time is: {{date('H:i')}}, please enter availability times in the server's timezone.</small>
                <hr>
                <div class="form-group">
                    <label for="">Monday</label>
                    <div style="display:flex;">
                
                        <select name="monday_from" class="input" style="margin-right:10px;">
                            <option value="">Select</option>
                            @for($i=0; $i<24; $i++)
                            <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00</option>
                            @endfor
                        </select>
                        <select name="monday_to" class="input" style="margin-right:10px;">
                            <option value="">Select</option>
                            @for($i=0; $i<24; $i++)
                            <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:59">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:59</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Tuesday</label>
                    <div style="display:flex;">
                        <select name="tuesday_from" class="input" style="margin-right:10px;">
                            <option value="">Select</option>
                            @for($i=0; $i<24; $i++)
                            <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00</option>
                            @endfor
                        </select>
                        <select name="tuesday_to"  class="input" style="margin-right:10px;">
                            <option value="">Select</option>
                            @for($i=0; $i<24; $i++)
                            <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:59">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:59</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Wednesday</label>
                    <div style="display:flex;">
                        <select name="wednesday_from" class="input" style="margin-right:10px;">
                            <option value="">Select</option>
                            @for($i=0; $i<24; $i++)
                            <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00</option>
                            @endfor
                        </select>
                        <select name="wednesday_to"  class="input" style="margin-right:10px;">
                            <option value="">Select</option>
                            @for($i=0; $i<24; $i++)
                            <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:59">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:59</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Thursday</label>
                    <div style="display:flex;">
                        <select name="thursday_from"class="input" style="margin-right:10px;">
                            <option value="">Select</option>
                            @for($i=0; $i<24; $i++)
                            <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00</option>
                            @endfor
                        </select>
                        <select name="thursday_to"  class="input" style="margin-right:10px;">
                            <option value="">Select</option>
                            @for($i=0; $i<24; $i++)
                            <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:59">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:59</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Friday</label>
                    <div style="display:flex;">
                        <select name="friday_from" class="input" style="margin-right:10px;">
                            <option value="">Select</option>
                            @for($i=0; $i<24; $i++)
                            <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00</option>
                            @endfor
                        </select>
                        <select name="friday_to"  class="input" style="margin-right:10px;">
                            <option value="">Select</option>
                            @for($i=0; $i<24; $i++)
                            <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:59">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:59</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Saturday</label>
                    <div style="display:flex;">
                        <select name="saturday_from" class="input" style="margin-right:10px;">
                            <option value="">Select</option>
                            @for($i=0; $i<24; $i++)
                            <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00</option>
                            @endfor
                        </select>
                        <select name="saturday_to"  class="input" style="margin-right:10px;">
                            <option value="">Select</option>
                            @for($i=0; $i<24; $i++)
                            <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:59">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:59</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Sunday</label>
                    <div style="display:flex;">
                        <select name="sunday_from" class="input" style="margin-right:10px;">
                            <option value="">Select</option>
                            @for($i=0; $i<24; $i++)
                            <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00</option>
                            @endfor
                        </select>
                        <select name="sunday_to"  class="input" style="margin-right:10px;">
                            <option value="">Select</option>
                            @for($i=0; $i<24; $i++)
                            <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:59">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:59</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
            </form>
            </div>

            {{-- Photos Tab --}}
            <div class="tab-pane fade" id="photos" role="tabpanel" aria-labelledby="photos-tab">
                <form action="/seller/service/{{$service->id}}/addImage" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="file" class="form-control" name="image" required>
                <button class="btn btn-primary" style="margin-top:5px;">Add image</button>
            </div>
            @if(isset($service->images) && count($service->images) > 0)
            <br>
            <h5>Currently uploaded service images</h5>
            <small>Click on an image to edit.</small>
            <hr>
          
        
            </form>
            <div class="row mobile-center">
            @foreach($service->images as $image)
            <div class="service-image-container" data-id="{{$image->id}}">
                <img src="/{{$image->file_name}}" alt="">
            </div>
            @endforeach

            </div>
            @endif
            </div>
          </div>




    </div>
@endsection

@push('scripts')
<script>


var images = @json($service->images);
var selectedImage;

    @if (\Session::has('success'))
    Swal.fire('Success','{{\Session::get('success')}}','success');
    {{\Session::forget('success')}}
    @endif

    @if (\Session::has('error'))
    Swal.fire('Error','{{\Session::get('error')}}','error');
    {{\Session::forget('error')}}
    @endif

    var service = @json($service); 
    var days = ['monday','tuesday','wednesday','thursday','friday','saturday','sunday'];
    days.forEach(day => {
        if(service[day + '_from'] != null) {
            service[day + '_from'] = service[day + '_from'].split(':')[0] + ':' +  service[day + '_from'].split(':')[1];
            $('select[name="'+day+'_from"]').val(service[day + '_from']);
        }
        if(service[day + '_to'] != null) {
            service[day + '_to'] = service[day + '_to'].split(':')[0] + ':' +  service[day + '_to'].split(':')[1];
            $('select[name="'+day+'_to"]').val(service[day + '_to'].split(':')[0] + ':' + service[day + '_to'].split(':')[1]);
        }
    });
    // service['monday_from'] = service['monday_from'].split(':')[0] + ':' +  service['monday_from'].split(':')[1];






$('.service-image-container').click(function (e) { 
    e.preventDefault();
    var imageId = this.dataset.id;
    selectedImage = imageId;
    $('#serviceImg').attr('src','/' + images.filter(e => e.id == imageId)[0].file_name);
    $('#optionsModal').modal('show');
});



$('#deleteBtn').click(function (e) { 
    e.preventDefault();
    if(selectedImage == undefined) return false;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: "/seller/service/{{$service->id}}/deleteImage",
        data: {imageId:selectedImage},
        success: function (response) {
            console.log(response);
            if(response == 'Success') {
                $('.service-image-container[data-id='+parseInt(selectedImage)+']').remove();
                selectedImage = undefined;
                $('#optionsModal').modal('hide');
            }
        }
    });
});


$('#defaultBtn').click(function (e) { 
    e.preventDefault();
    if(selectedImage == undefined) return false;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: "/seller/service/{{$service->id}}/defaultImage",
        data: {imageId:selectedImage},
        success: function (response) {
            console.log(response);
            if(response == 'Success') {
                Swal.fire('Success','Successfully updated default image.','success');
                $('#optionsModal').modal('hide');
            }
        }
    });
});






$(document).ready(function () {

    @if (\Session::has('tab'))
 
            var tab = '{{\Session::get('tab')}}';
            if(tab == 2) {
                $('#schedule-tab').trigger('click')
            } else if(tab == 3) {
                $('#photos-tab').trigger('click')

            }
        {{\Session::forget('tab')}}
        @endif
});

    </script>    
@endpush