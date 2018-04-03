@extends('plantilla.main') @section('content')
  <style type="text/css">
      /* td.wrong { border: 1px solid #F00; } */
      /* td.correct { border: 1px solid #0f7322; } */
      .correct {background: #5fac77;}
      .wrong{background: #d26767;}
  </style>
<div class="container">
  <div class="col-md-12">
    <div class="card">
      <h5 class="card-header">Verb Test</h5>
      <div class="card-body">
        <h5 class="card-title">#Vamoadarle:   <button class="btn btn-primary float-right" id='evaluar'>Evaluar</button></h5>

        <p class="card-text"></p>
        <div class="form-group">
          {!!Form::open()!!}
          <table class="table table-striped" id="tablaVerbs">
            <thead>
              <tr>
                <th>No.</th>
                <th>Verb</th>
                <th>Gerund</th>
                <th>Past</th>
                <th>Participle</th>
                <th>Meaning</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>


          {!! Form::close() !!}
        </div>

      </div>
    </div>
  </div>
</div>



@endsection @push('scripts')
<script type="text/javascript">

$('#evaluar').on('click', function(event) {
  cont=0;
  buenas=0;
  $( "td.test" ).each(function( event ) {

    us=$(this).text();
    answ=$(this).attr('name');
      console.log('user:'+us+" answ:"+answ);
    if(us==answ){
      // $(this).addClass('correct');
      // $(this).removeClass('wrong');
      // console.log('true');
      buenas++;
    }else{
      // $(this).removeClass('wrong');
      // $(this).removeClass('correct');
      answ=$(this).attr('name');
      $(this).text(answ);
      $(this).css('color', 'rgb(21, 115, 44)');
      console.log('false');
    }
    console.log(answ);
    cont++;
  });
  console.log('total:'+cont+" buenas:"+buenas);
  swal({
  title: "Completado",
  text: buenas+" correcta(s) de "+cont+".",
  imageUrl: '{{asset('/images/completed.png')}}'
});
});


  @foreach($verbos as $verb)
  var x = Math.floor((Math.random() * 5) + 1);
  switch (x) {

    case 1:
      row = "<tr><td>" + '{{$verb->id}}' + "</td><td>" + '{{$verb->verb}}' + "</td><td class='test' contenteditable='true' name='" + '{{$verb->gerund}}' + "'></td><td class='test' contenteditable='true' name='" + '{{$verb->past}}' + "'></td><td class='test' contenteditable='true' name='" + '{{$verb->participle}}' + "'></td><td class='test' contenteditable='true' name='" + '{{$verb->meaning}}'+ "'></td></tr>";
      $('#tablaVerbs tr:last').after(row);
      break;
    case 2:
      row = "<tr><td>" + '{{$verb->id}}' + "</td><td class='test' contenteditable='true' name='" + '{{$verb->verb}}' + "'></td><td>" + '{{$verb->gerund}}' + "</td><td class='test' contenteditable='true' name='" + '{{$verb->past}}' + "'></td><td class='test' contenteditable='true' name='" + '{{$verb->participle}}' + "'><td class='test' contenteditable='true' name='" + '{{$verb->meaning}}'+ "'></td></tr>";
      $('#tablaVerbs tr:last').after(row);
      break;
    case 3:
      row = "<tr><td>" + '{{$verb->id}}' + "</td><td class='test' contenteditable='true' name='" + '{{$verb->verb}}' + "'></td><td class='test' contenteditable='true' name='" + '{{$verb->gerund}}' + "'></td><td>" + '{{$verb->past}}' + "</td><td class='test' contenteditable='true' name='" + '{{$verb->participle}}' + "'></td><td class='test' contenteditable='true' name='" + '{{$verb->meaning}}' + "'></td></tr>";
      $('#tablaVerbs tr:last').after(row);
      break;
    case 4:
      row = "<tr><td>" + '{{$verb->id}}' + "</td><td class='test' contenteditable='true' name='" + '{{$verb->verb}}' + "'></td><td class='test' contenteditable='true' name='" + '{{$verb->gerund}}' + "'></td><td class='test' contenteditable='true' name='" + '{{$verb->past}}' + "'></td><td>" + '{{$verb->participle}}' + "</td><td class='test' contenteditable='true' name='" + '{{$verb->meaning}}' + "'></td></tr>";
      $('#tablaVerbs tr:last').after(row);
      break;
    case 5:
      row = "<tr><td>" + '{{$verb->id}}' + "</td><td class='test' contenteditable='true' name='" + '{{$verb->verb}}' + "'></td><td class='test' contenteditable='true' name='" + '{{$verb->gerund}}' + "'></td><td class='test' contenteditable='true' name='" + '{{$verb->past}}' + "'></td><td class='test' contenteditable='true' name='" + '{{$verb->participle}}' + "'></td><td>" + '{{$verb->meaning}}' + "</td></tr>";
      $('#tablaVerbs tr:last').after(row);
      break;
    default:
  }
  @endforeach
  $( "td" ).focusout(function( event ) {
    us=$(this).text();
    answ=$(this).attr('name');
      console.log('user:'+us+" answ:"+answ);
    if(us==answ){
      $(this).addClass('correct');
      $(this).removeClass('wrong');
      console.log('true');
    }else{
      $(this).addClass('wrong');
      $(this).removeClass('correct');
      console.log('false');
    }
    console.log(answ);
  });


</script>
@endpush
