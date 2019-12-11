
    @extends('backend.master.partials.master_admin')


        <!-- Main Content -->

    @section('contents')

        @include('backend.master.partials.nav')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <form method="post"action="{{route('cv_report.search')}}"id="search-form">
                {{csrf_field()}}
                <input type="hidden" name="action_type" id="action_type">
                <div class="container">

                    <div class="row">

                        <div class="col-3">
                            <label>Apply For</label>
                            <select class="form-control box" name="applyfor"id="exampleFormControlSelect1">
                                <option>All</option>
                                <option>CAD Engineer</option>
                                <option>Carrer Seminar</option>
                                <option>IT Engineer</option>
                                <option>CAD Junior14</option>
                                <option>CAD Middle14</option>
                                <option>IT Engineer</option>
                            </select>
                                <label for="from_date">From Date</label>
                                <div class="input-group date dateTimePicker" data-provide="datepicker" id="datepicker_from">
                                    <input type="text" class="form-control" id="from_date" name="from_date" value="{{isset($from_date)? $from_date : ''}}">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar" readonly></span>

                                    </div>
                                </div>

                            <button type="button"class="btn btn-primary input-group"id="btnSearch">Show</button>

                        </div>

                        <div class="col-3">
                            <label>Gender</label>
                            <select class="form-control box" name="gender"id="exampleFormControlSelect1">
                                <option>All</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                            <label>To Date</label>
                            <div class="input-group date dateTimePicker" data-provide="datepicker" id="datepicker_from">
                                <input type="text" class="form-control" id="from_date" name="from_date" value="{{isset($from_date)? $from_date : ''}}">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar" readonly></span>

                                </div>
                            </div>

                            <button type="button"class="btn btn-primary input-group"id="btnexport">Excel Export</button>
                        </div>

                        <div class="col-3">
                            <label>Japanese Skill</label>
                            <select class="form-control box" name="jpskill" id="exampleFormControlSelect1">
                                <option>All</option>
                                <option>No Japanese Skill</option>
                                <option>Fluent:(JLPT N1)</option>
                                <option>Business:(JLPT N2)</option>
                                <option>Daily Conversation:(JLPT N3)</option>
                                <option>Basic Conversation:(JLPT N4)</option>
                                <option>Minimun Conversation:(JLPT N5)</option>
                            </select>
                            <label>Approve</label>
                            <select class="form-control box1" name="approve" id="exampleFormControlSelect1">
                                <option>All</option>
                                <option>Approve</option>
                                <option>UnApprove</option>
                            </select>
                            <button type="button" class="btn btn-primary input-group"id="btndownload">Download CV Form</button>

                        </div>
                    </div>
                </div>
            </form>

            <div class="container">
                <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                    <thead>
                    <tr class="info">
                        <th>Apply For</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Approve</th>
                        <th>Batch</th>
                        <th>D.O.B</th>
                        <th>Gender</th>
                        <th>Nationality</th>
                        <th>Current Country</th>
                        <th>English Skill</th>
                        <th>Japanese Skill</th>
                        <th>CV</th>
                        <th>Upload at</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                </table>
            </div>
            </div>
            <div id="deleteAction"></div>
            <!-- end Div to put Delete Form based on Single Delete, Multi Delete or All Delete -->

            <!-- begin delete action template -->

            <!-- end delete action template -->

            <!-- begin datatable action column template -->
            <script id="datatableActionTemplate" type="text/html">
                <a class="btn btn-primary btn-icon btn-circle" href="cvreport/{id}">
                    <i class="fa fa-edit"></i>
                </a>&nbsp;
            </script>
       @endsection

    @section('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/js/bootstrap-datepicker.min.js"></script>

        <script type="text/javascript">


            $(document).ready(function() {
                $('#datepicker_from').datepicker({
                    format: 'dd-mm-yyyy',
                    autoclose: true,
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    allowInputToggle: true,
                });
                //
                $('#datepicker_to').datepicker({
                    format: 'dd-mm-yyyy',
                    autoclose: true,
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    allowInputToggle: true,
                    minDate: new Date(),

                });

                var datatableActionTemplate = $("#datatableActionTemplate").html();

                //Begin Datatable
                var table = $('#data-table').DataTable( {

                    dom:            "Bfrtip",
                    language: {
                        paginate: {
                            next: '<span class="glyphicon glyphicon-menu-right"></span>',
                            previous: '<span class="glyphicon glyphicon-menu-left"></span>'
                        }
                    },
                    "processing": true,
                    "serverSide": true,
                    "responsive": true,
                    "searching": false,
                    "ajax": {
                        url: 'cvreport/get-data/datatable',

                    },
                    buttons:[
                        {
                            extend: 'colvis',
                            text: window.colvisButtonTrans,
                            exportOptions: {
                                columns: ':visible'
                            }
                        }
                    ],

                    scrollY:        true,
                    scrollX:        true,
                    scrollCollapse: true,
                    lengthMenu: [
                        [ 10, 25, 50, -1 ],
                        [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                    ],
                    fixedColumns:   {
                        leftColumns: 2
                    },
                    fixedHeader: {
                        header: true,
                        headerOffset: $('#header').height()
                    },

                    "columns": [

                        { data: "apply_for"},
                        { data: "name" },
                        { data: "email" },
                        { data: "phone" },
                        { data: "approve"},
                        { data: "batch"},
                        { data: "DOB" },
                        { data: "gender" },
                        { data: "nationality" },
                        { data: "current_country"},
                        { data: "english_skill"},
                        { data: "japanese_skill"},
                        { data: "cv"},
                        { data: "upload_at"},

                    ],
                    "columnDefs": [

                        {
                            "render": function ( data, type, row ) {

                                if(data !=''){
                                    console.log(row.id);

                                    var val ='<a target="_blank" href="/cvreport/get-data/download/'+row.id+'">'+data+'</a>';
                                    return val;
                                }
                                return null;


                            },
                            "searchable": false,
                            "orderable": true,
                            "targets":12,
                        },
                        {

                            "render": function ( data, type, row ) {

                                return "<a class=\"btn btn-primary btn-icon btn-circle\" href=\"cvreport/{id}\">\n" +
                                    "                    <i class=\"fa fa-edit\"></i>\n" +
                                    "                </a>&nbsp;";
                            },
                            "searchable": false,
                            "orderable": false,
                            "targets":14,
                        }

                    ],


                } );


                //End Datatable

                //Search
                $('#btnSearch').on('click', function(e) {
                    table.draw();
                    e.preventDefault();
                });

                $('#btnexport').on('click', function(e) {

                    $('#action_type').val('export');
                    $('#search-form').submit();
                });

                $('#btndownload').on('click', function(e) {

                    $('#action_type').val('download');
                    $('#search-form').submit();
                });



            } );
            //End Document Ready

            disableAjaxButton($("#btnSearch"));


        </script>

    @stop

    <!-- /.container-fluid -->


