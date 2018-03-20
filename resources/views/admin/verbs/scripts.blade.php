@push('scripts')
  <script>
  $.ajaxSetup({
  headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
  });
  function guardar(){
    var verbA=$('#verbA').val();
    var presentA=$('#presentA').val();
    var gerundA=$('#gerundA').val();
    var pastA=$('#pastA').val();
    var participleA=$('#participleA').val();
    var meaningA=$('#meaningA').val();
    var ruta="{{route('verbs.store')}}";
    $.ajax({
      type:'POST',
      url:ruta,
      data:{
        verb:verbA,
        present:presentA,
        gerund:gerundA,
        past:pastA,
        participle:participleA,
        meaning:meaningA
      },
      dataType:'json',
      success:function(res){
        if(res.status==0){
            swal("Error", res.res, 'error');
          $('#exampleModal').modal('hide');
          console.log('error');
        }else{
          listar();
          $('#verbA').val("")
          $('#presentA').val("");
          $('#gerundA').val("");
          $('#pastA').val("");
          $('#participleA').val("");
          $('#meaningA').val("");

          swal("Exito", 'Verbo guardado', 'success');
          $('#exampleModal').modal('hide');
          console.log('exito');
        }
      },
      error: function(e){
        console.log(e);
      }
    });
  }
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
          $('#gerundio').val(res[0]['gerund']);
          $('#pasado').val(res[0]['past']);
          $('#participio').val(res[0]['participle']);
          $('#significado').val(res[0]['meaning']);
        },
        error:function(e){
          console.log(e);
        }
      });
  }
  function modalBorrar(boton){
    var verbo= boton.name;
    var id=boton.value;
    console.log("name: "+verbo+" id: "+id);
    $('#modalEliminarVerb').modal('show');
    $('#tituloEliminar').empty();
    $('#tituloEliminar').append('Seguro que desea eliminar el verbo: '+verbo);
    $('#modalEliminarVerb').modal('show');
    $('#eliminarVerbo').val(id);
  }
  function actualizar(){
    var idVerbo=$('#idVerbo').val();
    var verb=$('#verbo').val();
    var gerundio=$('#gerundio').val();
    var pasado=$('#pasado').val();
    var participio=$('#participio').val();
    var significado=$('#significado').val();
    var route="{{route('verb.guardarVerbo')}}";
    $('#modalEditarVerb').modal('show');
      $.ajax({
        type: 'POST',
        url:route,
        data:{
              id:idVerbo,
              verb:verb,
              gerund:gerundio,
              past:pasado,
              participle:participio,
              meaning:significado},
        dataType:'json',
        success: function(res){
          if(res.status==0){
          swal("Error", res.res, 'error');
          $('#modalEditarVerb').modal('hide');
            console.log('error');
          }else{
            listar();
            swal("Exito", 'Verbo guardado', 'success');
            $('#modalEditarVerb').modal('hide');
            console.log('exito');
          }
        },
        error:function(e){
          swal("Error", 'Intente de nuevo', 'error');
          console.log(e);

        }
      });
  }
  function eliminar(boton){
    var valor=boton.value;
    var ruta="{{route('verb.eliminar')}}";
    console.log('verb: '+verbo+" id:"+valor);

    $.ajax({
      type:'POST',
      url:ruta,
      data:{id:valor},
      dataType:'json',
      success:function(res){
          if(res.status==0){
            swal("Error", 'Actualice la pagina', 'error');
            $('#modalEliminarVerb').modal('hide');
            console.log('error');
          }else{
            listar();
            swal("Exito", 'Verbo eliminado', 'success');
            $('#modalEliminarVerb').modal('hide');
            console.log('exito');
          }
      },
      error:function(e){
        console.log(e);
      }
    });

  }
  function listar(){
    var tablaDatos=$('#tabla');
    var ruta="{{route('verb.listar')}}";
    $('#tabla').empty();
    $.get(ruta,function(res){
      tablaDatos.append("<thead><tr><th scope='col'>ID</th><th scope='col'>Verb</th><th scope='col'>Gerund</th><th scope='col'>Past</th><th scope='col'>Participle</th><th scope='col'>Meaning</th><th scope='col'>Accion</th></tr></thead>");
      $(res).each(function(key,value){
        //console.log(value);
        tablaDatos.append("<tr><td>"+value.id+"</td><td>"+value.verb+"</td><td>"+value.gerund+"</td><td>"+value.past+"</td><td>"+value.participle+"</td><td>"+value.meaning+"</td><td><button  value="+value.id+"  onclick='getDatos(this)' class='btn btn-warning'></button><button class='btn btn-danger' onclick='modalBorrar(this)' name="+value.verb+" value="+value.id+" ></button></td></tr>");
      })
    });

  }
  $(document).ready(function() {
    listar();
  });
  </script>
@endpush
