<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Proxy.lc - продажа socks,http proxy">
        <meta name="keywords" content="Proxy.lc - продажа socks,http proxy">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Быстро, дешево, ахунно!</title>
        <link href="<?php echo base_url('favicon.ico') ?>" rel="icon" type="image/x-icon">
        <link href="<?php echo base_url('css/css-reset.css?updated=' . filemtime('css/css-reset.css')) ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/bootstrap.min.css?updated=' . filemtime('css/bootstrap.css')) ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/bootstrap-responsive.css?updated=' . filemtime('css/bootstrap-responsive.css')) ?>" rel="stylesheet">
        <link href="<?php echo base_url('css/style.css?updated=' . filemtime('css/style.css')) ?>" rel="stylesheet">
        <script>var base = '<?php echo base_url() ?>';</script>
        <?php if (ENVIRONMENT == 'development'): ?>
            <script src="<?php echo base_url('js/jquery/main.js?updated=' . filemtime('js/jquery/main.js')) ?>"></script>
            <script src="<?php echo base_url('js/jquery/form.js?updated=' . filemtime('js/jquery/form.js')) ?>"></script>
        <?php else : ?>
            <script src="<?php echo base_url('js/jquery/main.min.js?updated=' . filemtime('js/jquery/main.js')) ?>"></script>
            <script src="<?php echo base_url('js/jquery/form.min.js?updated=' . filemtime('js/jquery/form.js')) ?>"></script>
        <?php endif; ?>
        <script src="<?php echo base_url('js/bootstrap.js?updated=' . filemtime('js/bootstrap.js')) ?>"></script>
    </head>
    <body>
        <div class="navbar row-fluid navbar-static-top">

            <div class="navbar-inner  ">
                <div class="container">

                    <a class="brand" href="<?php echo base_url(); ?>">Ай да прокси</a>
                    <ul class="nav">
                        <li class="active"><a href="<?php echo base_url(); ?>">Главная</a></li>
                        <li><a href="<?php echo base_url('tariff') ?>">Тарифы</a></li>
                        <li><a href="<?php echo base_url('contacts') ?>">Контакты</a></li>

                    </ul>
                    <?php
                    $user = $this->ion_auth->user()->row();
                    if (empty($user)):
                        ?>
                        <ul class="nav pull-right">
                            <li><a href="<?php echo base_url('register') ?>" data-toggle="modal">Регистрация</a></li>
                            <li><a href="#auth-modal" data-toggle="modal">Войти</a></li>

                        </ul>
                        <div class="modal hide fade" id="auth-modal">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h3>Авторизация</h3>
                            </div>
                            <form class="form-horizontal" action="<?php echo base_url('login'); ?>" method="post">
                                <div class="modal-body">

                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail">Email</label>
                                        <div class="controls">
                                            <?php
                                            echo form_input(array('name' => 'identity',
                                                'id' => 'identity',
                                                'type' => 'text',));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputPassword">Пароль</label>
                                        <div class="controls">
                                            <?php
                                            echo form_input(array('name' => 'password',
                                                'id' => 'password',
                                                'type' => 'password',)
                                            );
                                            ?>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <label class="checkbox">
                                                <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?> Запомни меня
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <input type="submit" href="#" class="btn" value="Войти" />

                                </div>
                        </div>
                        </form>
                    </div>
                <?php else: ?>
                    <ul class="nav pull-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->email ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <?php if ($this->ion_auth->is_admin()): ?>
                                    <li><a href="<?php echo base_url('adminitration'); ?>">Администрирование</a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo base_url('tariff'); ?>">Тарифы</a></li>
                                <li><a href="<?php echo base_url('question/question_history'); ?>">Обратная связь <?php echo ($this->header_model->get_unread_messages() == 0) ? '' : '(' . $this->header_model->get_unread_messages() . ')' ?></a></li>
                                <li><a href="<?php echo base_url('auth/change_password'); ?>">Сменить пароль</a></li>
                                <li><a href="<?php echo base_url('auth/logout'); ?>">Выйти</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>

        </div>
    </div>
    <div class="row-fluid">


