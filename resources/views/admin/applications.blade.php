@extends('layouts.admin')

@section('content')
<style>
    td {
        vertical-align:middle !important;
    }
</style>
<div class="container-fluid admin-container">
    <h6>Admin Panel - Seller Applications </h6>
    <small>{{date('Y-m-d H:i:s')}}</small>

    <br>
    <br>
    
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr style="text-align: center;">
                        <th>User</th>
                        <th>Location</th>
                        <th>Last Seen</th>
                        <th>Audio</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="applications_list">
                    @if(count($applications) == 0)
                    <tr>
                        <td colspan="5" style="text-align:center !important;">No data found.</td>
                    </tr>
                    @endif
                    @foreach($applications as $application)
                    <tr id="application_{{$application->id}}">
                        <td scope="row">{{$application->user->name}}</td>
                        <td>{{$application->user->country}}</td>
                        <td>{{$application->user->last_seen->diffForHumans()}}</td>
                        <td>
                            <audio controls>
                                <source src="/{{$application->audio_link}}">
                                </audio>
                        </td>
                        <td>
                            <a href="#" class="btn btn-success btn-admin-action" data-decision='approve' data-id="{{$application->id}}">Approve</a>
                            <a href="#" class="btn btn-danger btn-admin-action" data-decision='deny' data-id="{{$application->id}}">Deny</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            {{$applications->links()}}
        </div>
    </div>

</div>    
@endsection

@push('scripts')
    <script>
        $('.btn-admin-action').click(function (e) { 
            e.preventDefault();
            var decision = this.dataset.decision;
            var id = this.dataset.id;

            $.ajax({
                type: "GET",
                url: "/admin/applications/approve",
                data: {decision:decision, id:id},
                success: function (response) {
                    if(response == 'success') {
                        var icon, text;
                        if(decision == 'approve') {
                            icon = 'success';
                            text = 'approved';
                        } else {
                            icon = 'error';
                            text = 'denied';
                        }

                        Swal.fire({
                        title: 'Application has been ' + text,
                        html: '',
                        timer: 500,
                        icon: icon,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                        }
                        });
                        $('#application_' + id).remove();
                    }
                    // if($('#applications_list > li'))
                }
            });
        });
    </script>
@endpush