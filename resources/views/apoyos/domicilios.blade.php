@extends('template')

@section('content')

    <div class="col-lg-12">
        <h1 class="page-header">Colonia # {!! $colonia->id !!}</h1>
    </div>

    <ul>

    @foreach ($colonia->)
      <li>{!! $colonia->id !!}</li>
      <li>{!! $colonia->num_zona !!}</li>
      <li>{!! $colonia->bis !!}</li>
      <li>{!! $colonia->colonia !!}</li>
    </ul>

@section('scripts')
  
    {!! Html::script('assets/jquery.js') !!}
    {!! Html::script('assets/bootstrap/js/bootstrap.min.js') !!}

@endsection('scripts')

@endsection