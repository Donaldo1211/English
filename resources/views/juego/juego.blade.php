@extends('plantilla.main') @section('content')

<div class="container">
  <div class="col-md-12">
    <div class="card">
      <h5 class="card-header">Verb Test</h5>
      <div class="card-body">
        <h5 class="card-title">#Vamoadarle:</h5>
        <p class="card-text"></p>
        <div class="form-group">
          {!!Form::open()!!}
          <table class="table table-striped" id="tablaVerbs">
            <thead>
              <tr>
                <th>No.</th>
                <th>Verb</th>
                <th>Present</th>
                <th>Gerund</th>
                <th>Past</th>
                <th>Participle</th>
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
  @foreach ($verbos as $verb)
  var x = Math.floor((Math.random() * 5) + 1);
  switch (x) {
    case 1:
    tablaAntes="<tr><td>"+'{{$verb->id}}'+"</td><td>"+'{{$verb->verb}}'+"</td>";
    tablaServicios=tablaAntes+"<td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td></tr>";
    $('#tablaVerbs tr:last').after(tablaServicios);
      break;
    case 2:
    tablaAntes="<tr><td>"+'{{$verb->id}}'+"</td><td contenteditable='true'></td>";
    tablaServicios=tablaAntes+"<td>"+'{{$verb->present}}'+"</td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td></tr>";
    $('#tablaVerbs tr:last').after(tablaServicios);
      break;
    case 3:
    tablaAntes="<tr><td>"+'{{$verb->id}}'+"</td><td contenteditable='true'></td>";
    tablaServicios=tablaAntes+"<td contenteditable='true'></td><td>"+'{{$verb->gerund}}'+"</td><td contenteditable='true'></td><td contenteditable='true'></td></tr>";
    $('#tablaVerbs tr:last').after(tablaServicios);
      break;
    case 4:
    tablaAntes="<tr><td>"+'{{$verb->id}}'+"</td><td contenteditable='true'></td>";
    tablaServicios=tablaAntes+"<td contenteditable='true'></td><td contenteditable='true'></td><td>"+'{{$verb->past}}'+"</td><td contenteditable='true'></td></tr>";
    $('#tablaVerbs tr:last').after(tablaServicios);
      break;
    case 5:
    tablaAntes="<tr><td>"+'{{$verb->id}}'+"</td><td contenteditable='true'></td>";
    tablaServicios=tablaAntes+"<td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'></td><td contenteditable='true'>"+'{{$verb->participle}}'+"</td></tr>";
    $('#tablaVerbs tr:last').after(tablaServicios);
      break;
      
    default:
  }
    @endforeach

</script>
@endpush
