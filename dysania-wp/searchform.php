	<form method="get" class="searchbox" id="searchform" action="<?php echo home_url( '/' ); ?>">
		<input type="text" class="searchtext field" name="s" id="s" />
		<input type="submit" class="button" name="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'dysaniatext'); ?>"  />
	</form>