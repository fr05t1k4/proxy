<div class="container" id="container">
    <?php echo form_open('https://secure.onpay.ru/pay/idaproxy_ru') ?>
    <?php echo form_hidden('price', 100) ?>
    <?php echo form_hidden('currency', 'TST') ?>
    <?php echo form_hidden('convert', 'yes') ?>
    <?php echo form_hidden('pay_mode', 'fix') ?>
    <?php echo form_hidden('pay_for', '111000') ?>
    <?php echo form_hidden('user_email', 'fr05t1k4@gmail.com') ?>
    <?php $res = strtoupper(md5("fix;100.0;TST;111000;yes;rcVAYxkqJ7A"));?>
    <?php echo form_hidden('md5', $res) ?>
    <input type="submit" class="btn" value="оплатить" />
    <?php echo form_close() ?>
</div>