@extends('plantilla.main')

@section('content')


  {!! Form::open(['route'=>'verbs.store','method','POST']) !!}
    <div class="form-group">
      {!! Form::label('verb','Verbo') !!}
      {!! Form::text('verb',null,['class'=>'form-control','placeholder'=>'Verbo','required'])!!}
    </div>

    <div class="form-group">
      {!! Form::label('present','Presente') !!}
      {!! Form::text('present',null,['class'=>'form-control','placeholder'=>'Presente Tense','required'])!!}
    </div>

    <div class="form-group">
      {!! Form::label('past','Pasado') !!}
      {!! Form::text('past',null,['class'=>'form-control','placeholder'=>'Past Tense','required'])!!}
    </div>

    <div class="form-group">
      {!! Form::label('participle','Presente') !!}
      {!! Form::text('participle',null,['class'=>'form-control','placeholder'=>'participle Tense','required'])!!}
    </div>
    <div class="form-group">
      {!! Form::submit('Guardar',['class'=>'btn btn-primary']) !!}
    </div>


  {!! Form::close()!!}

@endsection
