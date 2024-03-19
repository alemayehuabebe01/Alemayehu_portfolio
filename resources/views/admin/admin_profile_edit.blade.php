@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                        <div class="main-content">

<div class="page-content">
    <div class="container-fluid">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Edit Profile</h4>
                                <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                                             @csrf
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="name" value="{{ $editData->name }}" id="example-text-input">
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="username" value="{{ $editData->username }}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="email" value="{{ $editData->email }}" id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Profile Photo</label>
                                            <div class="col-sm-10">
                                                <input id="image" class="form-control" type="file" name="profile_image" >
                                            </div>
                                        </div>
                                        

                                        <div class="row mb-3">
                                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <img id="showImage" class="rounded avatar-lg" alt="200x200" src="{{ (!empty($editData->profile_image))? url('Upload/admin_images/'.$editData->profile_image):url('Upload/no_image.jpg') }}" data-holder-rendered="true">
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <input class="btn btn-info waves-effect waves-light" type="submit" name="submit" value = "Update Profile">
                                    </div>
                                    
                            </form>
                                </div>
                            </div> <!-- end col -->
                 </div>


        
            </div>

            </div> <!-- end col -->
        </div>


        
     </div>

<!-- <script type ="text/javascript">
        
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = now FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

</script>  -->


<script type="text/javascript">
$(document).ready(function() {
    $('#image').change(function(e) {
        var reader = new FileReader();

        // Error handling: Check if a file is selected
        if (e.target.files.length === 0) {
            // Handle the case where no file is selected (e.g., display an error message)
            console.warn("No file selected.");
            return;
        }

        reader.onload = function(e) {
            $('#showImage').attr('src', e.target.result);
        };

        reader.readAsDataURL(e.target.files[0]);
    });
});
</script>


        
                   
            
@endsection