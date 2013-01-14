<div class="span6 offset3" id="container">
    
<h1 class="form-actions">Смена пароля</h1>
<?php if ($message): ?>
<div id="infoMessage" class="alert"><?php echo $message;?></div>
<?php endif; ?>

<?php echo form_open("auth/change_password", 'class="form-horizontal"');?>

      <div class="control-group">
          <label for="" class="control-label">Старый пароль:</label>
          <div class="controls"><?php echo form_input($old_password);?></div>
      </div>
      <div class="control-group">
          <label for="" class="control-label">Новый пароль (минимум <?php echo $min_password_length;?> символов):</label>
          <div class="controls"><?php echo form_input($new_password);?></div>
      </div>
      <div class="control-group">
          <label for="" class="control-label">Подтвердите пароль:</label>
          <div class="controls"><?php echo form_input($new_password_confirm);?></div>
      </div>
      <?php echo form_input($user_id);?>
      <div class="form-actions"><?php echo form_submit('submit', 'Изменить', 'class="btn"');?></div>
      
<?php echo form_close();?>
</div>