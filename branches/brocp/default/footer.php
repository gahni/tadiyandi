<?php if (!defined('FLUX_ROOT')) exit; ?>
						</div> <!-- containerRight -->
					</div> <!-- container -->
					<div id="containerBottom"></div>
					<div class="clear"></div>
				</div>
				<div id="footer">
					<div class="footerNav">
						<ul>
							<li><a href="<?php echo $this->url('main'); ?>">Home</a></li>
							<li><a href="<?php echo $this->url('main','download'); ?>">Downloads</a></li>
							<li><a href="<?php echo $this->url('account','create'); ?>">Register</a></li>
							</ul>
						<br>
						<br>
						<br>
							<?php
function getClientIP() {

    if (isset($_SERVER)) {

        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
            return $_SERVER["HTTP_X_FORWARDED_FOR"];

        if (isset($_SERVER["HTTP_CLIENT_IP"]))
            return $_SERVER["HTTP_CLIENT_IP"];

        return $_SERVER["REMOTE_ADDR"];
    }

    if (getenv('HTTP_X_FORWARDED_FOR'))
        return getenv('HTTP_X_FORWARDED_FOR');

    if (getenv('HTTP_CLIENT_IP'))
        return getenv('HTTP_CLIENT_IP');

    return getenv('REMOTE_ADDR');
}

?>
<center>Notice: <i>IP Address has been logged and monitored</i><br><b><?php echo getClientIP(); ?></b></center>
					
					<div class="copyrights">
						Copyright (C) 2013 <b>Bohol Ragnarok Online (BRO)</b><br/>
						All other copyrights and trademarks are property of Gravity, and their respective owners.
					</div>
				</div>
			</div> <!-- main -->
		</div> <!-- wrapper -->
	</body>
</html>
