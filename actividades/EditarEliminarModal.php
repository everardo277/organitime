<!-- Editar -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<center> <h4 class="modal-title">Editar Actividad </h4></center>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="container-fluid">

					<form method="POST" action="editar.php?id=<?php echo $row['id']; ?>">
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Nombre de actividad:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="actividad" value="<?php echo $row['actividad']; ?>">
							</div>
						</div>				
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Finalidad:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="finalidad" value="<?php echo $row['finalidad']; ?>">
							</div>
							
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Observaciones:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="observaciones"value="<?php echo $row['observaciones']; ?>">
							</div>
							
						</div>
						<div class="row form-group">
							<div class="col-sm-2">
								<label class="control-label">Fecha:</label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="fecha" value="<?php echo $row['fecha']; ?>">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
							<button type="submit" name="edit" class="btn btn-success" ><span class="fa fa-check"></span> Actualizar</button>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Eliminar -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog " role="document">
		<div class="modal-content">
			<div class="modal-header">
				<center> <h4 class="modal-title">Borrar Contacto </h4></center>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<p class="text-center">¿Estas seguro en borrar los datos de? </p>
				<h2 class="text-center"> <?php echo $row['actividad']; ?></h2>
			</div>
					
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
				<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> Si</a>
				
			</div>
		</div>
	</div>
</div>