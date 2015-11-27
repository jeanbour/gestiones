@extends('template')

@section('links')

<link href="{{ asset('//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('lightbox/bootstrap-lightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('lightbox/bootstrap-lightbox.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/apoyos.css') }}" rel="stylesheet">

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
                <th>detalles</th>
            </tr>
        </thead>
    </table>


@section('scripts')
  
    {!! Html::script('assets/jquery.js') !!}
    {!! Html::script('https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js') !!}
    {!! Html::script('assets/bootstrap/js/bootstrap.min.js') !!}
    {!! Html::script('//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js') !!}          
    {!! Html::script('lightbox/bootstrap-lightbox.min.js') !!}    
    {!! Html::script('assets/js/apoyos.js') !!}  

    <script type="text/javascript">
      

      function format ( d , datos ) {     

          var cadena = '<ul>';
          for(var i=0; i<datos.length; i++)
          {
            cadena += '<li><b>Apoyo:</b> '+datos[i].apoyo+'       <b>Monto:</b> $' +datos[i].cantidad+'</li>';  
          }
          cadena+='</ul>';

          return '<div class="col-md-12"><div class="form-group col-md-6"><b>Nombre completo: </b>'+d.nombre+' '+d.apellido_paterno+' '+d.apellido_materno+' '+ '<br>'+
          '<b>Telefono:</b> '+d.celular+'<br><br>'+
          '<b>DOMICILIO <br>'+ 
          'Calle: </b>'+d.calle+'<br>'+
          '<b>Numero exterior: </b>'+d.num_ext+'<br>'+
          '<b>Numero interior: </b>'+d.num_int+'<br>'+
          '<b>Colonia:</b> '+d.colonia+'<br>'+
          '<b>Seccional:</b> '+d.zona+'<br>'+
          '</div>'+cadena+
          '<button class="img btn btn-default" data-toggle="modal" data-target="#myModal">ver imagen</button>'+
          '</div></div>'+
          '<div class="modal automodal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">'+
            '<div class="modal-dialog" role="document">'+
              '<div class="modal-content">'+
                '<div class="modal-header">'+
                  '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                  '<h4 class="modal-title" id="myModalLabel">Imagen del apoyo</h4>'+
                '</div>'+
                '<div class="modal-body">'+
                  '<img class="imagen " src="img/'+d.foto+'.jpg">'+
                '</div>'+
                '<div class="modal-footer">'+
                  '<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>'+
                '</div>'+
              '</div>'+
            '</div>'+
          '</div>';
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
                    {
                      "mData": null,
                      "bSortable": false,
                      "mRender": function(data, type, full) {
                        return '<td class="text-center"><button class="btn btn-success detalles" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span></button></td>';
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
 
        $('body').on('click', '.detalles', function () {            
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
                console.log(row.data().id);
                var elemento = $(this);
                $.ajax({
                  url: 'apoyos-ordenes/'+row.data().id,
                  type: 'get',
                  dataType: 'json', 
                  success: function(data)
                  {
                    row.child( format( row.data(), data ) ).show();
                    elemento.css({
                      'background-image': 'none'
                    });
                  }
                });               
     
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

      // $('body').on('shown.bs.modal', '#myModal', function () {
      //     $(this).find('.imagen').css(
      //       {
      //         width: '100%',
      //         height:'100%', 
      //     });
      // });
      $('body').on('click', '.detalles', function()
      {
        if($(this).hasClass('btn-success'))
        {
          $(this).css({
              'background-image': 'url(img/loader.GIF)',
              'background-size': 'cover'
            }); 
          $(this).removeClass('btn-success').addClass('btn-danger');
          $(this).children().removeClass('glyphicon-plus').addClass('glyphicon-minus'); 
        }else if($(this).hasClass('btn-danger'))
        {
          $(this).removeClass('btn-danger').addClass('btn-success');
          $(this).children().removeClass('glyphicon-minus').addClass('glyphicon-plus');           
        }   
      });
    </script>
@endsection('scripts')

@endsection