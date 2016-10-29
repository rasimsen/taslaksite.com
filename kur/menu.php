<div id="header">
	<div id="head-nav">
		<ul class="nav-menu">
			<li><a href="./install.php" <?php if ($page == 'install'):?>class="navcur"<?php endif; ?> class="nav" title="<?php echo $lang['Install'] ?>"><?php echo $lang['Install'] ?></a></li>
			<li><a href="../yonetimpanel/" class="nav" title="<?php echo $lang['Admin'] ?>"><?php echo $lang['Admin'] ?></a></li>
			<li><a href="../" class="nav" title="<?php echo $lang['Home'] ?>"><?php echo $lang['Home'] ?></a></li>
		</ul>
		<div id="navbar">
			<?php if ($page == 'install'): echo $lang['Install_instruct']; endif; ?>
			<?php if ($page == 'upgrade'): echo $lang['Upgrade_instruct']; endif; ?>
			<?php if ($page == 'troubleshooter'): echo $lang['Troubleshooter_instruct']; endif; ?>
		</div>
	</div>
</div>

