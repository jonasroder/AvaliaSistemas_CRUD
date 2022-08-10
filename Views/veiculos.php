

<!-- Edit Modal HTML -->

		<div id="corpoDocumento">
			<div class="modal-header">						
					<h4 class="modal-title">add veiculo</h4>
					<buttontype="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</buttontype=>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>nome</label>
						<input name="_1_u_veiculos_nome"  type="text" class="form-control" required>
					</div>
					<div class="form-group teste">
						<label>marca</label>
						<input name="_1_u_veiculos_marca"  type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>ano</label>
						<input name="_1_u_veiculos_ano"  class="form-control" type="number" required></input>
					</div>
					<div class="form-group">
						<label>valor de venda</label>
						<input name="_1_u_veiculos_valorvenda"  class="form-control" type="number" value=""></input>
					</div>					
				</div>
				<div class="modal-footer">
					
					<input name="_1_u_veiculos_idveiculos"  class="form-control" type="hidden" value="2"></input>
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" onclick="post()" value="adicionar">
				</div>
			</div>

			
	

<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Edit Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>

<script>
	let jsonDados = <?= $dadosModel ?>
</script>