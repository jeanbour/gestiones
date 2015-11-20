@extends('template')

@section('content')
    
    <div class="col-lg-12">
        <h1 class="page-header">Nuevo</h1>
    </div>
    
<div class="container">
  {!! Form::open(['route' => 'register', 'method' => 'POST', 'role' => 'form']) !!}
    <div class="row form-group">
        <div class="col-md-6">
            <div class="form-group col-md-12">
                {!! Field::text('Name') !!}
            </div>
            <div class="form-group col-md-12">
                {!! Field::text('Apellido paterno') !!}
            </div>
            <div class="form-group col-md-12">
                {!! Field::text('Apellido Materno') !!}
            </div>
            <div class="form-group col-md-12">
                {!! Field::text('Telefono local') !!}
            </div>
            <div class="form-group col-md-12">
                {!! Field::text('Celular') !!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group col-md-12">
                {!! Field::text('Calle') !!}
            </div>
            <div class="form-group col-md-12">
                {!! Field::text('Numero') !!}
            </div>
            <div class="form-group col-md-12">
                {!! Field::text('Colonia') !!}
            </div>
            <div class="form-group col-md-12">
                {!! Field::text('Seccional') !!}
            </div>
            <div class="form-group col-md-12">
                {!! Field::file('Cargar foto') !!}
            </div>
        </div>            
       
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <div class="row">
              <div class="col-md-4">
                <div class="input-group">
                  <span class="input-group-addon">
                    <input type="checkbox" aria-label="...">
                  </span>
                  <input type="text" class="form-control disabled " value="Cantidad" aria-label="...">
                </div><!-- /input-group -->
              </div><!-- /.col-md-4 -->
              <div class="col-md-4">
                <div class="input-group">
                  <span class="input-group-addon">
                    <input type="checkbox" aria-label="...">
                  </span>
                  <input type="text" class="form-control disabled " value="Funerales" aria-label="...">
                </div><!-- /input-group -->
              </div><!-- /.col-md-4 -->
              <div class="col-md-4">
                <div class="input-group">
                  <span class="input-group-addon">
                    <input type="checkbox" aria-label="...">
                  </span>
                  <input type="text" class="form-control disabled " value="Cartas de residencia" aria-label="...">
                </div><!-- /input-group -->
              </div><!-- /.col-md-4 -->
              
            </div><!-- /.row -->
                    
        </div>
        <div class="col-md-12 form-group">
            <div class="row">
              <div class="col-md-4">
                <div class="input-group">
                  <span class="input-group-addon">
                    <input type="checkbox" aria-label="...">
                  </span>
                  <input type="text" class="form-control disabled " value="Antecedentes no penales" aria-label="...">
                </div><!-- /input-group -->
              </div><!-- /.col-md-4 -->
              <div class="col-md-4">
                <div class="input-group">
                  <span class="input-group-addon">
                    <input type="checkbox" aria-label="...">
                  </span>
                  <input type="text" class="form-control disabled " value="Platicas para escuela" aria-label="...">
                </div><!-- /input-group -->
              </div><!-- /.col-md-4 -->
              <div class="col-md-4">
                <div class="input-group">
                  <span class="input-group-addon">
                    <input type="checkbox" aria-label="...">
                  </span>
                  <input type="text" class="form-control disabled " value="Cartas de recomendación" aria-label="...">
                </div><!-- /input-group -->
              </div><!-- /.col-md-4 -->
              
            </div><!-- /.row -->
                    
        </div>
    </div> 
    <p>
        <input type="submit" value="Register" class="btn btn-success col-md-4 col-md-offset-4">
    </p> 
    {!! Form::close() !!}   
</div>
@endsection
