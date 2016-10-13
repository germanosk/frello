<form class="form-signin" role="form" method="post" action="<?= base_url('login/authenticate') ?>">
    <fieldset>
        <legend>Login</legend>
        <?php if (isset($erro)): ?>
            <div class="alert-box alert radius " data-alert><?php echo $erro; ?><a href="#" class="close">&times;</a></div>               
        <?php endif; ?>
        <input type="email"  placeholder="Email address" required autofocus name="email">
        <input type="password"  placeholder="Password" required name="password">
        <div class="clearfix">
            <button class="button success left" type="submit">Login</button>


            <a class="button secondary right" href="login/user_forgot_pass">Forgot you password?</a>
            <a class="button right" href="sign_up">SignUp</a>
        </div>
    </fieldset>
</form>
