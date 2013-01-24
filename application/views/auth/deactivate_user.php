<div class="container" id="container">
    <h1>Деактивация пользователя</h1>
    <p>Вы уверены что хотите деактивировать пользователя '<?php echo $user->username; ?>'</p>
    <?php echo form_open("auth/deactivate/" . $user->id, 'class="form-horizontal"'); ?>

    <div class="control-group">
        <div class="controls">
            <label for="confirm" class="radio">Да
                <input type="radio" name="confirm" value="yes" checked="checked" />
            </label>
            <label for="confirm" class="radio">Нет
                <input type="radio" name="confirm" value="no" /></label>
        </div>
    </div>

    <?php echo form_hidden($csrf); ?>
    <?php echo form_hidden(array('id' => $user->id)); ?>

    <div class="form-actions"><?php echo form_submit('submit', 'Применить', 'class="btn"'); ?></div>

    <?php echo form_close(); ?>
</div>