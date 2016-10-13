
<?php $this->load->view("/templates/header.php"); ?>

<div id="container row">
    <div class="columns">
	<h1>Welcome to Frello!</h1>
        <?php $this->load->view("/form/signin_form.php"); ?>
    </div>
</div>
<?php $this->load->view("/templates/footer.php"); ?>