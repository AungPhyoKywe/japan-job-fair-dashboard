
@extends('backend.master.partials.master_admin')


<!-- Main Content -->

@section('contents')

    @include('backend.master.partials.nav')


    <div class="container-fluid">

    @include('backend.shared.error')

            <section class="content-header">
                <!-- begin breadcrumb -->
                <ol class="breadcrumb pull-right">
                    <li><a href="javascript:;">Home</a></li>
                    <li><a href="{{ route('users.index') }}">User</a></li>
                    <li class="active">User</li>
                </ol>
                <!-- end breadcrumb -->

                <h4 class="bold">Create New User <small> </small></h4>

                <div id="footer" class="footer" style="margin-left: 5px"></div>
            </section> <!-- end section content-header -->

            <section class="content">
                <!-- start content panel -->
                <div class="panel panel-inverse">

                    <!-- start content heading panel -->
                    <div class="panel-heading">

                    </div>
                    <!-- end content heading panel -->

                    <!-- start content body panel -->
                    <div class="panel-body">


                    <!-- start form -->
                        <form name="usersForm" id="usersForm" method="POST" action="{{ route('users.store') }}" data-parsley-validate="true">
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
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        <input type="text"
                                               name="email"
                                               value="{{ old('email') }}"
                                               placeholder="Email"
                                               class="form-control"
                                               data-parsley-required="true"
                                               data-parsley-maxlength="255"
                                               data-parsley-type="email"/>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Password:</strong>
                                        <input type="password"
                                               id="password"
                                               name="password"
                                               value="{{ old('password') }}"
                                               placeholder="Password"
                                               class="form-control"
                                               data-parsley-required="true"
                                               data-parsley-maxlength="255"
                                        />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Confirm Password:</strong>
                                        <input type="password"
                                               id="confirm-password"
                                               name="confirm-password"
                                               value="{{ old('password') }}"
                                               placeholder="Confirm Password"
                                               class="form-control"
                                               data-parsley-required="true"
                                               data-parsley-maxlength="255"
                                               data-parsley-equalto="#password"/>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Country:</strong>
                                        <select name="country_id"
                                                class="form-control"
                                                data-parsley-required="true">
                                        @if(count($countries)>0)
                                            @foreach($countries as $key => $value)
                                                <option value="{{ $key }}">{{$value}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Mail Password:</strong>
                                        <input type="password"
                                               id="mail_password"
                                               name="mail_password"
                                               value="{{ old('mail_password') }}"
                                               placeholder="Mail Password"
                                               class="form-control"
                                               data-parsley-required="true"data-parsley-maxlength="255"/>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <strong>Mail Subject:</strong>
                                        <input type="text"
                                               id="mail_subject"
                                               name="mail_subject"
                                               value="{{ old('mail_subject') }}"
                                               placeholder="Subject"
                                               class="form-control"
                                               data-parsley-required="true"
                                        />
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Mail Body:</strong>
                                        <textarea type="text"
                                                  id="mail_body"
                                                  name="mail_body"
                                                  class="form-control"
                                                  data-parsley-required="true"
                                                  rows="8"
                                        >
                                        </textarea>
                                    </div>
                                </div>

                                <div class="">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-left">
                                        </div>
                                        <div class="pull-right">
                                            <a class="btn btn-warning" href="{{ route('users.index') }}"> Back to Listing</a>
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end form -->
                    </div>
                    <!-- end content body panel -->
                </div>
                <!-- end content panel -->
            </section>

        </div>


@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.1/parsley.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.1/parsley.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {

            $('#usersForm').parsley();
            $('#usersForm').preventDoubleSubmission();

        } );

        //End Document Ready

    </script>
    @stop


<!-- /.container-fluid -->


