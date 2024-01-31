<template>
  <!-- Modal -->
  <div
    class="modal fade"
    id="ModalCliente"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
    tabindex="-1"
    aria-labelledby="clienteLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bolder" id="clienteLabel">
            Cadastrar Cliente
          </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
            style="background-color: gray; color: white"
          ></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <p class="mb-0">
                    Entre com e-mail e senha para adicionar o cliente
                  </p>
                </div>
                <div class="card-body">
                  <form role="form">
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nome</label>
                      <input type="text" class="form-control" />
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">E-mail</label>
                      <input type="email" class="form-control" />
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Senha</label>
                      <input type="password" class="form-control" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn bg-gradient-info"
            data-bs-dismiss="modal"
          >
            Fechar
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>