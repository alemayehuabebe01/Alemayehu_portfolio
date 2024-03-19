@extends('admin.admin_master')
@section('admin')


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All Blog Category</h4>

                        <div class="page-title-right">
                            <ol class="m-0 breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Blog</a></li>
                                <li class="breadcrumb-item active">All Category</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                           

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Blog Category</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                    
                                </tr>
                                </thead>


                                <tbody>
                                    
                                    @foreach ($blogcategory as $key => $item)
                                   
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->blog_category }} </td>
                                    <td>{{ $item->created_at }}</td>
                                    {{-- <td><img src="{{ asset($item->portfolio_image) }}" style="width: 60px; hight:50px;"></td>
                                    <td>{!! $item->portfolio_description !!}</td> --}}

                                    <td>
                                <a href="{{ route('edit.blog',$item->id) }}" class="btn btn-info sm" title="Edit blog category Data"> <i class="fas fa-edit"></i> </a>
                                <a href="{{ route('delete.blog.data',$item->id) }}" id="delete" class="btn btn-danger sm" title="Delete blog category Data"> <i class="fas fa-trash-alt"></i> </a>

                                    </td>
                                   
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

           
            
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    
    
</div>
<!-- end main content-->

@endsection