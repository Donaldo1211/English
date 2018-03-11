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
            {!!Form::open()!!}
            {!!Form::label('Verbs', null, ['class' => 'control-label'])!!}
            {!!Form::number('num', null,(['class' => 'form-control','min'=>0,'max'=>10,'id'=>'num']))!!}
            {!! Form::close() !!}
        </div>
        <a href="#" class="btn btn-primary">Jugar</a>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
  <script type="text/javascript">
  $(function() {
     maxVal = 10;
     $('#num').keyup(function(){
        var insertedVal = $(this).val();
        console.log(insertedVal);
        if (insertedVal.length < maxVal){
            $(this).css({"color":"red","border":"1px solid red"});
        }else{
            $(this).css({"color":"green","border":"1px solid green"});
        }
     })
  });

  </script>
@endpush
