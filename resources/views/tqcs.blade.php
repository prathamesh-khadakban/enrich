@extends('admin.master')

@section('header')
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script>
  error=false

  function validate()
  {
  if(document.userForm.file_name.value !='' && document.userForm.duration.value !='' )
  document.userForm.btnsave.disabled=false
  else
  document.userForm.btnsave.disabled=true
  }
  </script>

@endsection

  
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">

        <!-- TQCS -->
        <div class="container">
          <h1 align="center">Technical QC Listing</h1>
          <br/>
          <div class="row">
          <div class="col-lg-12 margin-tb">
          <div class="pull-right">
          <button class="btn btn-info" id="new-user" data-toggle="modal">New Qc</button>
          </div>
          </div>
          </div>

          <table class="table table-bordered data-table" >
          <thead>
          <tr id="">
          <th width="5%">No</th>
          <th width="5%">Id</th>
          <th width="30%">File Name</th>
          <th width="20%">Status</th>
          <th width="20%">Action</th>
          </tr>
          </thead>
          <tbody>
          </tbody>
          </table>
          </div>

          <!-- Add and Edit customer modal -->
          <div class="modal fade" id="crud-modal" aria-hidden="true" >
          <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title" id="userCrudModal"></h4>
          </div>
          <div class="modal-body">
          <form name="userForm" action="{{ route('tqcs.store') }}" method="POST">
          <input type="hidden" name="user_id" id="user_id" >
          @csrf
          
          <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
          <strong>File name:</strong>
          <input type="text" name="file_name" id="file_name" class="form-control" placeholder="file_name" onchange="validate()">
          </div>
          </div>
          </div>

          <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>Container:</strong>
          <select class="form-control form-control" name="container" id="container" onchange="validate()" required>
          <option value="">Select</option>  
          <option value=".mp4">.mp4</option>
          <option value=".mov">.mov</option>
          </select>
          <!-- <input type="text" name="container" id="container" class="form-control" placeholder="container" onchange="validate()"> -->
          </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>video codec:</strong>
          <select class="form-control form-control" required name="video_codec" id="video_codec" onchange="validate()">
            <option value="">Select</option>
            <option value="h.264">h.264</option>
            <option value="AVC">AVC</option>
          </select>
          </div>
          </div>
          </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>video_aspect_ratio:</strong>
          <select class="form-control form-control" required name="video_aspect_ratio" id="video_aspect_ratio" onchange="validate()" >
            <option value="">Select</option>
            <option value="16x9">16x9</option>
            <option value="4x3">4x3</option>
          </select>
          </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>video_frame_size:</strong>
          <select class="form-control form-control" required name="video_frame_size" id="video_frame_size" onchange="validate()">
            <option value="">Select</option>
            <option value="352 x 240 (240p)">352 x 240 (240p)</option>
            <option value="480 x 360 (360p)">480 x 360 (360p)</option>
            <option value="720 x 480 (480p)">720 x 480 (480p)</option>
            <option value="720 x 576 (576p)">720 x 576 (576p)</option>
            <option value="1280 x 720 (720p)">1280 x 720 (720p)</option>
            <option selected value="1920 x 1080 (1080p)">1920 x 1080 (1080p)</option>
            <option value="2560 × 1440 (2K)">2560×1440 (2K)</option>
            <option value="3840 × 2160 (4K UHD)">3840 × 2160 (4K UHD)</option>
            <option value="4096 × 2160 (DCI 4K)">4096 × 2160 (DCI 4K)</option>
            <option value="7680 × 4320 (8K UHD)">7680 × 4320 (8K UHD)</option>
          </select>
          </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>video_frame_rate:</strong>
          <select class="form-control form-control" required name="video_frame_rate" id="video_frame_rate" onchange="validate()" >
            <option value="">Select</option>
            <option value="25 fps">25 fps</option>
            <option value="30 fps">30 fps</option>
            <option value="60 fps">60 fps</option>
            <option value="120 fps">120 fps</option>
          </select>
          </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>video_bitrate:</strong>
          <select class="form-control form-control" required name="video_bitrate" id="video_bitrate" onchange="validate()">
            <option value="">Select</option>
            <option value="1,000 kbps (360p)">1,000 kbps (360p)</option>
            <option value="2,500 kbps (480p)">2,500 kbps (480p)</option>
            <option value="1,200 - 4,000 kbps (720p)">1,200 - 4,000 kbps (720p)</option>
            <option value="4,000-8,000 kbps (1080p)">4,000-8,000 kbps (1080p)</option>
            <option value="6,000-10,000 Kbps (2K)">6,000-10,000 Kbps (2K)</option>
            <option value="8,000-14,000 kbps (4K)">8,000-14,000 kbps (4K)</option>
          </select>
          </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>h_264_profile:</strong>
          <select class="form-control form-control" required name="h_264_profile" id="h_264_profile" onchange="validate()">
            <option value="main">main</option>
            <option value="high">high</option>
          </select>
          </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>audio_sampling_rate:</strong>
          <select class="form-control form-control" required name="audio_sampling_rate" id="audio_sampling_rate" onchange="validate()">
            <option value="44.1 khz">44.1 khz</option>
            <option value="48 khz">48 khz</option>
          </select>
          </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>audio_bitrate:</strong>
          <select class="form-control form-control" required name="audio_bitrate" id="audio_bitrate" onchange="validate()">
            <option value="64 kbps">64 kbps</option>
            <option value="128 kbps">128 kbps</option>
          </select>
          </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>audio_codec:</strong>
          <select class="form-control form-control" required name="audio_codec" id="audio_codec" onchange="validate()">
            <option value="AAC-LC">AAC-LC</option>
            <option value="Other">Other</option>
          </select>
          </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>audio_channels:</strong>
          <select class="form-control form-control" required name="audio_channels" id="audio_channels" onchange="validate()">
            <option value="Mono mix">Mono mix</option>
            <option value="Stereo">Stereo</option>
          </select>
          </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>key_frame_interval:</strong>
          <select class="form-control form-control" required name="key_frame_interval" id="key_frame_interval" onchange="validate()" >
          <option value="1">1</option>
          <option value="other">other</option>
          </select>
          </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>duration:</strong>
          <input type="text" name="duration" id="duration" class="form-control" placeholder="Format - 00:00:00" onchange="validate()">
          </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>status:</strong>
          <select class="form-control form-control" required name="status" id="status" onchange="validate()" >
          <option value="1">Active</option>
          <option value="0">Inactive</option>
          </select>
          </div>
          </div>
        </div>


          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Save</button>
          <a href="{{ route('tqcs.index') }}" class="btn btn-danger">Cancel</a>
          </div>
          
          </form>
          </div>
          </div>
          </div>
          </div>

          <!-- Show user modal -->
          <div class="modal fade" id="crud-modal-show" aria-hidden="true" >
          <div class="modal-dialog">
          <div class="modal-content">
          <div class="modal-header">
          <h4 class="modal-title" id="userCrudModal-show"></h4>
          </div>
          <div class="modal-body">
          <div class="row">
          <div class="col-xs-2 col-sm-2 col-md-2"></div>
          <div class="col-xs-10 col-sm-10 col-md-10 ">

          <table class="table-responsive ">
          <tr height="50px"><td><strong>Name:</strong></td><td id="sname"></td></tr>
          <tr height="50px"><td><strong>Email:</strong></td><td id="semail"></td></tr>

          <tr><td></td><td style="text-align: right "><a href="{{ route('tqcs.index') }}" class="btn btn-danger">OK</a> </td></tr>
          </table>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
        
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('footer')
  <script type="text/javascript">

    $(document).ready(function () {

    var table = $('.data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('tqcs.index') }}",
    columns: [
    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    {data: 'id', name: 'id'},
    {data: 'file_name', name: 'file_name'},
    {data: 'action2', file_name: 'action2', orderable: false, searchable: false},
    {data: 'action', file_name: 'action', orderable: false, searchable: false},
    ]
    });

    /* When click New customer button */
    $('#new-user').click(function () {
    $('#btn-save').val("create-user");
    $('#user').trigger("reset");
    $('#userCrudModal').html("Add QC");
    $('#crud-modal').modal('show');
    });

    /* Edit customer */
    $('body').on('click', '#edit-user', function () {
    var user_id = $(this).data('id');
    $.get('tqcs/'+user_id+'/edit', function (data) {
    $('#userCrudModal').html("Edit QC");
    $('#btn-update').val("Update");
    $('#btn-save').prop('disabled',false);
    $('#crud-modal').modal('show');
    $('#user_id').val(data.id);
    /*$('#name').val(data.name);
    $('#email').val(data.email);*/
    $('#file_name').val(data.file_name);
    $('#container').val(data.container);
    $('#video_codec').val(data.video_codec);
    $('#video_aspect_ratio').val(data.video_aspect_ratio);
    $('#video_frame_size').val(data.video_frame_size);
    $('#video_frame_rate').val(data.video_frame_rate);
    $('#video_bitrate').val(data.video_bitrate);
    $('#h_264_profile').val(data.h_264_profile);
    $('#audio_sampling_rate').val(data.audio_sampling_rate);
    $('#audio_bitrate').val(data.audio_bitrate);
    $('#audio_codec').val(data.audio_codec);
    $('#audio_channels').val(data.audio_channels);
    $('#key_frame_interval').val(data.key_frame_interval);
    $('#duration').val(data.duration);
    $('#status').val(data.status);

    })
    });
    /* Show customer */
    $('body').on('click', '#show-user', function () {
    var user_id = $(this).data('id');
    $.get('tqcs/'+user_id, function (data) {

    $('#sname').html(data.file_name);
    $('#semail').html(data.email);

    })
    $('#userCrudModal-show').html("User Details");
    $('#crud-modal-show').modal('show');
    });

    /* Delete customer */
    $('body').on('click', '#delete-user', function () {
    var user_id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
    confirm("Are You sure want to delete !");

    $.ajax({
    type: "DELETE",
    url: "http://localhost/laravelpro/public/tqcs/"+user_id,
    data: {
    "id": user_id,
    "_token": token,
    },
    success: function (data) {

    //$('#msg').html('Customer entry deleted successfully');
    //$("#customer_id_" + user_id).remove();
    table.ajax.reload();
    },
    error: function (data) {
    console.log('Error:', data);
    }
    });
    });

    });

  </script>
@endsection



  
