@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-flud">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Blog Category Page</h4>
                            <br>
                        <form method="POST" id="myForm" action="{{ route('store.blog.category')}}">
                            @csrf



                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" type="text"  id="blog_category" name="blog_category">

                                </div>
                            </div>
                            <!-- end row -->



                            <div class="row mb-3">

                            </div>
                            <input type="submit" class="btn btn-success btn-rounded waves-effect waves-light" value="Insert Blog Category Page" >
                        </div>

                    </form>
                    </div>
                </div> <!-- end col -->






            </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function()
    {
        $('#myForm').validate({
            rules:{
                blog_category:{
                    required :true,
                },
            },
            messages:{
                blog_category:{
                    required :'Please Enter Valid Blog Categry Name',
                },
            },
            errorElement : 'span',
            errorPlacement : function (error,element)
            {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass)
            {
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass)
            {
                $(element).removeClass('is-invalid');
            },
        })
    })
</script>

@endsection
