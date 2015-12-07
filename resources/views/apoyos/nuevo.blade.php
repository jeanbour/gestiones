@extends('template')

@section('links')
    <link rel="stylesheet" type="text/css" href="assets/css/apoyos.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

@endsection('links')

@section('content')
    
    <div class="col-lg-12">
        <h1 class="page-header">Nuevo</h1>
        <div class="text-right">
            <label>*Obligatorio</label>
        </div>        
    </div>
    
<div class="container">
  {!! Form::open(['route' => 'register', 'method' => 'POST', 'role' => 'form']) !!}

    <!-- <div class="row form-group">
        <div class="col-md-12">
            <div class="form-group col-md-12">
            </div>
        </div>
    </div> -->
    <div class="row form-group">
        <div class="col-md-6">
            <!-- <div class="form-group col-md-12">
                <label>RFC</label>
                <input type="text" id="rfc" class="form-control" >
            </div> -->
            <div class="form-group col-md-12">
                {!! Field::text('nombre', ['id' => 'nombre']) !!}
            </div>
            <div class="form-group col-md-12">
                {!! Field::text('apellido_paterno', ['id' => 'apellido_paterno']) !!}
            </div>
            <div class="form-group col-md-12">
                {!! Field::text('apellido_materno', ['id' => 'apellido_materno']) !!}
            </div>
            <div class="form-group col-md-12">
                {!! Field::text('telefono', ['id' => 'telefono']) !!}
            </div>
            <div class="form-group col-md-12">
                {!! Field::text('celular', ['id' => 'celular']) !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group col-md-12">
                {!! Field::text('calle') !!}
            </div>
            <div class="form-group col-md-12">
                <div class="form-group col-md-6">
                    {!! Field::text('numeroI') !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Field::text('numeroE') !!}
                </div>
            </div>
            <div class="form-group col-md-12">
                {!! Field::text('colonia') !!}
            </div>
            <div class="form-group col-md-12">
                {!! Field::text('seccional') !!}
            </div>
            <div class="col-md-12">
                {!! Field::file('foto') !!}
            </div>
        </div>        
    </div>      
    
    <div class="row form-group panel panel-default" id="listaApoyos">
        <div class="form-group col-md-12 text-right">
            <input type="button" id="agregar" value="agregar" class="btn btn-default col-md-3 col-md-offset-9">            
        </div>
        <div class="col-md-12">
            <div class="form-group col-md-6">
                {!! Field::select('apoyo_1', $apoyos, ['class' => 'apoyo']) !!}             
            </div>        
            <div class="form-group col-md-6">
                {!! Field::text('monto_1', ['class' => 'monto']) !!}
            </div>
        </div>
        <div class="col-md-12" style="visibility:hidden" id="apoyo2">
            <div class="form-group col-md-5">
                {!! Field::select('apoyo_2', $apoyos, ['class' => 'apoyo']) !!}             
            </div>        
            <div class="form-group col-md-5">
                {!! Field::text('monto_2', ['class' => 'monto']) !!}
            </div>
            <div class="col-md-1 col-md-offset-1">
                <input type="button" class="btn btn-default quitar" value="quitar">
            </div>
        </div>
        <div class="col-md-12" style="visibility:hidden" id="apoyo3">
            <div class="form-group col-md-5">
                {!! Field::select('apoyo_3', $apoyos, ['class' => 'apoyo']) !!}             
            </div>        
            <div class="form-group col-md-5">
                {!! Field::text('monto_3', ['class' => 'monto']) !!}
            </div>
            <div class="col-md-1 col-md-offset-1">
                <input type="button" class="btn btn-default quitar" value="quitar">
            </div>
        </div> 
        <div class="col-md-12" style="visibility:hidden" id="apoyo4">
            <div class="form-group col-md-5">
                {!! Field::select('apoyo_4', $apoyos, ['class' => 'apoyo']) !!}             
            </div>        
            <div class="form-group col-md-5">
                {!! Field::text('monto_4', ['class' => 'monto']) !!}
            </div>
            <div class="col-md-1 col-md-offset-1">
                <input type="button" class="btn btn-default quitar" value="quitar">
            </div>
        </div> 
        <div class="col-md-12" style="visibility:hidden" id="apoyo4">
            <div class="form-group col-md-5">
                {!! Field::select('apoyo_4', $apoyos, ['class' => 'apoyo']) !!}             
            </div>        
            <div class="form-group col-md-5">
                {!! Field::text('monto_4', ['class' => 'monto']) !!}
            </div>
            <div class="col-md-1 col-md-offset-1">
                <input type="button" class="btn btn-default quitar" value="quitar">
            </div>
        </div>      
    </div>
    <div class="row form-group">
        <div class="col-md-12">
          <div class="col-md-12"> 
            <p>
              <input type="submit" value="Guardar" class="btn btn-success col-sm-12 col-xs-12 col-md-4 col-md-offset-4">
            </p> 
          </div>            
        </div>     
    </div> 
    {!! Form::close() !!}             
</div>
@endsection

@section('scripts')
{!! Html::script('assets/jquery.js') !!}
{!! Html::script('//code.jquery.com/ui/1.11.4/jquery-ui.js') !!}
{!! Html::script('assets/js/nuevo.js') !!}

@endsection('scripts')
