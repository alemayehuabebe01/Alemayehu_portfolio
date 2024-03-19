@extends('admin.admin_master')
@section('admin')


                        <div class="main-content">

<div class="page-content">
    <div class="container-fluid">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Change Password</h4><br>
                                        {{-- @if (count($errors) > 0)
                                            @foreach ($errors->all as $error)
                                            <p class="alert alert-danger alert-dismissible fade show">{{$error}} </p>
                                                
                                            @endforeach
                                        @endif --}}

                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <ul>
                                                @foreach ($errors->all() as $error)
                                                    <p style="font-style: italic">{{ $error }}<p>
                                                @endforeach
                                                </ul>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        @endif



                                <form method="post" action="{{ route('update.password') }}" >
                                             @csrf
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="password" name="oldpassword" id="oldpassword">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="password" name="newpassword" id="newpassword">
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="password" name="confirm_password" id="confirm_password">
                                            </div>
                                        </div>
                                        
                                        
   
                                        

                                        <!-- end row -->
                                        <input class="btn btn-info waves-effect waves-light" type="submit" name="submit" value = "Change Password">
                                    </div>
                                    
                            </form>
                                </div>
                            </div> <!-- end col -->
                 </div>


        
            </div>

            </div> <!-- end col -->
        </div>


        
     </div>






        
                   
            
@endsection