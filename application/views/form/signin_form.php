<form class="form-signin" role="form" method="post" action="<?= base_url('login/new_user_registration') ?>">
    <fieldset>
        <legend>Sign up</legend>
        <?php if (isset($v_errors)):?>
            <div class="alert-box alert radius " data-alert><?php echo $v_errors; ?><a href="#" class="close">&times;</a></div>               
        <?php endif; ?>
        <?php if (isset($message_display)): ?>
            <div class="alert-box alert radius " data-alert><?php echo $message_display; ?><a href="#" class="close">&times;</a></div>               
        <?php endif; ?>
        <input type="text"placeholder="Name" required autofocus name="name">
        <input type="email"  placeholder="Email address" required autofocus name="email">
        <input type="password"  placeholder="Password" required name="pass">
        <input type="password"  placeholder="Confirm Password" required name="pass_ver">
        <button class="button success left" type="submit">Register</button>
        <a class="button alert right" href="<?=base_url("/")?>">Cancel</a>
    </fieldset>
</form>
