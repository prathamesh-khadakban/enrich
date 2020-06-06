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
  if(document.userForm.Research_Background.value !='' && document.userForm.Coach_Name.value !='' )
  document.userForm.btnsave.disabled=false
  else
  document.userForm.btnsave.disabled=true
  }
  </script>

  <!-- datepicker -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">


@endsection

  
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row justify-content-center">

        <!-- Content Acquistion -->
        <div class="container">
          <h1 align="center">Content Acquistion</h1>
          <br/>
          <div class="row">
          <div class="col-lg-12 margin-tb">
          <div class="pull-right">
          <button class="btn btn-info" id="new-user" data-toggle="modal">New Acquistion</button>
          </div>
          </div>
          </div>

          <table class="table table-bordered data-table" >
          <thead>
          <tr id="">
          <th width="5%">No</th>
          <th width="5%">Id</th>
          <th width="30%">Research Background</th>
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
          <form name="userForm" action="{{ route('acquistions.store') }}" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="user_id" id="user_id" >
          @csrf
          
          <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
          <strong>Research Background:</strong>
          <input type="text" name="Research_Background" id="Research_Background" class="form-control" placeholder="Research_Background" onchange="validate()">
          </div>
          </div>
          </div>

          <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>Coach Name:</strong>
          <input type="text" name="Coach_Name" id="Coach_Name" class="form-control" placeholder="Coach_Name" onchange="validate()">
          </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>Coach Contact Details:</strong>
          <input type="text" name="Coach_Contact_Details" id="Coach_Contact_Details" class="form-control" placeholder="Coach_Contact_Details" onchange="validate()">
          </div>
          </div>
          </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>Area_of_expertise</strong>
         <input type="text" name="Area_of_expertise" id="Area_of_expertise" class="form-control" placeholder="Area_of_expertise" onchange="validate()">
          </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>Content request details:</strong>
          <select class="form-control" required name="Current_Content_request_details" id="Current_Content_request_details" onchange="validate()">
            <option value="">Select</option>
            <option value="Single_Video">Single_Video</option>
            <option value="Course">Course</option>
          </select>
          </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>Status:</strong>
          <select class="form-control form-control" required name="Status" id="Status" onchange="validate()" >
            <option value="">Select</option>
            <option value="Not started">Not started</option>
            <option value="Negotiations">Negotiations</option>
            <option value="Completed">Completed</option>
          </select>
          </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>Status Reason:</strong>
          <input type="text" name="Status_Reason" id="Status_Reason" class="form-control" placeholder="Status_Reason" onchange="validate()">
          </div>
          </div>
        </div>

        <div class="row">
          

          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>Content ownership period:</strong>
          <select class="form-control form-control" required name="Content_ownership_period" id="Content_ownership_period" onchange="validate()">
            <option value="Perpetual">Perpetual</option>
            <option value="Time_Bound">Time_Bound</option>
          </select>
          </div>
          </div>
        </div>

        <div class="row" id="date_toggle" style="display: none">
          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>Starting Date:</strong>
          <input type="text" name="Time_Bound_Starting_Date" id="Time_Bound_Starting_Date" class="form-control datepicker"  onchange="validate()">
          </div>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-6">
          <div class="form-group">
          <strong>Ending Date:</strong>
          <input type="text" name="Time_Bound_Ending_Date" id="Time_Bound_Ending_Date" class="form-control datepicker"  onchange="validate()">
          </div>
          </div>

        </div>

          <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
          <strong>Details of content files received:</strong>
           <input type="text" name="Details_of_content_files_received" id="Details_of_content_files_received" class="form-control" placeholder="Details_of_content_files_received" onchange="validate()">
          </div>
          </div>
          </div>
          <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
          <strong>Agreement:</strong>
           <input type="file" name="Agreement" id="Agreement" class="form-control" onchange="validate()">
           <a  target="_blank" class="btn btn-danger" id="Agreement_file"></a>
           <input type="hidden" name="Agreement_filename" id="Agreement_filename"></input>
          </div>
          </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Save</button>
          <a href="{{ route('acquistions.index') }}" class="btn btn-danger">Cancel</a>
          </div>
          
          </form>
          </div>
          </div>
          </div>
          </div>

          <!-- Show user modal -->
          <!-- <div class="modal fade" id="crud-modal-show" aria-hidden="true" >
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
          </div> -->
        
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('footer')
  
  <!-- Date Picker  -->
  <!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> -->
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <script>
  $(function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  });
  </script>

  <script type="text/javascript">

    $(document).ready(function () {

    var table = $('.data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('acquistions.index') }}",
    columns: [
    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    {data: 'id', name: 'id'},
    {data: 'research_background', name: 'research_background'},
    {data: 'action2', file_name: 'action2', orderable: false, searchable: false},
    {data: 'action', file_name: 'action', orderable: false, searchable: false},
    ]
    });

    /* When click New customer button */
    $('#new-user').click(function () {
    $('#btn-save').val("create-user");
    $('#user').trigger("reset");
    $('#userCrudModal').html("Add Acquistion");
    $('#crud-modal').modal('show');
    });

    /* Edit customer */
    $('body').on('click', '#edit-user', function () {
    var user_id = $(this).data('id');
    $.get('acquistions/'+user_id+'/edit', function (data) {
    $('#userCrudModal').html("Edit Acquistion");
    $('#btn-update').val("Update");
    $('#btn-save').prop('disabled',false);
    $('#crud-modal').modal('show');
    $('#user_id').val(data.id);
    /*$('#name').val(data.name);
    $('#email').val(data.email);*/
    $('#Research_Background').val(data.research_background);
    $('#Coach_Name').val(data.coach_name);
    $('#Coach_Contact_Details').val(data.coach_contact_details);
    $('#Area_of_expertise').val(data.area_of_expertise);
    $('#Current_Content_request_details').val(data.current_content_request_details);
    $('#Status').val(data.status);
    $('#Status_Reason').val(data.status_reason);
    $('#Content_ownership_period').val(data.content_ownership_period);
    $('#Time_Bound_Starting_Date').val(data.time_bound_starting_date);
    $('#Time_Bound_Ending_Date').val(data.time_bound_ending_date);
    $('#Details_of_content_files_received').val(data.details_of_content_files_received);
    $("#Agreement_file").attr("href", 'storage/'+data.agreement);
    $("#Agreement_file").text(data.agreement);
    $("#Agreement_filename").val(data.agreement);


    })
    });
    /* Show customer */
    $('body').on('click', '#show-user', function () {
    var user_id = $(this).data('id');
    $.get('acquistions/'+user_id, function (data) {

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
    url: "http://localhost/laravelpro/public/acquistions/"+user_id,
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
  <script type="text/javascript">
    
    $(function() {
        $("#Content_ownership_period").change(function() {
            var text = $('option:selected', this).text() ;
            if (text == "Time_Bound") {
              $("#date_toggle").show();
            }else{
              $("#date_toggle").hide();
            }
        });
    });

  </script>
@endsection



  
