<div class="modal fade" id="createPartida" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createPartidaLavel" aria-hidden="true">
	<div class="modal-dialog articulo-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="createPartidaLavel"> Agregar partida</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		         	<span aria-hidden="true">&times;</span>
		        </button>
			</div>
            <form action="{{route('almacen.partidas.nuevaPartida')}}" method="POST">
    			<div class="modal-body">
    				<div class="container-fluid">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <label class="col-md-2" for="partidaCta">CTA</label>
                            <label class="col-md-2 " style="margin-left: 20px;" for="partidaScta">SCTA</label>
                            <label class="col-md-2 colm-form" for="partidaSscta">SSCTA</label>
                            <label class="col-md-6 text-left colm-form" for="partidaNombre">Nombre</label>
                        </div>
                        <div class="row">
                            <input name="cta" type="text" class="col-sm-1 colm-form form-control" id="partidaCta" placeholder="Cuenta" required>
                            <input name="scta" type="text" class="col-sm-1 colm-form-md form-control" id="partidaScta" placeholder="SubCuenta" required>
                            <input name="sscta" class="col-sm-2 colm-form form-control" dir="ltr" id="partidaSscta" placeholder="Sub-SubCuenta" required>
                            <input name="nombre" type="text" class="col-md-6 colm-form form-control" id="partidaNombre" placeholder="Nombre" required>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 colm-form-md text-center" for="partidaGrupo">Grupo</label>
                            <label class="col-md-3 text-nowrap" for="partidaCtaArm">Cta Armonizada</label>
                            <label class="col-md-6 desc-cuenta text-nowrap" style="margin-left: 10px;" for="partidaNombreArm">Nombre armonizado</label>
                        </div>
                        <div class="row">
                            <input type="text" class="col-sm-2 colm-form-md form-control" id="partidaGrupo" name="grupo" placeholder="Grupo" required>
                            <input name="ctaarmo" type="text" class="col-md-3 colm-form-md form-control" id="partidaCtaArm" placeholder="Cuenta Arm." required>
                            <input name="nomarmo" type="text" class="col-md-6 colm-form form-control" id="partidaNombreArm" placeholder="Nombre Arm." required>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-5 colm-form-btns pull-right">
                        <div class="pull-right">
                            <button type="button" id="btn-cancelar" data-dismiss="modal" class="btn btn-cancel">Cancelar</button>
                            <button type="submit" id="btn-guardar" class="btn btn-submit">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
		</div>
	</div>
</div>