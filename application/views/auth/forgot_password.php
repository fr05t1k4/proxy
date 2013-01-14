<div class="span6 offset3" id="container">
    <h1 class="form-actions">Забыли пароль?</h1>
    <p>Пожалуйста введите <?php echo $identity_label; ?> и мы отправим вам новый пароль.</p>

    <?php if ($message): ?>
        <div id="infoMessage">
            <div class="alert fade in">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <?php echo $message; ?>
            </div>

        </div>
    <?php endif; ?>

    <?php echo form_open("auth/forgot_password", 'class="form-horizontal"'); ?>

    <div class="control-group">
        <div class="control-label"><?php echo $identity_label; ?>: </div>
        <div class="controls"><?php echo form_input($email); ?></div>
    </div>

    <div class="form-actions"><?php echo form_submit('submit', 'Востановить', 'class="btn"'); ?></div>

    <?php echo form_close(); ?>
</div>