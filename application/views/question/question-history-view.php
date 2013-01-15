<div id="container" class="container">

    <legend>История Ваших обращений</legend>
    <table class="table table-striped">
        <tr>
            <th>ID обращения</th>
            <th>Тема</th>
            <th>Дата обращения</th>
        </tr>

        <?php foreach ($topics as $row): ?>
            <tr>
                <td class="span1">
                    <?= $row->id; ?>
                </td>
                <td>
                    <a href="<?php echo base_url('question/messages/' . $row->id)?>"><?= $row->topic; ?></a>
                </td>
                <td class="span1">
                    <?= $row->date; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>