<div class="container" id="container">
    <h1>Редактирование пароля пользователя</h1>
    <p>Пожалуйста введите новый пароль</p>

    <div id="infoMessage"><?php echo $message; ?></div>

    <?php echo form_open(current_url(), 'class="form-horizontal"'); ?>

    <div class="control-group">
        <label class="control-label">Пароль</label>
        <div class="controls"><?php echo form_input($password); ?></div>
    </div>
    <div class="control-group">
        <label class="control-label">Подтвердите пароль</label>
        <div class="controls"><?php echo form_input($password_confirm); ?></div>
    </div>

    <?php echo form_hidden('id', $user->id); ?>
    <?php echo form_hidden($csrf); ?>

    <div class="form-actions">
        <?php echo form_submit('submit', 'Сохранить', 'class="btn"'); ?><a href="<?= base_url('auth') ?>" class="btn">Назад</a>
    </div>

    <?php echo form_close(); ?>
</div>