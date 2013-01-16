<div id="container" class="container">

    <legend>История Ваших обращений</legend>
    <p><a href="<?php echo base_url('question/ask_question'); ?>" class="btn">Написать новое обращение</a></p>
    <table class="table table-striped">
        <tr>
            <th>ID обращения</th>
            <th>Тема</th>
            <th>Дата обращения</th>
            <th>Активна</th>
            <th></th>
        </tr>

        <?php foreach ($topics as $row): ?>
            <tr>
                <td class="span1">
                    <?= $row->id; ?>
                </td>
                <td>
                    <a href="<?php echo base_url('question/messages/' . $row->id) ?>"><?= $row->topic; ?></a> <?php echo ($row->count_unread > 0) ? '(' . $row->count_unread . ')' : '' ?>
                </td>
                <td class="span1">
                    <?= $row->date; ?>
                </td>
                <td class="span1">
                    <?= ($row->closed == 1) ? 'Закрыта' : 'Открыта' ?>
                </td>
                <td class="span1">
                    <?php
                    if ($this->ion_auth->is_admin())
                        if ($row->closed == 0):
                            ?>
                            <a href="<?php echo base_url('question/close/' . $row->id) ?>" class="btn">Закрыть</a>
                        <?php else: ?>
                            <a href="<?php echo base_url('question/open/' . $row->id) ?>"  class="btn">Открыть</a>
    <?php endif; ?>
                </td>
            </tr>
<?php endforeach; ?>
    </table>
</div>