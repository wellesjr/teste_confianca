<body>
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

            <li class="sidebar-item active ">
              <a href='{{URL}}/novo' class='sidebar-link'>
                <span>Cadastrar novo cliente</span>
              </a>
            </li>

            <li class="sidebar-item ">
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
        <h3>Cadastro de Cliente</h3>
      </div>

      <section id="multiple-column-form">
        <div class="row match-height">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Cadastrar novo Cliente</h4>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <form class="form" method="post">
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
                      <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">
                          Salvar
                        </button>
                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                          Limpar
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>

</html>