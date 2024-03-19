@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                        <div class="main-content">

<div class="page-content">
    <div class="container-fluid">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Portfolio Page</h4>
                                <form method="post" action="{{ route('update.portfolio.data') }}" enctype="multipart/form-data">
                                             @csrf

                                             <input type="hidden" name="id" value="{{ $edit_portfolio->id }}">
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="portfolio_name" value="{{ $edit_portfolio->portfolio_name }}" id="example-text-input">
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Title</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="portfolio_title" value="{{ $edit_portfolio->portfolio_title }}" id="example-text-input">
                                            </div>
                                        </div>

                                        

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Description</label>
                                            <div class="col-sm-10">
                                                <textarea required="" type="text" class="form-control"  name="portfolio_description" rows="5">
                                                    {{ $edit_portfolio->portfolio_description }}
                                                </textarea>
                                            </div>
                                        </div>

                                       

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Image</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" name="portfolio_image" id="image" >
                                            </div>
                                        </div>
                                        

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <img id="showImage" class="rounded avatar-lg" alt="200x200" src="{{ asset($edit_portfolio->portfolio_image) }}" data-holder-rendered="true">
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <input class="btn btn-info waves-effect waves-light" type="submit" name="submit" value = "Update Portfolio Data">
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