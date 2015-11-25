@extends('template')

@section('links')

<link href="{{ asset('//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css') }}" rel="stylesheet">

@endsection('links')

@section('content')

    <div class="col-lg-12">
        <h1 class="page-header">Apoyos</h1>
    </div>

    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>fecha</th>
                <th>nombre</th>
                <th>paterno</th>
                <th>materno</th>
                <th>seccional</th>
                <th>colonia</th>
                <th>apoyo</th>
                <th>detalles</th>
                <!-- <th>detalles</th> -->
                <!-- <th>Consecutivo</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Fecha creación</th>
                <th>Detalles</th> -->
            </tr>
        </thead>
    </table>
   <!--  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Detalles de apoyo</h4>
          </div>
          <div class="modal-body">
            <img src="http://www.municipalidadchincha.gob.pe/webchincha/Muni-Chincha-2015/img/user-1.png" width="80px" height="100px">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Guardar cambios</button>
          </div>
        </div>
      </div>
    </div> -->

@section('scripts')
  
    {!! Html::script('assets/jquery.js') !!}
    {!! Html::script('assets/bootstrap/js/bootstrap.min.js') !!}
    {!! Html::script('//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/js/apoyos.js') !!}

    <script type="text/javascript">
      function format ( d ) {
          return '<b>Nombre completo: </b>'+d.nombre+' '+d.apellido_paterno+' '+d.apellido_materno+' '+ '<br>'+
          '<b>Telefono:</b> '+d.celular+'<br><br>'+
          '<b>DOMICILIO <br>'+ 
          'Calle: </b>'+d.calle+'<br>'+
          '<b>Numero exterior: </b>'+d.num_ext+'<br>'+
          '<b>Numero interior: </b>'+d.num_int+'<br>'+
          '<b>Colonia:</b> '+d.colonia+'<br>'+
          '<b>Seccional:</b> '+d.zona+'<br>';
      }

        // $(function() {
            var dt = $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('datatables.data') !!}',
                columns: [
                    { data: 'fecha', name: 'fecha' },
                    { data: 'nombre', name: 'nombre' },
                    { data: 'apellido_paterno', name: 'apellido_paterno' },
                    { data: 'apellido_materno', name: 'apellido_materno' },
                    { data: 'zona', name: 'zona' },
                    { data: 'colonia', name: 'colonia' },
                    { data: 'apoyo', name: 'apoyo' },

                    // { data: 'id', name: 'id' },
                    // { data: 'name', name: 'name' },
                    // { data: 'email', name: 'email' },
                    // { data: 'created_at', name: 'created_at' },
                    // { data: 'remember_token', name: 'remember_token' },
                    {
                      "mData": null,
                      "bSortable": false,
                      "mRender": function(data, type, full) {
                        return '<td class="text-center"><a class="btn btn-success detalles" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span></a></td>';
                      }, 
                      "bSearchable": false,
                      "class":          "details-control",
                      "orderable":      false
                    }
                ],
                "order": [[1, 'asc']]
            });
        // });

        var detailRows = [];
 
        $('#users-table').on( 'click', 'tr td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = dt.row( tr );
            var idx = $.inArray( tr.attr('id'), detailRows );
     
            if ( row.child.isShown() ) {
                tr.removeClass( 'details' );
                row.child.hide();
     
                // Remove from the 'open' array
                detailRows.splice( idx, 1 );
            }
            else {
                tr.addClass( 'details' );
                row.child( format( row.data() ) ).show();
     
                // Add to the 'open' array
                if ( idx === -1 ) {
                    detailRows.push( tr.attr('id') );
                }
            }
        } );
     
        // On each draw, loop over the `detailRows` array and show any child rows
        dt.on( 'draw', function () {
            $.each( detailRows, function ( i, id ) {
                $('#'+id+' td.details-control').trigger( 'click' );
            } );
        } );


    </script>
@endsection('scripts')

@endsection