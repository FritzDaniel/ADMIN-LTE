@extends('admin.layouts.app')

@section('title')
    PVOT-Digital | Admin Dashboard
@endsection

@section('css')

@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="#">Design</a></li>
    <li class="breadcrumb-item active">Sub Design</li>
@endsection

@section('headerTitle')
    Sub Design {{ $master->designName }}
@endsection

@section('content')

    <div class="container-fluid">
        <a href="{{ route('admin.design') }}" class="btn btn-primary mb-3"><i class="fa fa-angle-left"></i> Back</a>
        <div class="row">
            <div class="col-12">
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $master->designName }} Design List</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('admin.subDesign.create',$master->id) }}" class="btn btn-primary">
                            <i class="fa fa-plus-circle"></i> Add Sub Design
                        </a>
                        <div class="dataTables_wrapper dt-bootstrap4">
                            <table id="datatable" class="table table-bordered table-hover dataTable dtr-inline">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Design Name</th>
                                    <th>Image</th>
                                    <th>Created Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($data->isEmpty())
                                    <tr>
                                        <td>No Data</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @else
                                    @foreach($data as $key => $dt)
                                        <tr>
                                            <td>{{ $key+1 }}.</td>
                                            <td>{{ $dt->designName }}</td>
                                            <td>
                                                <img src="{{ asset($dt->designImage) }}" alt="" style="width: 50px; height: 50px;">
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($dt->created_at)->format('d-m-Y H:i:s') }}</td>
                                            <td>
                                                <a href="#" class="btn btn-primary">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        Updated at {{ \Carbon\Carbon::now()->format('d-m-Y') }}
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script>
        $(function () {
            $('#datatable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>

@endsection
