@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-flud">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Footer Page</h4>
                            <br>
                            <form method="POST" action="{{ route('update.footer') }}">
                                @csrf

                                <input type="hidden" name="id" value="{{ $allfooter->id }}">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Phone Number</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ $allfooter->number }}"
                                            id="number" name="number">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                                    <div class="col-sm-10">
                                        <textarea required="" class="form-control" rows="5" name="short_description" id="short_description">
                                        {{ $allfooter->short_description }}
                                    </textarea>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ $allfooter->address }}"
                                            id="address" name="address">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">E-mail</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ $allfooter->email }}"
                                            id="email" name="email">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Facebook</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ $allfooter->facebook }}"
                                            id="facebook" name="facebook">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Twitter</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ $allfooter->twitter }}"
                                            id="twitter" name="twitter">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Copyright</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" value="{{ $allfooter->copyright }}"
                                            id="copyright" name="copyright">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                </div>
                                <input type="submit" class="btn btn-success btn-rounded waves-effect waves-light"
                                value="Update Footer Page">
                        </div>

                        </form>
                    </div>
                </div> <!-- end col -->






            </div>
        </div>
    </div>
@endsection
