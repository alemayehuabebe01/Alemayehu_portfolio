@extends('admin.admin_master')
@section('admin')

<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

             <div class="row">
                            <div class="col-lg-6">
                                <div class="card"><br><br>
                                    <!-- <img class="card-img-top img-fluid" src="{{ asset('backend/assets/images/small/img-5.jpg') }}" alt="Card image cap"> -->
                                <center>
                                    <img class="rounded-circle avatar-xl" alt="200x200" src="{{ (!empty($adminData->profile_image))? url('Upload/admin_images/'.$adminData->profile_image):url('Upload/no_image.jpg') }}" data-holder-rendered="true">
                              </center>
                                    <div class="card-body">
                                        <h4 class="card-title">Name<strong> : {{ $adminData->name }}</strong> </h4><hr>
                                        <h4 class="card-title">Emali :<strong> {{ $adminData->email }}<strong></h4><hr>
                                        <h4 class="card-title">User Name :<strong> {{ $adminData->username }}<strong></h4><hr>
                                        <a type="submit"  href="{{ route('edit.profile') }}" class="btn btn-primary">Edit Profile</a>
                                        </p>
                                    </div>
                                </div>
                            
                        </div>

                        </div>


                        
                            </div>

        
                        </div>
@endsection