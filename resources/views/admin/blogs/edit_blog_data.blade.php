@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
</style>
                        <div class="main-content">

<div class="page-content">
    <div class="container-fluid">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Edit Blog Page</h4>
                                <form method="post" action="{{ route('update.blog') }}" enctype="multipart/form-data">
                                             @csrf

                                             <input type="hidden" name="id" value="{{ $edit_blog->id }}">
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                                            <div class="col-sm-10">
                                                <select name="blog_category_id" class="form-select" aria-label="Default select example">
                                                    <option selected="">Select Category</option>
                                                    
                                                    @foreach ($categories as $item)

                                                    <option value="{{ $item->id }}" {{ $item->id == $edit_blog->blog_category_id ? 'selected' : '' }}>{{ $item->blog_category }}</option>

                                                    @endforeach 
                                                    </select>
                                                  
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Blogs Title</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="blog_title"  value="{{ $edit_blog->blog_title }}" id="example-text-input">
                                                
                                               
                                            </div>
                                        </div>

                                         
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Blogs Tags</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="blog_tags" value="{{ $edit_blog->blog_tags }}"  data-role="tagsinput">
                                                
                                            </div>
                                        </div>

                                        

                                        {{-- <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Description</label>
                                            <div class="col-sm-10">
                                                <textarea required="" type="text" class="form-control"  name="short_description" rows="5">
                                                    {{ $portfolio->portfolio_description }}
                                                </textarea>
                                            </div>
                                        </div> --}}

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Description</label>
                                            <div class="col-sm-10">
                                        
                                                <textarea id="elm1" name="blog_description"  >
                                                    {!! $edit_blog->blog_description !!}
                                                </textarea>

                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" name="blog_image" id="image" >

                                              
                                            </div>
                                        </div>
                                        

                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-10">
                                            <img id="showImage" class="rounded avatar-lg" alt="200x200" src="{{ asset($edit_blog->blog_image) }}"  data-holder-rendered="true">
                                            </div>
                                        </div>
                                        <!-- end row -->
                                        <input class="btn btn-info waves-effect waves-light" type="submit" name="submit" value = "Update Blog">
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