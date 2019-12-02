<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-1">
	<form action="../clientes" method="post">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
                <h4 class="modal-title">Agregar cliente</h4>
                <button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
			</div>
			<div class="modal-body">
				<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Nombre</label>
					<div class="col-md-8">
						<input type="text" name="nombre" class="form-control" required="">
					</div>
				</div>
				<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Apellido paterno</label>
					<div class="col-md-8">
						<input type="text" name="paterno" class="form-control" required="">
					</div>
				</div>
				<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">Apellido materno</label>
					<div class="col-md-8">
						<input type="text" name="materno" class="form-control" required="">
					</div>
				</div>
				<div class="form-group row">
				<label class="col-md-4 col-form-label text-md-right">CI/NIT</label>
					<div class="col-md-8">
						<input type="text" name="ci_nit" class="form-control" required="">
					</div>
				</div>
				<input type="text" hidden="" name="usuario_id" class="form-control col-md-4" required="" value="{{auth()->id()}}">
			</div>
			{{csrf_field()}}
			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" value="Confirmar">
			</div>
		</div>
	</div>
	</form>

</div>