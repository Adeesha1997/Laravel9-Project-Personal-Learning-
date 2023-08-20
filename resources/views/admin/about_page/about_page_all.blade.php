@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-flud">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">About Page</h4>
                            <br>
                        <form method="POST" action="{{ route('update.about')}}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $aboutpage->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $aboutpage->title }}" id="title" name="title">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $aboutpage->short_title }}" id="short_title" name="short_title">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea required="" class="form-control" rows="5" name="short_description" id="short_description">
                                        {{ $aboutpage->short_description }}
                                    </textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Long Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="long_description" id="long_description">
                                        {{ $aboutpage->long_description }}
                                    </textarea>
                                </div>
                            </div>
                            <!-- end row -->

                               <!-- end row -->

                               <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">About Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="image" name="about_image">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" id="showImage" src="{{ (!empty($aboutpage->about_image))? url($aboutpage->about_image):url('upload/no_image.png')}} "
                                alt="Card image cap">
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">

                            </div>

                        </div>
                        <input type="submit" class="btn btn-success btn-rounded waves-effect waves-light" value="Update About Page" >
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
