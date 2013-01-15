<div id="container" class="container">

    <legend>Обратная связь</legend>

        <?=form_open('question/ask_question', 'class="form-horizontal"'); ?>
        <div class="control-group">
            <label class="control-label">Тема:</label>
            <div class="controls">
                <?php
                echo form_input(array(
                    'name' => 'topic',
                    'value' => set_value('topic'),
                    'type' => 'text',
                    'class' => 'span6',
                    'placeholder' => 'Введите тему обращения'
                        )
                );
                ?>
                <?php echo form_error('topic') ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Сообщение:</label>
            <div class="controls">
                <?php
                echo form_textarea(array(
                    'name' => 'message',
                    'rows' => '7',
                    'cols' => '40',
                    'value' => set_value('message'),
                    'class' => 'span6',
                    'placeholder' => 'Кратко опишите ситуацию'
                ));
                ?>
                <?php echo form_error('message') ?>
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" class="btn"  value="Отправить сообщение" name="submit" />
        </div>
   
</form> 

<a href="<?php echo base_url('/question/question_history') ?>">Посмотреть историю сообщений</a>      

</div>