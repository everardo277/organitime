<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<center> <h4 class="modal-title">Agregar Actividad </h4></center>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="container-fluid">

					<form method="POST" action="agregar.php">
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Nombre de actividad:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="actividad">
							</div>
						</div>				
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Finalidad:</label>
							</div>
							<div class="col-sm-10">
								<input type="tel" class="form-control" name="finalidad">
							</div>
							
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Observaciones:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="observaciones">
							</div>
							
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Fecha:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="fecha">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
							<button type="submit" name="add" class="btn btn-primary" ><span class="fa fa-save"></span> Guardar</button>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>