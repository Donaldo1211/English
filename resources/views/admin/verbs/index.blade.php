@extends('plantilla.main')

@section('content')
  <div class="form-group">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" id="boton2">Agregar por modal</button>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo Verb</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            {!! Form::open() !!}
            <div class="form-group">
              {!! Form::label('verb','Verbo')!!}
              {!! Form::text('verb',null,['class'=>'form-control','placeholder'=>'Verb','required','id'=>'verbA'])!!}
            </div>
            <div class="form-group">
              {!! Form::label('present','Present')!!}
              {!! Form::text('present',null,['class'=>'form-control','placeholder'=>'Present','required','id'=>'presentA'])!!}
            </div>
            <div class="form-group">
              {!! Form::label('gerund','Gerundio')!!}
              {!! Form::text('gerund',null,['class'=>'form-control','placeholder'=>'Gerund','required','id'=>'gerundA'])!!}
            </div>
            <div class="form-group">
              {!! Form::label('past','Past')!!}
              {!! Form::text('past',null,['class'=>'form-control','placeholder'=>'Past','required','id'=>'pastA'])!!}
            </div>
            <div class="form-group">
              {!! Form::label('participle','Participle')!!}
              {!! Form::text('participle',null,['class'=>'form-control','placeholder'=>'Participle','required','id'=>'participleA'])!!}
            </div>
            <div class="form-group">
              {!! Form::label('meaning','Meaning')!!}
              {!! Form::text('meaning',null,['class'=>'form-control','placeholder'=>'Participle','required','id'=>'meaningA'])!!}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-success" onclick="guardar()" id="botonGuardar">Guardar</button>
            </div>
            {!! Form::close()!!}
          </div>

        </div>
      </div>
    </div>
      <a href="{{route('verbs.create')}}" class="btn btn-primary">Agregar Verb</a>
  </div>


  <table class="table table-striped" id='tabla' name='tabla'>

  <tbody>

  </tbody>

</table>


<div class="modal fade" id="modalEditarVerb">
  <div class="modal-dialog">
      <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
              <h4 class="modal-title">Editar Verb</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
              <div class="form-group col">
                  <input type="hidden" id='idVerbo' />
                  {!! Form::label('Verb', 'Verb:') !!}
                  {!! Form::text('verb', null, ['class' => 'form-control', 'required','id'=>'verbo']) !!}
                  {!! Form::label('present', 'Present:') !!}
                  {!! Form::text('present', null, ['class' => 'form-control', 'required','id'=>'presente']) !!}
                  {!! Form::label('gerund', 'Gerund:') !!}
                  {!! Form::text('gerund', null, ['class' => 'form-control', 'required','id'=>'gerundio']) !!}
                  {!! Form::label('past', 'Past:') !!}
                  {!! Form::text('past', null, ['class' => 'form-control', 'required','id'=>'pasado']) !!}
                  {!! Form::label('participle', 'Participle:') !!}
                  {!! Form::text('participle', null, ['class' => 'form-control', 'required','id'=>'participio']) !!}
                  {!! Form::label('meaning', 'Meaning:') !!}
                  {!! Form::text('meaning', null, ['class' => 'form-control', 'required','id'=>'significado']) !!}
              </div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-success" onclick="actualizar()">Editr</button>
          </div>
      </div>
  </div>
</div>

<div class="modal fade" id="modalEliminarVerb">
  <div class="modal-dialog">
      <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
              <h4 class="modal-title" id="tituloEliminar">Elminar Verb </h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <input type="hidden" id='idVerboElminar' />
          <!-- Modal body -->

          <!-- Modal footer -->
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              <button type="button" id="eliminarVerbo" value="" onclick='eliminar(this)' class="btn btn-succes">Elminar</button>

          </div>
      </div>
  </div>
</div>
@include('admin/verbs/scripts')
@endsection
