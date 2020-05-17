<!DOCTYPE html>
<html>
<head>
<title>Laravel 7 CRUD using Datatables</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
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
if(document.userForm.name.value !='' && document.userForm.email.value !='' )
document.userForm.btnsave.disabled=false
else
document.userForm.btnsave.disabled=true
}
</script>
</head>
<body>

<div class="container">
<h1 align="center">Technical QC Listing</h1>
<br/>
<div class="row">
<div class="col-lg-12 margin-tb">
<!-- <div class="pull-right">
<a class="btn btn-success mb-2" id="new-user" data-toggle="modal">New Qc</a>
</div> -->
</div>
</div>

<table class="table table-bordered data-table" >
<thead>
<tr id="">
<th width="5%">No</th>
<th width="5%">Id</th>
<th width="30%">File Name</th>
<!-- <th width="30%">Email</th> -->
<!-- <th width="30%">Created At</th> -->
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
	
<!-- <div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Name:</strong>
<input type="text" name="name" id="name" class="form-control" placeholder="Name" onchange="validate()" >
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Email:</strong>
<input type="text" name="email" id="email" class="form-control" placeholder="Email" onchange="validate()">
</div>
</div> -->

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>File name:</strong>
<input type="text" name="file_name" id="file_name" class="form-control" placeholder="file_name" onchange="validate()">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Container:</strong>
<input type="text" name="container" id="container" class="form-control" placeholder="container" onchange="validate()">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>video codec:</strong>
<input type="text" name="video_codec" id="video_codec" class="form-control" placeholder="video_codec" onchange="validate()">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>video_aspect_ratio:</strong>
<input type="text" name="video_aspect_ratio" id="video_aspect_ratio" class="form-control" placeholder="video_aspect_ratio" onchange="validate()">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>video_frame_size:</strong>
<input type="text" name="video_frame_size" id="video_frame_size" class="form-control" placeholder="video_frame_size" onchange="validate()">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>video_frame_rate:</strong>
<input type="text" name="video_frame_rate" id="video_frame_rate" class="form-control" placeholder="video_frame_rate" onchange="validate()">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>video_bitrate:</strong>
<input type="text" name="video_bitrate" id="video_bitrate" class="form-control" placeholder="video_bitrate" onchange="validate()">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>h_264_profile:</strong>
<input type="text" name="h_264_profile" id="h_264_profile" class="form-control" placeholder="h_264_profile" onchange="validate()">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>audio_sampling_rate:</strong>
<input type="text" name="audio_sampling_rate" id="audio_sampling_rate" class="form-control" placeholder="audio_sampling_rate" onchange="validate()">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>audio_bitrate:</strong>
<input type="text" name="audio_bitrate" id="audio_bitrate" class="form-control" placeholder="audio_bitrate" onchange="validate()">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>audio_codec:</strong>
<input type="text" name="audio_codec" id="audio_codec" class="form-control" placeholder="audio_codec" onchange="validate()">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>audio_channels:</strong>
<input type="text" name="audio_channels" id="audio_channels" class="form-control" placeholder="audio_channels" onchange="validate()">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>key_frame_interval:</strong>
<input type="text" name="key_frame_interval" id="key_frame_interval" class="form-control" placeholder="key_frame_interval" onchange="validate()">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>duration:</strong>
<input type="text" name="duration" id="duration" class="form-control" placeholder="duration" onchange="validate()">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>status:</strong>
<input type="text" name="status" id="status" class="form-control" placeholder="status" onchange="validate()">
</div>
</div>


<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Save</button>
<a href="{{ route('tqcs.index') }}" class="btn btn-danger">Cancel</a>
</div>
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

</body>

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
/*{data: 'created_at', created_at: 'created_at'},*/
{data: 'action', file_name: 'action', orderable: false, searchable: false},
]
});

/* When click New customer button */
$('#new-user').click(function () {
$('#btn-save').val("create-user");
$('#user').trigger("reset");
$('#userCrudModal').html("Add New User");
$('#crud-modal').modal('show');
});

/* Edit customer */
$('body').on('click', '#edit-user', function () {
var user_id = $(this).data('id');
$.get('tqcs/'+user_id+'/edit', function (data) {
$('#userCrudModal').html("Edit User");
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
</html>