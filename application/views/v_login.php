<?php $this->load->view("/templates/header.php"); ?>
<div id="container row">
    <div class="columns">
	<h1><?=$this->lang->line('header_login') ?></h1>
        <?php $this->load->view("/form/v_login_form.php"); ?>
    </div>
</div>
<?php $this->load->view("/templates/footer.php"); ?>