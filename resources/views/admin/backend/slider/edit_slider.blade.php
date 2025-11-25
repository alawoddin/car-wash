@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid my-0">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Add Slider</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">

                        <li class="breadcrumb-item active">Add Slider</li>
                    </ol>
                </div>
            </div>

            <!-- Form Validation -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Add Slider</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <form action="{{ route('update.slider') }}" method="POST" enctype="multipart/form-data"
                                class="row g-3">
                                @csrf

                                <input type="hidden" name="id" value="{{$slider->id}}">
                                <div class="col-md-6">
                                    <label for="validationDefault01" class="form-label">Title</label>
                                    <input type="text" class="form-control" value="{{$slider->title}}" name="title">
                                </div>
                                <div class="col-md-6">
                                    <label for="validationDefault02" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" rows="3">{{$slider->description}}</textarea>
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
