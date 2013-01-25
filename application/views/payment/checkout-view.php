<div class="container" id="container">
    <?php
    $this->report->show();
    if (!empty($operation) && !empty($order) && !empty($tariff)):
        ?>

        <?php echo form_open('http://secure.onpay.ru/pay/idaproxy_ru/') ?>
        <p>Вы выбрали <?php echo $tariff->count   ?> прокси </p>
        <p>На срок <?php echo $tariff->period   ?> сут. </p>
        <p>На сумму <?= $operation->sum ?> $</p>


        <?php echo form_hidden('price', number_format($operation->sum, 1, '.', '') ) ?>
        <?php echo form_hidden('currency', 'TST') ?>
        <?php echo form_hidden('convert', 'yes') ?>
        <?php echo form_hidden('pay_mode', 'fix') ?>
        <?php echo form_hidden('pay_for', $order->id) ?>
        <?php echo form_hidden('user_email', $this->ion_auth->user()->row()->email) ?>
        <?php $res = strtoupper(md5("fix;" .  number_format($operation->sum, 1, '.', '') . ";TST;" . $order->id . ";yes;". SECRET_KEY_API)); ?>
        <?php echo form_hidden('md5', $res) ?>
        <input type="submit" class="btn" value="оплатить" />
        <?php echo form_close() ?>
    <?php endif; ?>
</div>