<div class="modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="loginModalLabel">Inicio de sesión</h3>
        <p>Porfavor ingrese el código de su oficina</p>
      </div>
      <form id="oficina_login">
        <div class="modal-body">
          <div class="modal-loader" id="loaderLogin">
            <div class="sp-box">
              <div class="sp sp1"></div>
              <div class="sp sp2"></div>
              <div class="sp sp3"></div>
              <div class="sp sp4"></div>
            </div>
          </div>
          <div id="form_clave" class="container-fluid">
            <div class="row">
              <div class="col-md-9">
                <input id="officeCode" type="password" name="officeCode" class="form-control" placeholder="Código de oficina" required>
              </div>
              <div class="col-md-2">
                <button type="button" style="background-color: transparent; border-color: transparent;" id="visualizar">
                  <i id="ojo" class="fas fa-eye"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="btnLogin" type="submit" class="btn btn-primary">Iniciar sesión</button>
        </div>
      </form>
    </div>
  </div>
</div>