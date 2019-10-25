<div class="modal fade" id="agregarArticulo" data-backdrop="static" tabindex="-1" aria-labelledby="agregarArticuloLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" >
				<h5 class="modal-title" id="gagregarArticuloLabel"> Agregar articulo</h5>
				<button id="closebtn" type="button" class="close" data-dismiss="modal" aria-label="Close">
		         	<span aria-hidden="true">&times;</span>
		        </button>
			</div>
			<div class="modal-body">
				<div class="modal-loader" id="loader">
					<div class="sp-box">
						<div class="sp sp1"></div>
						<div class="sp sp2"></div>
						<div class="sp sp3"></div>
						<div class="sp sp4"></div>
					</div>
				</div>
			 	<div class="container-fluid">
			 		<select id="selectPartida" class="form-control" name="partida" method="post">
	                    <option value ="">Seleccione una partida</option required>
	                    @foreach($partidas as $partida)
	                        <option value="{{$partida->nombre}}">{{$partida->nombre}}</option>
	                    @endforeach
	                </select>
			 	</div>
               <div class="container-fluid" style="margin-top: 5%;">
           		 	<select id="selectArticulo" class="form-control" name="articulos" required>
	                	<option value="">Seleccione un artículo</option>
	                </select>
               </div>
               <div class="container-fluid" style="margin-top: 5%;">
               		<div class="row">
               			<div class="col-md-6">
	               			<input type="number" name="cantidad" class="form-control" min="0" placeholder="cantidad" required>
	               		</div>
	               		<div class="col-md-6">
	               			<input type="text" name="precio" class="form-control" placeholder="Precio" required>
	               		</div>
               		</div>
               </div>
			</div>
			<div class="modal-footer">
				<div class="col-md-5 colm-form-btns pull-right">
                    <div class="pull-right">
                        <button type="button" id="btn-cancelar" data-dismiss="modal" class="btn btn-cancel" >Cancelar</button>
                        <button type="submit" id="btn-agregar" data-dismiss="modal" class="btn btn-submit">Agregar</button>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>