<?= $this->extend('default') ?>

<?= $this->section('content') ?>

    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <?php $validation = \Config\Services::validation(); ?>

                    <?= form_open('zoho/login') ?>
                        <div class="mb-3">
                            <label for="callbox" class="form-label">Callbox</label>
                            <input type="text" class="form-control" id="callbox" name="callbox" value="<?= set_value('callbox') ?>">
                            <!-- Error -->
                            <?php if ($validation->getError('callbox')): ?>
                                <div class='form-text text-danger mt-2'>
                                    <?= $error = $validation->getError('callbox'); ?>
                                </div>
                            <?php endif ?>
                        </div>

                        <div class="mb-3">
                            <label for="user" class="form-label">Administrador</label>
                            <input type="text" class="form-control" id="user" name="user" value="<?= set_value('user') ?>">
                            <!-- Error -->
                            <?php if ($validation->getError('user')): ?>
                                <div class='form-text text-danger mt-2'>
                                    <?= $error = $validation->getError('user'); ?>
                                </div>
                            <?php endif ?>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?= set_value('password') ?>">
                            <!-- Error -->
                            <?php if ($validation->getError('password')): ?>
                                <div class='form-text text-danger mt-2'>
                                    <?= $error = $validation->getError('password'); ?>
                                </div>
                            <?php endif ?>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Avançar</button>
                        </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>