<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="loginModalLabel">Inicio de sesión</h3>
        <p>Porfavor ingrese el código de su oficina</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="oficina_login">
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
            <label for="officeCode">Código de oficina</label>
            <input id="officeCode" type="text" name="officeCode" class="form-control" placeholder="Nombre de usuario">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </div>
      </form>
    </div>
  </div>
</div>