@extends('plantilla.main')
<link rel="stylesheet" href="css/juego.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="plugins/js/stepper.widget.js"></script>
@section('content')
  <style>
  .stepper-widget { margin:30px auto;}
  </style>
    <div class="container">
        <div class="row">
            <div class="form group">
              <h2>Numero de verbos:</h2>
              <form class="form-inline">
                    <div class="stepper-widget">
                        <input type="text" class="js-qty-input form-control" value="1" />
                        <button type="button" class="js-qty-down btn btn-primary">-</button>
                        <button type="button" class="js-qty-up btn btn-danger">+</button>
                    </div>
                    </form>
            </div>
            <div class="form-group col-md-12">
              <button type="button" class="btn btn-success" id="iniciarJuego" name="button">Inicar</button>
            </div>
        </div>
    </div>
    <script>
            jQuery.noConflict();
        </script>
    <script>
          $(document).on('ready', function(){
                   $('.stepper-widget').stepper();
               });
     </script>
@endsection
