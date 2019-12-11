
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
        <a href="{{ route('country.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New Country</a><br>
    </div>
    <br>
    <div class="container card shadow-sm">
        <br>
        <form method="post"role="form" class="form-inline"id="search-form">

            <div class="form-group mb-2">
                <label for="ex1">Name:</label>
                <input class="form-control" name="name" id="myInput" onkeyup="myFunction()" type="text">
            </div>




        </form>


        <div class="container">
            <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                <thead>
                <tr class="info">
                    <th>ID</th>
                    <th>Name</th>
                    <th>CODE</th>
                    <th>Fontend Url</th>
                    <th>Action</th>
                </tr>
                </thead>

            </table>
        </div>
        <br><br>
    </div>

@endsection

@section('js')
    <script>

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
                url: '/country/get-data/datatable',

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
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'code', name: 'code'},
                { data: 'country_url', name: 'country_url'},
                { data: 'id', name: '' },

            ],
            "columnDefs": [

                {

                    "render": function (data, type, row) {

                        return "<a class='btn btn-success' href='country/"+data+"/edit'>\n" +
                            "<i class='fa fa-edit'></i>\n" +
                            "<a  class=\"btn btn-danger\" href=\"#\"onclick='deleteData("+data+")'>\n" +
                            "\t\t\t<i class=\"fa fa-trash\"></i>\n" +
                            "\t\t</a>&nbsp;";
                    },
                    "searchable": false,
                    "orderable": true,
                    "targets": 4,

                }
            ]}

        );

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
                        window.location.href='/country/destroy/'+$id

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


