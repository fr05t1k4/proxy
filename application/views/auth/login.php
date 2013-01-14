
<div class="span6 offset3" id="container">
    <h1 class="form-actions">Авторизация</h1>
    <p>
        <small>Пожалуйста авторизуйтесь используя свой электронный адрес или имя пользователя и пароль.</small>
    </p>

    <?php if ($message): ?>
        <div id="infoMessage">
            <div class="alert fade in">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <?php echo $message; ?>
            </div>

        </div>
    <?php endif; ?>
    <?php echo form_open("auth/login", 'class="form-horizontal"'); ?>


    <div class="control-group"> 
        <label class="control-label" for="identity">E-mail:</label>
        <div class="controls"><?php echo form_input($identity); ?></div>
    </div>



    <div class="control-group">
        <label class="control-label" for="password">Пароль:</label>
        <div class="controls"><?php echo form_input($password); ?></div>
    </div>


    <div class="control-group">   
        <div class="controls">
            <label for="remember" class="checkbox">
                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?>Запомни меня
            </label>
        </div>
    </div>



    <div class="form-actions">
        <?php echo form_submit('submit', 'Войти', 'class="btn"'); ?> <a href="<?php echo base_url('forgot_password') ?>">Забыли пароль?</a> / <a href="<?php echo base_url('register') ?>">Регистрация</a>
    </div>



    <?php echo form_close(); ?>


</div>