<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Proxy.lc - продажа socks,http proxy">
        <meta name="keywords" content="Proxy.lc - продажа socks,http proxy">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ПРодажа socks, http rpoxy</title>
        <link href="<?= base_url('favicon.ico') ?>" rel="icon" type="image/x-icon">
        <link href="<?= base_url('css/css-reset.css?updated=' . filemtime('css/css-reset.css')) ?>" rel="stylesheet">
        <link href="<?= base_url('css/bootstrap.css?updated=' . filemtime('css/bootstrap.css')) ?>" rel="stylesheet">
        <link href="<?= base_url('css/bootstrap-responsive.css?updated=' . filemtime('css/bootstrap-responsive.css')) ?>" rel="stylesheet">
        <link href="<?= base_url('css/jquery.css?updated=' . filemtime('css/jquery.css')) ?>" rel="stylesheet">
        <link href="<?= base_url('css/style.css?updated=' . filemtime('css/style.css')) ?>" rel="stylesheet">
        <script>var base = '<?= base_url() ?>';</script>
        <?php if (ENVIRONMENT == 'development'): ?>
            <script src="<?= base_url('js/jquery/main.js?updated=' . filemtime('js/jquery/main.js')) ?>"></script>
            <script src="<?= base_url('js/jquery/form.js?updated=' . filemtime('js/jquery/form.js')) ?>"></script>
        <?php else : ?>
            <script src="<?= base_url('js/jquery/main.min.js?updated=' . filemtime('js/jquery/main.js')) ?>"></script>
            <script src="<?= base_url('js/jquery/form.min.js?updated=' . filemtime('js/jquery/form.js')) ?>"></script>
        <?php endif; ?>
        <script src="<?= base_url('js/bootstrap/bootstrap.js?updated=' . filemtime('js/bootstrap/bootstrap.js')) ?>"></script>
    </head>
    <body>
    