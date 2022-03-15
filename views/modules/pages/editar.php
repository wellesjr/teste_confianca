<!-- ---------------------------------------------------Basic Modal---------------------------------------------------------------------------------- -->

<div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm role=" document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title white" id="myModalLabel1">Atenção</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">
        <p>
          Você realmente deseja excluir esse cadastro?
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
          <i class="bx bx-check d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Sim</span>
        </button>
        <button type="button" class="btn btn-light-secondary me-1 mb-1" data-bs-dismiss="modal">
          <i class="bx bx-x d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Não</span>
        </button>
      </div>
    </div>
  </div>
</div>

<!-- ---------------------------------------------MODAL FORM ------------------------------------------------------- -->
<div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h4 class="modal-title white" id="myModalLabel33">Editar Cadastro </h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <form action="#">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="first-name-column">Nome Completo</label>
                <input type="text" id="first-name-column" class="form-control" placeholder="Nome Completo" name="name_cliente" required />
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="last-name-column">CPF</label>
                <input type="text" id="last-name-column" class="form-control" placeholder="CPF" name="cpf_cliente" required />
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="city-column">Cidade</label>
                <input type="text" id="city-column" class="form-control" placeholder="Cidade" name="cidade_cliente" />
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="country-floating">Estado</label>
                <input type="text" id="country-floating" class="form-control" name="estado_cliente" placeholder="Estado" />
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="company-column">Telefone</label>
                <input type="text" id="company-column" class="form-control" name="telefone_cliente" placeholder="Telefone" />
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
                <label for="email-id-column">E-mail</label>
                <input type="email" id="email-id-column" class="form-control" name="email_cliente" placeholder="E-mail" required />
              </div>
            </div>
          </div>
        </div>
        <div class=" modal-footer">
          <button type="submit" class="btn btn-primary me-1 mb-1">
            <i class="bx bx-check d-block d-sm-none"></i>
            Salvar
          </button>
          <button type="reset" class="btn btn-light-secondary me-1 mb-1" data-bs-dismiss="modal">
            Cancelar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--__________________________________________________________________________________________________________________________________________________________-->
<div id="app">
  <div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
      <div class="sidebar-header">
        <div class="d-flex justify-content-between">
          <div class="page-heading">
            <span>Bem vindos</span>
          </div>
          <div class="toggler">
            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="btn btn-sm btn-outline-primary">Fechar</i></a>
          </div>
        </div>
      </div>
      <div class="sidebar-menu">
        <ul class="menu">
          <li class="sidebar-title">Menu</li>

          <li class="sidebar-item">
            <a href="{{URL}}" class='sidebar-link'>
              <span>Início</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a href='{{URL}}/novo' class='sidebar-link'>
              <span>Cadastrar novo cliente</span>
            </a>
          </li>

          <li class="sidebar-item active">
            <a href="{{URL}}/editar" class='sidebar-link'>
              <span>Editar Cadastro</span>
            </a>
          </li>
        </ul>
      </div>
      <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
  </div>
  <div id="main">
    <header class="mb-3">
      <a href="#" class="burger-btn d-block d-xl-none">
        <i class="btn btn-sm btn-outline-primary">Menu</i>
      </a>
    </header>
    <div class="page-heading">
      <div class="page-title">
        <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Editar cadastro de clientes</h3>
          </div>
        </div>
      </div>
      <section class="section">
        <div class="card">
          <div class="card-header">Listar cliente</div>
          <div class="card-body">
            <table class="table table-striped" id="table1">
              <thead>
                <tr>
                  <th>Nº</th>
                  <th>Nome</th>
                  <th>CPF</th>
                  <th>Cidade</th>
                  <th>Telefone</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
                {{cadastros}}
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>