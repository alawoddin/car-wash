@extends('admin.admin_master')
@section('admin')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid my-0">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">All Price</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <a href="{{ route('add.price') }}" class="btn btn-secondary">Add Price</a>
                    </ol>
                </div>
            </div>

            <!-- Datatables  -->
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">

                        </div><!-- end card header -->

                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Icon</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allprice as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->icon }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->price }}</td>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.price', $item->id) }}"
                                                    class="btn btn-success btn-sm">Edit</a>

                                                <a href="{{ route('delete.price', $item->id) }}"
                                                    class="btn btn-danger btn-sm" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>




        </div> <!-- container-fluid -->

    </div> <!-- content -->
@endsection
