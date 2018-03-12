@extends('plantilla.main')


@section('content')
<div class="container">
  <div class="col-md-12">
    <div class="card">
      <h5 class="card-header">Verb Test</h5>
      <div class="card-body">
        <h5 class="card-title">Selecciona el numero de verbos:</h5>
        <p class="card-text"></p>
        <div class="form-group">
            {!!Form::open(['route'=>'iniciar.juego'])!!}
            {!!Form::label('Verbs', null, ['class' => 'control-label'])!!}
            {!!Form::number('num', null,(['class' => 'form-control','min'=>0,'max'=>10,'id'=>'num']))!!}
            <div class="invalid-feedback">
               Please choose a number of 10 length.
            </div>
            <button type="submit" class="btn btn-primary">Jugar</button>
            {!! Form::close() !!}
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
  <script type="text/javascript">

  $('input').blur( function() {
    $(this).css({"box-shadow":"0 0 0"});
  });
    $(function() {
       maxVal = 10;
       $('#num').keyup(function(){
          var insertedVal = $(this).val();
          if (insertedVal.length < maxVal){
              $(this).css({"box-shadow":"0 0 5px red","border-color":"red"});
                $(".invalid-feedback").show();
          }else{
              $(this).css({"box-shadow":"0 0 5px green","border-color":"green"});
              $(".invalid-feedback").hide();
          }
       })
    });



  </script>
@endpush
