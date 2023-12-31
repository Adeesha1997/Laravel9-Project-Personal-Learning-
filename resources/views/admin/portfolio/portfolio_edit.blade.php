@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-flud">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Portfolio Edit Page</h4>
                            <br>
                            <form method="POST" action="{{ route('update.portfolio') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value={{ $portfolio->id }}>


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="portfolio_name"
                                            value="{{ $portfolio->portfolio_name }}" name="portfolio_name">
                                        @error('portfolio_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="portfolio_title"
                                            value="{{ $portfolio->portfolio_title }}" name="portfolio_title">
                                        @error('portfolio_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio
                                        Description</label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="portfolio_description" id="portfolio_description">
                                        {!! $portfolio->portfolio_description !!}
                                    </textarea>
                                        @error('portfolio_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="image" name="portfolio_image">
                                    </div>

                                </div>
                                <!-- end row -->

                                <div class="row mb-3">

                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>

                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" id="showImage"
                                            src="{{ asset($portfolio->portfolio_image) }} " alt="Card image cap">
                                        @error('portfolio_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <!-- end row -->
                                    <div class="row mb-3">

                                    </div>

                                </div>
                                <input type="submit" class="btn btn-success btn-rounded waves-effect waves-light"
                                    value="Update Portfolio Page">
                            </form>
                        </div>
                    </div> <!-- end col -->






                </div>
            </div>
        </div>
        <!-- Priview Selected Image Using JQueary -->
        <script>
            $(document).ready(function() {
                $('#image').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>
    @endsection
