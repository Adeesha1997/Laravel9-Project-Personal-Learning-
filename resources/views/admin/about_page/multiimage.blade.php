@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-flud">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Multi Image</h4>
                            <br>
                        <form method="POST" action="{{ route('store.multi.image')}}" enctype="multipart/form-data">
                            @csrf


                               <!-- end row -->

                               <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">About Multi Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="image" name="multi_image[]" multiple="">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" id="showImage" src="{{ url('upload/no_image.png')}} "
                                alt="Card image cap">
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">

                            </div>

                        </div>
                        <input type="submit" class="btn btn-success btn-rounded waves-effect waves-light" value="Add Multi Image" >
                    </form>
                    </div>
                </div> <!-- end col -->






            </div>
    </div>
</div>
<!-- Priview Selected Image Using JQueary -->
<script>
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
                reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
