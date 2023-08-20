@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-flud">

            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Profile Page</h4>
                            <br>
                        <form method="POST" action="{{ route('store.profile')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $editData->name }}" id="name" name="name">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">User Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" value="{{ $editData->email }}" id="email" name="email">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">User Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $editData->username }}" id="username" name="username">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="image" name="profile_image">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" id="showImage" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.png')}} "
                                alt="Card image cap">
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">

                            </div>

                        </div>
                        <input type="submit" class="btn btn-success btn-rounded waves-effect waves-light" value="Update Profile" >
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
