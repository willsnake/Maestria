<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'class' => 'form-control',
	'placeholder' => 'Email o Usuario',
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'class' => 'form-control',
	'placeholder' => 'Contraseña',
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'placeholder' => 'Contraseña',
);
?>
<!DOCTYPE html>
<html lang="es">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Maestria</title>

	<!-- Bootstrap Core CSS -->
	<link href="<?= base_url("css/bootstrap.min.css") ?>" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="<?= base_url("css/plugins/metisMenu/metisMenu.min.css") ?>" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="<?= base_url("css/sb-admin-2.css") ?>" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="<?= base_url("font-awesome-4.2.0/css/font-awesome.min.css") ?>" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body>

<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Please Sign In</h3>
				</div>
				<div class="panel-body">
					<?php echo form_open($this->uri->uri_string(), array( "role" => "form" )); ?>
						<fieldset>
							<div class="form-group">
								<?php echo form_input($login ); ?>
								<div style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></div>
							</div>
							<div class="form-group">
								<?php echo form_password($password); ?>
								<div style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></div>
							</div>

							<?php if ($show_captcha) {
								if ($use_recaptcha) { ?>
							<div class="form-group">
								<div id="recaptcha_image"></div>
							</div>
							<div class="form-group">
								<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
								<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
								<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
							</div>
							<div class="form-group">
								<div class="recaptcha_only_if_image">Enter the words above</div>
								<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
							</div>
							<div class="form-group">
								<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" />
								<div style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></div>
							</div>
							<div class="form-group">
								<?php echo $recaptcha_html; ?>
							</div>
							<?php } else { ?>
							<div class="form-group">
								<p>Enter the code exactly as it appears:</p>
								<?php echo $captcha_html; ?>
							</div>
							<div class="form-group">
								<?php echo form_input($captcha); ?>
								<div style="color: red;"><?php echo form_error($captcha['name']); ?></div>
							</div>
								<?php }
							} ?>
							<div class="form-group" style="text-align: center;">
								<?php echo form_checkbox($remember); ?>
								<?php echo form_label('Mantener Sesión', $remember['id']); ?>
							</div>
							<div class="form-group" style="text-align: center;">
								<?php echo anchor('/auth/forgot_password/', '¿Olvidó su contraseña?'); ?>
								<?php if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Registrarse'); ?>
							</div>
						</fieldset>
						<?php echo form_submit(array("name" => "submit", "class" => "btn btn-lg btn-success btn-block"), 'Entrar'); ?>
						<?php echo form_close(); ?>

						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- jQuery -->
<script src="<?= base_url("js/jquery.min.js") ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url("js/bootstrap.min.js") ?>"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?= base_url("js/plugins/metisMenu/metisMenu.min.js") ?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?= base_url("js/sb-admin-2.js") ?>"></script>

</body>

</html>