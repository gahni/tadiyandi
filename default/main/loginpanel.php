<?php if (!defined('FLUX_ROOT')) exit; ?>
<?php if (!$session->isLoggedIn()): ?>      
	<form action="<?php echo $this->url('account', 'login', array('return_url' => $params->get('return_url'))) ?>" method="post" autocomplete="off">
	<input type="hidden" name="server" value="<?php echo htmlspecialchars($session->loginAthenaGroup->serverName) ?>">
	<div class="loginRow">
		<div class="loginLeft">
			<table cellspacing="0" cellpadding="0">
				<tr><td><input type="text" name="username" class="inputClass" placeholder="Username.." autocomplete="off" /></td></tr>
				<tr><td><input type="password" name="password" class="inputClass" placeholder="Password.." /></td></tr>
				<tr>
					<td><a href="<?php echo $this->url('account','resetpass'); ?>"><font size=-2>Forgot Password?</a> | <a href="<?php echo $this->url('account','create'); ?>">Create Account</font></a></td>
				</tr>
			</table>
		</div>
		<div class="loginRight">
			<input type="submit" value=" " class="loginBtn" />
		</div>
	</div>
	</form>
<?php else:?>
	<div class="loggedIn">
		You are currently logged in as <strong><a href="<?php echo $this->url('account', 'view') ?>" title="View account"><?php echo htmlspecialchars($session->account->userid) ?></a></strong> on <?php echo htmlspecialchars($session->serverName) ?>. <br/><br/>
		<div class="accountButtons">
			<a href="<?php echo $this->url('account','view')?>">My Account</a>
			<a class="logout" href="<?php echo $this->url('account','logout')?>" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
		</div>
	</div>
<?php endif?>
