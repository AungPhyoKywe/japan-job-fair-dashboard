@extends('backend.master.partials.master_admin')


<!-- Main Content -->

@section('contents')

    @include('backend.master.partials.nav')


    <div class="content-wrapper">
        <div class="container-fluid">
        <section class="content-header">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb pull-right">
                <li><a href="javascript:;">Home</a></li>
                <li><a href="{{ route('country.index') }}">Country</a></li>
                <li class="active">Country</li>
            </ol>
            <!-- end breadcrumb -->

           <h4 class="bold">Create New Country <small> </small></h4>

            <div id="footer" class="footer" style="margin-left: 5px"></div>
        </section>
        </div><!-- end section content-header -->
    <div class="container-fluid">
        <div class="container-fluid">
        <section class="content">
            <!-- start content panel -->
            <div class="panel panel-inverse">

                <!-- start content heading panel -->
                <div class="panel-heading">

                </div>
                <!-- end content heading panel -->

                <!-- start content body panel -->

                <div class="shadow-sm">
                    <div class="container">
                <div class="panel-body">

                <!-- start form -->
                    <form name="countryForm" id="countryForm" method="POST" action="{{ route('country.store') }}" data-parsley-validate="true" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>Name:</strong>
                                    <input type="text"
                                           name="name"
                                           value="{{ old('name') }}"
                                           placeholder="Name"
                                           class="form-control"
                                           data-parsley-required="true"
                                           data-parsley-maxlength="255"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>Code:</strong>
                                    <input type="text"
                                           name="code"
                                           value="{{ old('code') }}"
                                           placeholder="Code"
                                           class="form-control"
                                           data-parsley-required="true"
                                           data-parsley-maxlength="255"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <strong>Country URL:</strong>
                                    <input type="text"
                                           name="country_url"
                                           value="{{ old('country_url') }}"
                                           placeholder="Frontend URL"
                                           class="form-control"
                                           data-parsley-required="true"
                                           data-parsley-maxlength="255"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Image:</strong>
                                    <div style="height:0px;overflow:hidden;"><input type="file" name="image" value="" id="jumbo_image" accept="image/jpg,image/jpeg,image/png" data-parsley-required="true"  data-parsley-errors-container= '#imgErr'/></div>
                                    <button class="btn btn-primary" style="opacity: 0.7; position: absolute;"data-placement="left" data-toggle="tooltip" title="Upload new image"onclick="document.getElementById('file-input').click();"><i class="far fa-upload"></i></button>
                                    <img id="jumbo_image_preview" style="border:1px solid lightgray; width: 200px; height: 200px;" src="/img/aa.jpg" alt="image preview" class="img-responsive">

                                    <input id="file-input" type="file" name="name" style="display: none;" />
                                    <span id="imgErr" class='parsley-errors-list filled'></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-warning" href="{{ route('country.index') }}"> Back to Listing</a>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                            </div>
                        </div>

                    </form>
                    <!-- end form -->
                    <br><br>
                </div>
                <!-- end content body panel -->
            </div>
            </div>
            </div>
            <!-- end content panel -->
        </section>
            <!-- end section .content -->
    </div>
    </div>
    </div>
    <!-- end div.wrapper -->
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.1/parsley.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.1/parsley.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {

            $('#countryForm').parsley();
            $('#countryForm').preventDoubleSubmission();

        } );

        $('#jumbo_image').change(function () {

            if(check_extension(this)){
                check_dimension(this,'#jumbo_image_preview','#image');

            }else{
                $('#jumbo_image').val('');
                $('#jumbo_image_preview').attr('src','/img/image_user_dp_default.png');

            }
        });

        function check_dimension(obj,logo_preview,file_name)
        {

            var _URL = window.URL || window.webkitURL;
            var ret  ={'width':0,'height':0};
            if ((file = obj.files[0])) {
                img = new Image();
                img.onload = function () {
                    console.log(this.width,this.height);

                    imageUploadPreview(obj, logo_preview);
                };

                img.src = _URL.createObjectURL(file);

            }
        }


        //End Document Ready

    </script>
@stop

