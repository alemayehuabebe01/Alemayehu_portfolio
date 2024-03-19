@extends('admin.admin_master')
@section('admin')


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All Portfolio</h4>

                        <div class="page-title-right">
                            <ol class="m-0 breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Image</a></li>
                                <li class="breadcrumb-item active">Portfolio All Data</li>
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
                                    <th>Portfolio Name</th>
                                    <th>Portfolio Title</th>
                                    <th>Portfolio Image</th>
                                    <th>Portfolio Description</th>
                                    <th>Action</th>
                                    
                                </tr>
                                </thead>


                                <tbody>
                                    @php($i = 1)
                                    @foreach ($portfolio as $item)
                                   
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->portfolio_name }} </td>
                                    <td>{{ $item->portfolio_title }}</td>
                                    <td><img src="{{ asset($item->portfolio_image) }}" style="width: 60px; hight:50px;"></td>
                                    <td>{!! $item->portfolio_description !!}</td>

                                    <td>
                                <a href="{{ route('edit.portfolio.data',$item->id) }}" class="btn btn-info sm" title="Edit portfolio Data"> <i class="fas fa-edit"></i> </a>
                                <a href="{{ route('delete.portfolio.data',$item->id) }}" id="delete" class="btn btn-danger sm" title="Delete Data"> <i class="fas fa-trash-alt"></i> </a>

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