<div class="modal fade" id="modalEliminarVerb">
  <div class="modal-dialog">
      <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
              <h4 class="modal-title">title</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
              <div class="form-group col">
                  {!! Form::label('label', 'label:') !!}
                  {!! Form::text('text', null, ['class' => 'form-control', 'required']) !!}
              </div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              {!! Form::submit('Eliminar', ['class' => 'btn btn-success']) !!}
          </div>
      </div>
  </div>
</div>
