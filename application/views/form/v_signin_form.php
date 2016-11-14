<?php
        lang_load(array('form_view','button_view'));
?>

<form class="form-signin" role="form" method="post" action="<?= base_url('sign_up') ?>">
    <fieldset>
        <?php
        
        $errors = validation_errors();
              if ($errors):?>
            <div class="alert-box alert radius " data-alert><?php echo $errors; ?><a href="#" class="close">&times;</a></div>               
        <?php endif; ?>
        <?php if (isset($message_display)): ?>
            <div class="alert-box alert radius " data-alert><?php echo $message_display; ?><a href="#" class="close">&times;</a></div>               
        <?php endif; ?>
        <input name="name" type="text"placeholder="<?=$this->lang->line('label_name') ?>" value="<?php echo set_value('name'); ?>" required autofocus>
        <input name="email" type="email"  placeholder="<?=$this->lang->line('label_email') ?>" value="<?php echo set_value('email'); ?>" required autofocus>
        <input name="confirm_email" type="email"  placeholder="<?=$this->lang->line('label_confirm_email') ?>" value="<?php echo set_value('confirm_email'); ?>" required autofocus>
        <input name="password" type="password"  placeholder="<?=$this->lang->line('label_password') ?>" required>
        <input name="confirm_password" type="password"  placeholder="<?=$this->lang->line('label_confirm_password') ?>" required>
        <button class="button success left" type="submit"><?=$this->lang->line('button_register') ?></button>
        <a class="button alert right" href="<?=base_url("/")?>"><?=$this->lang->line('button_cancel') ?></a>
    </fieldset>
</form>
