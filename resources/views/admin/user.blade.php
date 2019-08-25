@extends('layouts.admin_app')
@section('title','ADMIN | USER ACCOUNT')
@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <!-- start user form -->
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">User</h4>
              <p class="card-category">Complete Data</p>
            </div>
            <div class="card-body user_form">
              <form id="insert_user">
                {{csrf_field()}}
                <input type="hidden" name="id" class="user_id">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="">Name</label>
                      <input required type="text" class="form form-control user_name" name="name">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                       <label class="">Email</label>
                       <input required type="email" class="form form-control user_email" name="email">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="">Phone</label>
                      <input required type="tel" class="form form-control user_phone" name="phone">  
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label class="">Select Type</label>
                        <select name="type" class="form form-control selecte_type_option">
                            <option value="transport">Transport</option>
                            <option value="freight">Freight</option>
                        </select>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="">Password</label>
                      <input required type="password" class="form form-control user_password" name="password">  
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="">Confirm Password</label>
                      <input required type="password" class="form form-control" name="password_confirmation">
                    </div>
                  </div>
                </div>
                  <div class="user_button">
                    <button type="submit" class="btn btn-primary btn-md rounded-0 pull-right submit_button"><i class="fas fa-plus"></i> &nbsp;Add</button>
                  </div>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
          <!-- end user form -->
        </div>
        <div class="col-md-8">
        <!-- start user pagination -->
          <div class="card">
            <div class="card-header_header card-header-primary">
               <div class="row">
                 <div class="col-md-6">
                  <h4 class="card-title header">User Data List</h4>
                 </div>
                 <div class="col-md-6">
                  <h4 class="card-title header">Select Type</h4>
                  <select class="form form-control related_select_data text-info" style="font-size : 15px;">
                      <option value="all">All</option>
                      <option value="transport">Transport</option>
                      <option value="freight">Freight</option>
                  </select>
                 </div>
               </div>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover text-primary" id="userPaginate">
                <thead>
                  <th>No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Action</th>
                </thead>
              </table>
            </div>
            </div>
          <!-- end user pagination -->
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog center modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form method="POST" action="{{url('admin/user/change/password')}}">
                @csrf
                <input type="hidden" name="id" class="hidden_id">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="">New Password</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="">Confirm Password</label>
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                  </div>
                </div> 
                <button type="submit" class="btn btn-md btn-outline-info pull-right">Change Password</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function dataLoad(){
  table.clear().draw();
  $.ajax({
          url : "{{url('admin/user/data')}}",
          type : "get",
          dataType : "json"
        }).done(function(response){
        //   console.log(response);
          $.each(response,function(index,data){
            let no=index+1;
            let id=data.id;
            let name=data.name;
            let email=data.email;
            let phone=data.phone;
            let td_generate='<button data-id="'+id+'" class="container-fluid btn btn-sm btn-info rounded-0 change-password" data-toggle="modal" data-target="#password">Change Password</button>'
            +'<button class="btn btn-sm rounded-0 btn-danger user_delete" data-id="'+id+'">Delete</button>';
            table.row.add([no,name,email,phone,td_generate]).draw();
          });
        }).fail(function(error){
          console.log(error);
  });
}

    removeShowEntryOnDataTable("userPaginate"); 
    let table=$("#userPaginate").DataTable();
    $(function(){
        dataLoad(); // load user Data
        // create 
        $(document).on('submit','#insert_user',function(event){
            event.preventDefault(); 
            $(".submit_button").attr('disabled','true');
            let user_data=new FormData(this);
              $.ajax({
                  url : "{{url('admin/user/store')}}",
                  type : "post",
                  data : user_data,
                  dataType : "json",
                  processData: false,
                  contentType: false,
              }).done(function(response){
                if(response){
                    $(".submit_button").removeAttr('disabled');
                    toastr_success('User Account Create Successful');
                    dataLoad();
                }
              }).fail(function(error){
                $(".submit_button").removeAttr('disabled');
                if(error.responseJSON.errors.name){
                    toastr.error(error.responseJSON.errors.name);
                }
                if(error.responseJSON.errors.email){
                    toastr.error(error.responseJSON.errors.email);
                }
                if(error.responseJSON.errors.phone){
                    toastr.error(error.responseJSON.errors.phone);
                }
                if(error.responseJSON.errors.password){
                    toastr.error(error.responseJSON.errors.password);
                }
              });
        });
        // related select data
        $(document).on('change','.related_select_data',function(){
            let selected_type=$(this).val();
            if(selected_type === 'all'){
                dataLoad();
            }else{
                $.ajax({
                    url : "{{url('admin/selected/type')}}/"+selected_type,
                    type : 'get',
                    dataType : 'json'
                }).done(function(response){
                    table.clear().draw();
                    $.each(response,function(index,data){
                        let no=index+1;
                        let id=data.id;
                        let name=data.name;
                        let email=data.email;
                        let phone=data.phone;
                        let td_generate='<button class="btn btn-sm rounded-0 btn-info" data-id="'+id+'">Change Password</button>'
                        +'<button class="btn btn-sm rounded-0 btn-danger user_delete" data-id="'+id+'">Delete</button>';
                        table.row.add([no,name,email,phone,td_generate]).draw();
                    });
                }).fail(function(error){
                    console.log(error);
                });
            }
           
        });
        // delete
        $(document).on('click','.user_delete',function(){
          let id=$(this).data('id');
          if(confirm("Are you sure , you want delete ?")){
            $.ajax({
            url : "{{url('admin/user/delete/')}}/"+id,
            type : "post",
            data : { '_method' : "delete" },
            dataType : "json"
            }).done(function(response){
              if(response){
                toastr_success("User Account delete successful");
                dataLoad();
              }
            }).fail(function(error){
              console.log(error);
            });
          }
        });
        // change password
        $(document).on('click','.change-password',function(){
          let id=$(this).data('id');
          $(".hidden_id").val(id);
        });
    });
</script>
@error('password')
    <script>toastr.error("{{$message}}");</script>                   
@enderror
@endsection