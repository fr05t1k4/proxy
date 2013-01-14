<div class="span6 offset3" id="container">
    <h1 class="form-actions">Регистрация пользователя</h1>
    <p>Пожалуйста введите Email и пароль для пользователя.</p>
    <?php if ($message): ?>
        <div id="infoMessage" class="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <?php echo form_open("auth/create_user", 'class="form-horizontal"'); ?>


    <div class="control-group">
        <div class="control-label">Email</div> 
        <div class="controls"><?php echo form_input($email); ?></div>
    </div>
    <div class="control-group">
        <div class="control-label">Пароль</div> 
        <div class="controls"><?php echo form_input($password); ?></div>
    </div>
    <div class="control-group">
        <div class="control-label">Подтвердите пароль</div> 
        <div class="controls"><?php echo form_input($password_confirm); ?></div>
    </div>



    <div class="form-actions">
        <?php echo form_submit('submit', 'Зарегистрироваться', 'class="btn"'); ?>
    </div>

    <?php echo form_close(); ?>
</div>