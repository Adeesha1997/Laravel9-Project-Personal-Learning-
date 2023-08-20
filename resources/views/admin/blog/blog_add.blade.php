@extends('admin.admin_master')
@section('admin')


<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    }
</style>

    <div class="page-content">
        <div class="container-flud">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Blog Page</h4>
                            <br>
                        <form method="POST" action="{{ route('store.blog')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category</label>
                                <div class="col-sm-10">
                                    <select name="blog_category_id" class="form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>
                                        @foreach ($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->blog_category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text"  id="blog_title" name="blog_title">
                                    @error('blog_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="image" name="blog_image">
                                </div>

                            </div>
                            <!-- end row -->

                            <div class="row mb-3">

                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>

                                <div class="col-sm-10 mb-3">
                                    <img class="rounded avatar-lg" id="showImage" src="{{ url('upload/no_image.png')}} "
                                alt="Card image cap">
                                @error('blog_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Tags</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text"  id="blog_tags" name="blog_tags" value="home,tech" data-role="tagsinput">
                                    @error('blog_tags')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="blog_description" id="blog_description">

                                    </textarea>
                                    @error('blog_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <!-- end row -->




                            <div class="row mb-3">

                            </div>

                        </div>
                        <input type="submit" class="btn btn-success btn-rounded waves-effect waves-light" value="Insert Blog Page" >
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
