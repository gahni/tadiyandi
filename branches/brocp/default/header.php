<?php if (!defined('FLUX_ROOT')) exit; ?>
<!DOCTYPE html>
<html>
	<head>
<link rel="icon" href="http://bohol.ro-online.net/favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="http://bohol.ro-online.net/favicon.ico" type="image/x-icon"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?php if (isset($metaRefresh)): ?>
		<meta http-equiv="refresh" content="<?php echo $metaRefresh['seconds'] ?>; URL=<?php echo $metaRefresh['location'] ?>" />
		<?php endif ?>
		<title><?php echo Flux::config('SiteTitle'); if (isset($title)) echo ": $title" ?></title>
		<link rel="stylesheet" href="<?php echo $this->themePath('css/flux.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
		<link rel="stylesheet" href="<?php echo $this->themePath('css/style.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
		<link href="<?php echo $this->themePath('css/flux/unitip.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
		<?php if (Flux::config('EnableReCaptcha')): ?>
		<link href="<?php echo $this->themePath('css/flux/recaptcha.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
		<?php endif ?>
		<script type="text/javascript" src="<?php echo $this->themePath('js/jquery-1.8.3.min.js') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/flux.datefields.js') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/flux.unitip.js') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/jquery.cycle.all.js') ?>"></script>
		<script type="text/javascript"> $(document).ready(function(){$('#sliderShow').cycle({ fx: 'scrollRight', easing:  'easeInCirc' }); $('.money-input').keyup(function() {var creditValue = parseInt($(this).val() / <?php echo Flux::config('CreditExchangeRate') ?>, 10); if (isNaN(creditValue)) $('.credit-input').val('?'); else $('.credit-input').val(creditValue); }).keyup(); $('.credit-input').keyup(function() {var moneyValue = parseFloat($(this).val() * <?php echo Flux::config('CreditExchangeRate') ?>); if (isNaN(moneyValue)) $('.money-input').val('?'); else $('.money-input').val(moneyValue.toFixed(2)); }).keyup(); processDateFields(); }); function reload(){window.location.href = '<?php echo $this->url ?>'; } </script> <script type="text/javascript"> function updatePreferredServer(sel){var preferred = sel.options[sel.selectedIndex].value; document.preferred_server_form.preferred_server.value = preferred; document.preferred_server_form.submit(); } var spinner = new Image(); spinner.src = '<?php echo $this->themePath('img/spinner.gif') ?>'; function refreshSecurityCode(imgSelector){$(imgSelector).attr('src', spinner.src); var clean = <?php echo Flux::config('UseCleanUrls') ? 'true' : 'false' ?>; var image = new Image(); image.src = "<?php echo $this->url('captcha') ?>"+(clean ? '?nocache=' : '&nocache=')+Math.random(); $(imgSelector).attr('src', image.src); } function toggleSearchForm() {$('.search-form').slideToggle('fast'); } </script> <?php if (Flux::config('EnableReCaptcha') && Flux::config('ReCaptchaTheme')): ?> <script type="text/javascript"> var RecaptchaOptions = {theme : '<?php echo Flux::config('ReCaptchaTheme') ?>'}; </script> <?php endif ?>
	</head>
	<body>

		<?php $EADev = include('main/EADevConfig.php'); ?>

		<div id="wrapper">
			<div id="main">
				<div id="navigation">
					<ul>
<br><blockquote>&nbsp;</blockquote><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<table align=center border="0" cellpadding="7" cellspacing="1" style="width: 200px;">
	<tbody>
		<tr>
			<td align=center><a href="<?php echo $this->url('main'); ?>" ><img src="<?php echo $this->themePath('img/home.png'); ?>" /></a></td>
		</tr>
		<tr>
			<td align=center><a href="<?php echo $this->url('main','download'); ?>" ><img src="<?php echo $this->themePath('img/downloads.png'); ?>" /></a></td>
		</tr>
		<tr>
			<td align=center><a href="<?php echo $this->url('server','info'); ?>" ><img src="<?php echo $this->themePath('img/servinfo.png'); ?>" /></a></td>
		</tr>
		<tr>
			<td align=center><a href="<?php echo $this->url('main','staff'); ?>" ><img src="<?php echo $this->themePath('img/staff.png'); ?>" /></a></td>
		</tr>
	</tbody>
</table>

					</ul>
					<div class="clear"></div>
				</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


				<div class="containerMain">
					<div id="header">
						<div class="serverStatus">
							<?php include('main/status.php'); ?>
						</div>
						<div class="loginPanel">
							<?php include('main/loginpanel.php'); ?>
						</div>
						<div class="clear"></div>
					</div>
					<div id="container">
						<?php if ( $params->get('module') == 'main' AND $params->get('action') == 'index' ): ?>

						<?php else: ?>
						<div class="containerLeft">
							<?php include('main/sidebar.php'); ?>
						</div>
						<?php endif; ?>
						<div class="container<?php if( $params->get('module') == 'main' AND $params->get('action') == 'index' ) echo ""; else echo "Right"; ?>">
							<?php if ($message=$session->getMessage()): ?>
							<p class="message"><?php echo htmlspecialchars($message) ?></p>
							<?php endif ?>
							<?php include 'main/submenu.php'; ?>
							<?php include 'main/pagemenu.php' ?>
							<?php if (in_array($params->get('module'), array('donate', 'purchase'))) include 'main/balance.php' ?>