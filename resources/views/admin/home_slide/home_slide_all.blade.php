@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-flud">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Home Slide Page</h4>
                            <br>
                        <form method="POST" action="{{ route('update.slider')}}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $homeSlide->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $homeSlide->title }}" id="title" name="title">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $homeSlide->short_title }}" id="short_title" name="short_title">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Vedio URL</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $homeSlide->vedio_url }}" id="vedio_url" name="vedio_url">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Slide Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="image" name="home_slide">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" id="showImage" src="{{ (!empty($homeSlide->home_slide))? url($homeSlide->home_slide):url('upload/no_image.png')}} "
                                alt="Card image cap">
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">

                            </div>

                        </div>
                        <input type="submit" class="btn btn-success btn-rounded waves-effect waves-light" value="Update Slide" >
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
