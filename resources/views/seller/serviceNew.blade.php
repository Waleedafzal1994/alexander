@extends('layouts.app')

@section('content')
<br>
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <h2>Create a new service</h2>
    <hr>
    <form action="/seller/service/new" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Service Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="input">
        </div>
        <div class="form-group">
            <label for="">Menu</label>
            <select name="menu" id="menu" required>
                <option value="">Select</option>
                @foreach($menus as $menu)
                <option value="{{$menu->id}}">{{$menu->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Category</label>
            <select name="category" id="category" required><option value="">Select</option></select>
        </div>
        <div class="form-group">
            <label for="">Price</label>
            <input type="number" name="price" step="0.01" min="0.01" value="{{ old('price') }}">
        </div>
        <div class="form-group">
            <label for="">Service duration type</label>
            <select name="service_duration_type" required>
                <option value="">Select type</option>
                <option value="per game">per game</option>
                <option value="15 min">15 min</option>
                <option value="30 min">30 min</option>
                <option value="1 hour">1 hour</option>

            </select>
           
        </div>
        <div class="form-group">
            <label for="">Service Description</label>
            <textarea name="description" id="" cols="3" rows="3" class="input">{{old('description')}}</textarea>
        </div>
        <div class="form-group">
            <label for="">Buyer Instructions</label>
            <textarea name="instructions" id="" cols="3" rows="3" class="input">{{old('instructions')}}</textarea>
        </div>

        <br>
        <h5>Availability</h5>
        <small>Current server time is: {{date('H:i')}}, please enter availability times in the server's timezone.</small>
        <hr>
        <div class="form-group">
            <label for="">Monday</label>
            <div style="display:flex;">
                
                <select name="monday_from" value="{{ old('monday_from') }}"class="input" style="margin-right:10px;">
                    <option value="">Select</option>
                    @for($i=0; $i<24; $i++)
                    <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00</option>
                    @endfor
                </select>
                <select name="monday_to" value="{{ old('monday_to') }}" class="input" style="margin-right:10px;">
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
                <select name="tuesday_from" value="{{ old('tuesday_from') }}"class="input" style="margin-right:10px;">
                    <option value="">Select</option>
                    @for($i=0; $i<24; $i++)
                    <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00</option>
                    @endfor
                </select>
                <select name="tuesday_to" value="{{ old('tuesday_to') }}" class="input" style="margin-right:10px;">
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
                <select name="wednesday_from" value="{{ old('wednesday_from') }}"class="input" style="margin-right:10px;">
                    <option value="">Select</option>
                    @for($i=0; $i<24; $i++)
                    <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00</option>
                    @endfor
                </select>
                <select name="wednesday_to" value="{{ old('wednesday_to') }}" class="input" style="margin-right:10px;">
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
                <select name="thursday_from" value="{{ old('thursday_from') }}"class="input" style="margin-right:10px;">
                    <option value="">Select</option>
                    @for($i=0; $i<24; $i++)
                    <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00</option>
                    @endfor
                </select>
                <select name="thursday_to" value="{{ old('thursday_to') }}" class="input" style="margin-right:10px;">
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
                <select name="friday_from" value="{{ old('friday_from') }}"class="input" style="margin-right:10px;">
                    <option value="">Select</option>
                    @for($i=0; $i<24; $i++)
                    <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00</option>
                    @endfor
                </select>
                <select name="friday_to" value="{{ old('friday_to') }}" class="input" style="margin-right:10px;">
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
                <select name="saturday_from" value="{{ old('saturday_from') }}"class="input" style="margin-right:10px;">
                    <option value="">Select</option>
                    @for($i=0; $i<24; $i++)
                    <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00</option>
                    @endfor
                </select>
                <select name="saturday_to" value="{{ old('saturday_to') }}" class="input" style="margin-right:10px;">
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
                <select name="sunday_from" value="{{ old('sunday_from') }}"class="input" style="margin-right:10px;">
                    <option value="">Select</option>
                    @for($i=0; $i<24; $i++)
                    <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:00</option>
                    @endfor
                </select>
                <select name="sunday_to" value="{{ old('sunday_to') }}" class="input" style="margin-right:10px;">
                    <option value="">Select</option>
                    @for($i=0; $i<24; $i++)
                    <option value="{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:59">{{str_pad($i, 2, "0", STR_PAD_LEFT)}}:59</option>
                    @endfor
                </select>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>


@endsection

@push('scripts')
<script>
    var menuId;

    $(document).ready(function () {
        $('#menu').val('');
    });
    
    $('#menu').change(function (e) { 
        e.preventDefault();
        menuId = $('#menu').val();
        if(menuId) {
         $.ajax({
        type: "GET",
        url: "/seller/getCategories",
        data: {id:menuId},
        success: function (response) {
            $('#category').html('<option value="">Select</option>');
            response.forEach(el => {
                $('#category').append('<option value="'+el['id']+'">'+el['name']+'</option>');

            });
        }
        });

        }
    });

</script>
@endpush