@extends('template')

@section('content')
    
    <div class="col-lg-12">
        <h1 class="page-header">Apoyos</h1>
    </div>

    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Consecutivo</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Fecha creación</th>
                <th>Última modificación</th>
                <th>Detalles</th>
            </tr>
        </thead>
    </table>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
    </div>

    <script src="assets/jquery.js"></script>    

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
    $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('datatables.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                {
              "mData": null,
              "bSortable": false,
              "mRender": function(data, type, full) {
                return '<td class="text-center"><a class="btn btn-default detalles" data-toggle="modal" data-target="#myModal">Detalles</a></td>';
              }
            }
            ]
        });
    });
</script>
@stop
@push('script-head')

@endpush
@endsection