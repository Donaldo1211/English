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

            {!! Form::open(['route'=>'verbs.store','method','POST']) !!}
            <div class="form-group">
              {!! Form::label('verb','Verbo')!!}
              {!! Form::text('verb',null,['class'=>'form-control','placeholder'=>'Verb','required'])!!}
            </div>
            <div class="form-group">
              {!! Form::label('present','Present')!!}
              {!! Form::text('present',null,['class'=>'form-control','placeholder'=>'Present','required'])!!}
            </div>
            <div class="form-group">
              {!! Form::label('gerund','Gerundio')!!}
              {!! Form::text('gerund',null,['class'=>'form-control','placeholder'=>'Gerund','required'])!!}
            </div>
            <div class="form-group">
              {!! Form::label('past','Past')!!}
              {!! Form::text('past',null,['class'=>'form-control','placeholder'=>'Past','required'])!!}
            </div>
            <div class="form-group">
              {!! Form::label('participle','Participle')!!}
              {!! Form::text('participle',null,['class'=>'form-control','placeholder'=>'Participle','required'])!!}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              {!! Form::submit('Guardar',['class'=>'btn btn-primary','id'=>'boton'])!!}
            </div>
            {!! Form::close()!!}
          </div>

        </div>
      </div>
    </div>
      <a href="{{route('verbs.create')}}" class="btn btn-primary">Agregar Verb</a>
  </div>


  <table class="table table-striped" id='tabla' name='tabla'>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Verb</th>
      <th scope="col">Present</th>
      <th scope="col">Gerund</th>
      <th scope="col">Past</th>
      <th scope="col">Participle</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
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
          <!-- Modal body -->

          <!-- Modal footer -->
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              {!! Form::submit('Eliminar', ['class' => 'btn btn-success']) !!}
          </div>
      </div>
  </div>
</div>


  <script>
  $.ajaxSetup({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
});
  function getDatos(boton){
    var valor=boton.value;
    console.log("boton: "+valor);
    var route="{{route('verb.getVerb')}}";
    $('#modalEditarVerb').modal('show');
      $.ajax({
        type: 'POST',
        url:route,
        data:{id:valor},
        dataType:'json',
        success: function(res){
          console.log(res);
          $('#idVerbo').val(res[0]['id']);
          $('#verbo').val(res[0]['verb']);
          $('#presente').val(res[0]['present']);
          $('#gerundio').val(res[0]['gerund']);
          $('#pasado').val(res[0]['past']);
          $('#participio').val(res[0]['participle']);
        },
        error:function(e){
          console.log(e);
        }
      });
  }
  function actualizar(){
    var idVerbo=$('#idVerbo').val();
    var verb=$('#verbo').val();
    var presente=$('#presente').val();
    var gerundio=$('#gerundio').val();
    var pasado=$('#pasado').val();
    var participio=$('#participio').val();
    var route="{{route('verb.guardarVerbo')}}";
    $('#modalEditarVerb').modal('show');
      $.ajax({
        type: 'POST',
        url:route,
        data:{
              id:idVerbo,
              verb:verb,
              present:presente,
              gerund:gerundio,
              past:pasado,
              participle:participio},
        dataType:'json',
        success: function(res){

            listar();
              $('#modalEditarVerb').modal('hide');
        },
        error:function(e){
          console.log(e);

        }
      });
  }
  function eliminar(boton){
    console.log('eliminar');
    var valor=boton.value;
    var verbo= boton.name;
    console.log('verb: '+verbo+" id:"+valor);
    $('#tituloEliminar').empty();
    $('#tituloEliminar').append('Seguro que desea eliminar el verbo: '+verbo);
    $('#modalEliminarVerb').modal('show');

  }
  function listar(){

    var tablaDatos=$('#tabla');
    var ruta="{{route('verb.listar')}}";
    $('#tabla').empty();
    $.get(ruta,function(res){
      $(res).each(function(key,value){
          console.log(value);
        tablaDatos.append("<tr><td>"+value.id+"</td><td>"+value.verb+"</td><td>"+value.present+"</td><td>"+value.gerund+"</td><td>"+value.past+"</td><td>"+value.participle+"</td><td><button  value="+value.id+"  onclick='getDatos(this)' class='btn btn-warning'></button><button class='btn btn-danger' name="+value.verb+" value="+value.id+" onclick='eliminar(this)'></button></td></tr>");
      })


    });

  }
  $(document).ready(function() {
    listar();
  });



  </script>
@endsection
