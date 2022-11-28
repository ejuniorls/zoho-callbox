<?= $this->extend('Zoho/dashboard/dashboard-default') ?>

<?= $this->section('dashboard-content') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="chartjs-size-monitor">
            <div class="chartjs-size-monitor-expand">
                <div class=""></div>
            </div>
            <div class="chartjs-size-monitor-shrink">
                <div class=""></div>
            </div>
        </div>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">btn 1</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">btn 2</button>
                </div>
            </div>
        </div>

        <h3>Início</h3>

        <div class="row row-cols-1 row-cols-md-4 g-2">
            <div class="col">
                <div class="card h-100 text-bg-light mb-3 bg-light">
                    <div class="card-body">
                        <h5 class="card-title">Zoho x Callbox</h5>
                        <p class="card-text">Integração Zoho PhoneBridge com Callbox.</p>

                    </div>
                    <div class="card-footer bg-light border-top-0">
                        <div class="d-grid gap-2">
                            <a class="btn btn-primary" href="<?= $zohoUrl ?>" role="button">Habilitar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>


<?= $this->endSection() ?>