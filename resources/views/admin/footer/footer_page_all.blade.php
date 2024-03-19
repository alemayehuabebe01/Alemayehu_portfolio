@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                        <div class="main-content">

<div class="page-content">
    <div class="container-fluid">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Footer Page</h4>
                                <form method="post" action="{{ route('update.footer') }}">
                                             @csrf

                                             <input type="hidden" name="id" value="{{ $allfooter->id }}">
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Phone Number</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="number" value="{{ $allfooter->number }}" id="example-text-input">
                                            </div>
                                        </div>
                                        
                                        

                                        

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                                            <div class="col-sm-10">
                                                <textarea required="" type="text" class="form-control"  name="short_description" rows="5">
                                                    {{ $allfooter->short_description }}
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="adress" value="{{ $allfooter->adress }}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="email" value="{{ $allfooter->email }}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="facebook" value="{{ $allfooter->facebook }}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">linkedIn</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="linkedin" value="{{ $allfooter->linkedin }}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Copy right</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="copyright" value="{{ $allfooter->copyright }}" id="example-text-input">
                                            </div>
                                        </div>

                                     

                                        

                                
                                        <!-- end row -->
                                        <input class="btn btn-info waves-effect waves-light" type="submit" name="submit" value = "Update Footer Page">
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