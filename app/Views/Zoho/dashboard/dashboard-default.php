<?= $this->extend('default') ?>

<?= $this->section('content') ?>

    <div class="row">
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">L5 Networks</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                    <a class="nav-link px-3" href="<?= url_to('auth.logout') ?>">Sair
                        <i class="fa-duotone fa-right-from-bracket fa-fw ms-1"></i>
                    </a>
                </div>
            </div>
        </header>
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3 sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="<?= url_to('dashboard.index') ?>">
                                    <i class="fa-duotone fa-house fa-fw me-1"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= url_to('dashboard.users') ?>#">
                                    <i class="fa-duotone fa-users fa-fw me-1"></i>
                                    Usuários
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= url_to('dashboard.settings') ?>">
                                    <i class="fa-duotone fa-gear fa-fw me-1"></i>
                                    Configurações
                                </a>
                            </li>
                        </ul>

                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                            <span>Saved reports</span>
                            <a class="link-secondary" href="#" aria-label="Add a new report">
                                <i class="fa-duotone fa-plus"></i>
                            </a>
                        </h6>
                        <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.l5.com.br/" target="_blank">
                                    <i class="fa-duotone fa-circle-info fa-fw me-1"></i>
                                    Sobre L5 Networks
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <?= $this->renderSection('dashboard-content') ?>

            </div>
        </div>
    </div>

<?= $this->endSection() ?>