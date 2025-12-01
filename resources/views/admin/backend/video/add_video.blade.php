@extends('admin.admin_master')
@section('admin')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid my-0">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Add Video</h4>
                </div>

                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">

                        <li class="breadcrumb-item active">Add Video</li>
                    </ol>
                </div>
            </div>

            <!-- Form Validation -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Add Office</h5>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <form  action="{{ route('store.video') }}" method="POST" enctype="multipart/form-data" id="myForm"
                                class="row g-3">
                                @csrf

                                <div class="form-group col-md-6">
                                    <label  for="validationDefault01" class="form-label">title</label>
                                    <input   type="text" class="form-control" name="title">
                                </div>

                                  <div class="col-md-6">
                                    <label for="validationDefault02" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" rows="3"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="validationDefault02" class="form-label"> Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="validationDefault02" class="form-label"> </label>
                                    <img id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                        class="rounded-circle avatar-xl img-thumbnail float-start" alt="image profile">
                                </div>

                                 <div class="form-group col-md-6">
                                    <label  for="validationDefault01" class="form-label">Link</label>
                                    <input   type="text" class="form-control" name="link">
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




    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>

    <script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                title: {
                    required : true,
                },
                description: {
                    required : true,
                },
                
            },
            messages :{
                title: {
                    required : 'Please Enter title',
                },
                description: {
                    required : 'Please Enter description',
                },
                
                 

            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>


@endsection
