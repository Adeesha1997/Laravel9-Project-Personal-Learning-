@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-flud">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Blog Category Page</h4>
                            <br>
                        <form method="POST" action="{{ route('update.blog.category', $blogcategory->id)}}">
                            @csrf



                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text"  id="blog_category" name="blog_category" value="{{ $blogcategory->blog_category }}">
                                    @error('blog_category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->



                            <div class="row mb-3">

                            </div>
                            <input type="submit" class="btn btn-success btn-rounded waves-effect waves-light" value="Updated Blog Category Page" >
                        </div>

                    </form>
                    </div>
                </div> <!-- end col -->






            </div>
    </div>
</div>

@endsection
