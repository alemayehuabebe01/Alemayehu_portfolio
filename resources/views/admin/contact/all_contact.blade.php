@extends('admin.admin_master')
@section('admin')



<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All Messages</h4>

                        <div class="page-title-right">
                            <ol class="m-0 breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Messages</a></li>
                                <li class="breadcrumb-item active">All Contact Message</li>
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
                                    <th>NO</th>
                                    <th>Sender Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    {{-- <th>Blog Description</th> --}}
                                    <th>Phone</th>
                                    <th>Message Content</th>
                                    <th>Date At</th>
                                    <th>Action</th>
                                    
                                </tr>
                                </thead>


                                <tbody>
                                    @php($i = 1)
                                    @foreach ($messages as $mes)
                                   
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $mes->name }} </td>
                                    
                                    <td>{{ $mes->email }} </td>
                                    <td>{{ $mes->subject }}</td>
                                    <td>{{ $mes->phone }}</td>
                                    <td>{{ $mes->message }}</td>
                                    {{-- <td>{!! $item->blog_description !!}</td> --}}
                                    <td>{{ Carbon\Carbon::parse($mes->created_at)->diffForHumans() }}</td>
                                    <td>
                               
                                <a href="{{ route('delete.message',$mes->id) }}" id="delete" class="btn btn-danger sm" title="Delete Message"> <i class="fas fa-trash-alt"></i> </a>

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