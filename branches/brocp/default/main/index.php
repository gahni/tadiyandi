<?php if (!defined('FLUX_ROOT')) exit; ?>
<div class="indexPage">
	<div class="indexTop">
		<div class="newsArea">
			<h2><?php echo $EADev['serverName']; ?> News Board</h2>
			<?php echo file_get_contents( "http://bohol.ro-online.net/themes/default/main/bronews.htm" ); ?>
		</div>
		<div class="sliderArea">
			<div>
				<div id="sliderShow">
					<?php foreach ($EADev['sliders'] as $sliders ) { $slider = explode(",", $sliders); ?>
					<div>
						<img src="<?php echo $this->themePath('img/' . $slider[0]); ?>" alt="" />
						<p>
							<?php echo $slider[1]; ?>
						</p>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="indexBottom">
		<div class="videoArea">
			<?php echo $EADev['youtube-video']; ?>
		</div>
		<div class="woeSchdArea">
			<div class="woeSchd">
				<h2>WoE Schedule</h2>
				<table cellspacing="0" cellpadding="0">
					<?php foreach ( $EADev['woeSchd'] as $key => $value) { ?>
					<tr>
						<td><?php echo $key; ?></td>
						<td><?php echo $value; ?></td>
					</tr>
					<?php } ?>
				</table>
			</div>
			<div class="database">
				<h2><?php echo $EADev['serverName']; ?> Database</h2>
				<form action="<?php echo $this->url; ?>" autocomplete="off">
				<div class="databaseRadio">
					<table cellspacing="0" cellpadding="0">
						<tr>
							<td>
								<input type="radio" id="item" name="searchfor" value="item" checked="checked" />
								<label for="item"><span>Item Search</span></label>
							</td>
							<td>
								<input type="radio" id="monster" name="searchfor" value="monster" />
								<label for="monster"><span>Monster Search</span></label>
							</td>
						</tr>	
					</table>
				</div>
				<div class="inputBoxes">
					<input type="text" name="name" placeholder="Enter Name" autocomplete="off">
					<input type="submit" name="searchDatabase" class="searchButton">
					<div class="clear"></div>
				</div>
				</form>
			</div>
		</div>
		<div class="otherButtons">
			<ul>
				<li><a href="<?php echo $this->url('main'); ?>"><img src="<?php echo $this->themePath('img/otherButtons.png'); ?>" alt="Vote"></a></li>
				<li><a href="<?php echo $EADev['rms']; ?>"><img src="<?php echo $this->themePath('img/otherButtons.png'); ?>" alt="Review Us"></a></li>
			</ul>
		</div>
		<div class="faceBook">
			<?php echo '<iframe src="//www.facebook.com/plugins/likebox.php?href= ' . urlencode($EADev['facebook-page']) . '&amp;width=233&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:233px; height:258px;" allowTransparency="true"></iframe>'; ?>
		</div>
		<div class="clear"></div>
	</div>
</div>