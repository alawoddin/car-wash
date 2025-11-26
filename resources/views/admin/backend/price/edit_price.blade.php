@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid my-0">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Edit Price</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">

                        <li class="breadcrumb-item active">Edit Price</li>
                    </ol>
                </div>
            </div>

            <!-- Form Validation -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Edit Price</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <form action="{{ route('update.price') }}" method="POST" id="myForm" enctype="multipart/form-data"
                                class="row g-3">
                                @csrf
                                <input type="hidden" name="id" value="{{$price->id}}">
                                <div class="form-group col-md-6">
                                    <label for="validationDefault01" class="form-label">Icon</label>
                                    <input type="text" class="form-control" name="icon" value="{{$price->icon}}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="validationDefault01" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{$price->title}}">
                                </div>

                                 <div class="form-group col-md-6">
                                    <label for="validationDefault01" class="form-label">description</label>
                                    <input type="text" class="form-control" name="description" value="{{$price->description}}">
                                </div>

                                 <div class="form-group col-md-6">
                                    <label for="validationDefault01" class="form-label">Price</label>
                                    <input type="number" class="form-control" name="price" value="{{$price->price}}">
                                </div>
                               

                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Save Change</button>
                                </div>
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->


            </div>



        </div> <!-- container-fluid -->

    </div>


@endsection
