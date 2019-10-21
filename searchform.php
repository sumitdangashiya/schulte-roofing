<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-field" value="<?php echo  get_search_query(); ?>" name="s" placeholder="Search" />
	<button type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" ></button>
</form>

