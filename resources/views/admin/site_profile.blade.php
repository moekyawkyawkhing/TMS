@extends('layouts.admin_app')
@section('title','ADMIN | SITE PROFILE')
@section('style')

@endsection

@section('content')
<div class="content">
    <div class="container-fluid card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Site Profile Setting</h4>
              <!-- <p class="card-category">Complete Data</p> -->
            </div>
      <div class="row m-3">
        <div class="col-md-5">
          <img src="{{asset('images/setting.jpg')}}" style="width:100%;height:350px;position:center" alt="">
        </div>
        <div class="col-md-7">
          <!-- start company profile form -->
            <div class="card-body">
              <form action="{{url('admin/change/site_profile')}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$site_profile->id}}" class="product_hidden">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="" style="color:black">Site Name</label>
                      <textarea name="name"  rows="1" class="form form-control pt-3 mb-3">{{$site_profile->name}}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="" style="color:black">Email</label>
                      <textarea name="email" rows="1" class="form form-control pt-3 mb-3">{{$site_profile->email}}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="" style="color:black">Phone</label>
                      <textarea name="phone" class="form form-control pt-3 mb-3" rows="1">{{$site_profile->phone}}</textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="" style="color:black">Address</label>
                      <textarea name="address" rows="2" class="form form-control pt-3 mb-3">{{$site_profile->address}}</textarea>
                    </div>
                  </div>
                </div>              
                <div class="row mt-3">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="" style="color:black">About us</label>
                      <textarea rows="3" name="about_us" class="form form-control pt-3 mb-3">{{$site_profile->about_us}}</textarea>
                    </div>
                  </div>
                </div>
                  <div class="product_create_button">
                    <button type="submit" class="btn btn-outline-info btn-md rounded-0 pull-right"><i class="far fa-edit"></i> &nbsp;Change Profile</button>
                  </div>
                  <div class="clearfix"></div>
              </form>
            </div>
          <!-- end company profile form -->
        </div>
      </div>
    </div>
</div>
@endsection
