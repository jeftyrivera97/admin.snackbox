<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{!!route('folio-crear')!!}" method="POST" >
        @csrf
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Autorizo de Activación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="card card-info">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-md-12">
                        <label>Clave de Autorización</label>
                        <input type="text" class="form-control input-rounded"  placeholder="Ingrese Codigo de Autorizacion" id="clave" name="clave" required >
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
         <button type="submitt" class="btn btn-success">Confirmar</button>
        </div>
      </div>
    </div>
</form>
  </div>
