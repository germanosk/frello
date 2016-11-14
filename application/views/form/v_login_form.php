<?php
        $this->lang->load(array('form_view','button_view'));
?>

<form class="form-signin" role="form" method="post" action="<?= base_url('login/authenticate') ?>">
    <fieldset>
        <legend><?=$this->lang->line('header_login') ?></legend>
        <?php if (isset($erro)): ?>
            <div class="alert-box alert radius " data-alert><?php echo $erro; ?><a href="#" class="close">&times;</a></div>               
        <?php endif; ?>
        <input type="email"  placeholder="<?=$this->lang->line('label_email') ?>" required autofocus name="email">
        <input type="password"  placeholder="<?=$this->lang->line('label_password') ?>" required name="password">
        <div class="clearfix">
            <button class="button success left" type="submit"><?=$this->lang->line('button_login') ?></button>


            <a class="button secondary right" href="login/user_forgot_pass"><?=$this->lang->line('button_forgot_password') ?></a>
            <a class="button right" href="sign_up"><?=$this->lang->line('button_signup') ?></a>
        </div>
    </fieldset>
</form>
