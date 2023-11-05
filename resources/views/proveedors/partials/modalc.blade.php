<div class="container">
    <button type="button" class="btn btn-outline-info btn-lg btn-block shadow" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-plus-circle"></i> Proveedor
    </button>
</div>

<form action="{{ route('proveedors.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">NUEVO PROVEEDOR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">NOMBRE DEL PROVEEDOR:</label>
                        <input type="text" name="name" class="form-control" id="recipient-name" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">IMAGEN DEL PROVEEDOR:</label>
                        <input type="file" name="image" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary shadow" data-dismiss="modal">CERRAR</button>
                    <button type="submit" class="btn btn-outline-primary shadow">GUARDAR PROVEEDOR</button>
                </div>
            </div>
        </div>
    </div>
</form>
