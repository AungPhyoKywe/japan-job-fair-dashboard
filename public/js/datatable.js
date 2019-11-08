$(document).ready(function() {
    $('#example').DataTable({
        "dom": '<"top"f>rt<"bottom"lp><"clear">',
        "bFilter": false,
        language: {
            paginate: {
                next: '<button class="btn-sm btn-primary">next</button>', // or '→'
                previous: '<button class="btn-sm btn-primary">previous</button>' // or '←'
            }
        }
    });
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $('#example thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

    // DataTable
    var table = $('#example').DataTable();

    // Apply the search
    table.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        } );
    } );


} );



