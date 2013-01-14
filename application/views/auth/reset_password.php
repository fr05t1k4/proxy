<div class="span6 offset3" id="container">
    <h1 class="form-actions">Смена пароля</h1>

    <div id="infoMessage"><?php echo $message; ?></div>

    <?php echo form_open('auth/reset_password/' . $code, 'class="form-horizontal"'); ?>

    <div class="control-group">
        <label class="control-label">Новый пароль: (минимум <?php echo $min_password_length; ?> символов)</label>
        <div class="controls"><?php echo form_input($new_password); ?></div>
    </div>


    <div class="control-group">
        <label class="control-label">Подтверждение:</label>
        <div class="controls"><?php echo form_input($new_password_confirm); ?></div>
    </div>


    <?php echo form_input($user_id); ?>
    <?php echo form_hidden($csrf); ?>

    <div class="form-actions"><?php echo form_submit('submit', 'Сменить', 'class="btn"'); ?></div>

    <?php echo form_close(); ?>
</div>