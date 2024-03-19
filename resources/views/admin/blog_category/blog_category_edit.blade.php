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
                                <form method="post" action="{{ route('update.blog.data',$edit_blog_category->id) }}" >
                                             @csrf

                                             {{-- <input type="hidden" name="id" value="{{ $edit_blog_category->id }}"> --}}
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" name="blog_category" value="{{ $edit_blog_category->blog_category }}" id="example-text-input">
                                            </div>
                                        </div>
                                   
                                        <!-- end row -->
                                        <input class="btn btn-info waves-effect waves-light" type="submit" name="submit" value = "Update Blog Category Data">
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