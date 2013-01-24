<div class="container" id="container">    
    <h1>Редактирование группы</h1>
    <p>Пожалуйста введите информацию о группе.</p>

    <div id="infoMessage"><?php echo $message; ?></div>

    <?php echo form_open(current_url(), 'class="form-horizontal"'); ?>
    <div class="control-group">
        <label class="control-label">Имя группы</label>
        <div class="controls"><?php echo form_input($group_name); ?></div>
    </div>
    <div class="control-group">
        <label class="control-label">Описание группы</label>
        <div class="controls"><?php echo form_input($group_description); ?></div>
    </div>
    <div class="form-actions">
        <?php echo form_submit('submit', 'Сохранить группу', 'class="btn"'); ?><a href="<?= base_url('auth') ?>" class="btn">Назад</a>
    </div>

    <?php echo form_close(); ?>
</div>