
    @extends('backend.master.partials.master_admin')


<!-- Main Content -->

    @section('contents')

    @include('backend.master.partials.nav')


        <div class="container-fluid">
            @if(session()->has('success'))
            <div  id="alert" class="alert alert-success"role="alert">

                {{session()->get('success')}}

            </div>
            @endif
            <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New User</a><br>
        </div>
        <br>
        <div class="container card shadow-sm">
            <br>
            <form method="post"role="form" class="form-inline"id="search-form">

                <div class="form-group mb-2">
                    <label for="ex1">Name:</label>
                    <input class="form-control" name="name" id="myInput" onkeyup="myFunction()" type="text">
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    <label for="ex2">Email:</label>
                    <input class="form-control" name="email" id="ex2" onkeyup="mailFilter()" type="text">
                </div>



            </form>


    <div class="container">
        <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
            <thead>
            <tr class="info">
                <th>Name</th>
                <th>Email</th>
                <th>Country</th>
                <th>Action</th>
            </tr>
            </thead>

        </table>
    </div>
            <br><br>
        </div>

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
                    url: '/users/get-data/datatable',

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


                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'country_name', name:'countries.name' },
                    { data: 'id', name: '' },


                ],
                "columnDefs": [

                    {

                        "render": function (data, type, row) {

                            return "<a class='btn btn-success' href='users/"+data+"/edit'>\n" +
                                "<i class='fa fa-edit'></i>\n" +
                                "<a  class=\"btn btn-danger\" href=\"#\"onclick='deleteData("+data+")'>\n" +
                                "\t\t\t<i class=\"fa fa-trash\"></i>\n" +
                                "\t\t</a>&nbsp;";
                        },
                        "searchable": false,
                        "orderable": true,
                        "targets": 3,

                    }
                ]}

            );


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
        $('#search-form').on('submit', function(e) {
            table.draw();
            e.preventDefault();
        });
        //End Document Ready

        disableAjaxButton($("#btnSearch"));


        function deleteData($id){
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: [
                    'No, cancel it!',
                    'Yes, I am sure!'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {

                            swal({
                                title: 'Shortlisted!',
                                text: 'Candidates are successfully shortlisted!',
                                icon: 'success'
                            }).then(function () {
                                window.location.href='/users/destroy/'+$id

                            })


                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            })
        }

    </script>
    <script>

        setTimeout( function ( ) {

            $(".alert").hide("20");

        }, 1000 );

        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("data-table");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        function mailFilter() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("ex2");
            filter = input.value.toUpperCase();
            table = document.getElementById("data-table");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

    </script>

@stop

<!-- /.container-fluid -->


