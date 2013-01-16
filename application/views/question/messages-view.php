<div class="container" id="container">
    <legend><?php echo $question->topic ?></legend>
    <?php echo anchor('question/question_history', '[К списку обращений]') ?>
    <?php foreach ($messages as $message) { ?> 
        <div class="form-actions">
            <div class="container">
                <?php if ($message->our == 0) : ?>
                    <strong>Вы:</strong> 
                <?php else : ?>
                    <strong style="color: red;">Администрация:</strong> 
                <?php endif; ?>
            </div>
            <div class=container"><?= $message->message; ?></div>
            <div class="pull-right"><?= $message->date; ?></div>
        </div>
    <?php }; ?>
    <?php
    if (!$question->closed) :
        echo form_open(current_url(), 'class="form-horizontal"');
        ?>
        <div class="control-group">

            <textarea class="span9" rows="5" placeholder="Введите текст обращения" name="message"></textarea>
            <?php echo form_error('message') ?>
            <div class="form-horizontal">

                <input type="submit" value="Отправить" class="btn" name="submit"/>
                <input type="hidden" name="question_id" value="<?php echo $question->id ?>">
            </div>
        </div>


        <?php
        echo form_close();
    endif;
    ?>
</div>