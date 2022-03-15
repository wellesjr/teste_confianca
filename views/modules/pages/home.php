<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="page-heading">
                        <span>Bem vindos</span>
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                class="btn btn-sm btn-outline-primary">Fechar</i></a>
                    </div>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>

                    <li class="sidebar-item active">
                        <a href="{{URL}}" class='sidebar-link'>
                            <span>Início</span>
                        </a>
                    </li>

                    <li class="sidebar-item ">
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
            <h3>Início</h3>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon purple">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Total de cadastros</h6>
                                            <h6 class="font-extrabold mb-0">{{total}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon blue">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Novos Cadastros</h6>
                                            <h6 class="font-extrabold mb-0">{{novos}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>