@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
                        <div class="main-content">

  


<div class="page-content">
    <div class="container-fluid">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Add Blog Category Page</h4>
                                <form method="post" action="{{ route('store.category') }}" id="myForm">
                                             @csrf

                                             {{-- <input type="hidden" name="id" value="{{ $portfolio->id }}"> --}}
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                                            <div class="form-group col-sm-10">
                                                <input class="form-control" type="text" name="blog_category"  id="example-text-input">
                                               
                                            </div>
                                        </div>
                                      
                                        <!-- end row -->
                                        <input class="btn btn-info waves-effect waves-light" type="submit" name="submit" value = "Add Blog Category">
                                    </div>
                                    
                            </form>
                                </div>
                            </div> <!-- end col -->
                 </div>


        
            </div>

            </div> <!-- end col -->
        </div>


        
     </div>



 <script type="text/javascript">
    
    $(document).ready(function(){
        $('#myForm').validate({
            rules: {
                blog_category: {
                    required: true,
                },
            },
            messages: {
                blog_category: {
                    required : 'Please Enter Blog Category',
                },
            },
            errorElement : 'span',
            errorPlacement : function (error, element){
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            hightlight : function(element,errorClass,validClass){
                 $(element).addClass('is-invalid');
            },
            unhightlight : function(element,errorClass,validClass){
                 $(element).removeClass('is-invalid');
            },

        })
    })

</script>


        
                   
            
@endsection