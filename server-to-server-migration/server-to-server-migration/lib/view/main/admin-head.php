<style type="text/css" media="all">
	@font-face {
		font-family: 'servmask';
		src: url('<?php echo esc_url( S2SM
_URL ); ?>/lib/view/assets/font/servmask.eot?v=<?php echo S2SM
_VERSION; ?>');
		src: url('<?php echo esc_url( S2SM
_URL ); ?>/lib/view/assets/font/servmask.eot?v=<?php echo S2SM
_VERSION; ?>#iefix') format('embedded-opentype'),
		url('<?php echo esc_url( S2SM
_URL ); ?>/lib/view/assets/font/servmask.woff?v=<?php echo S2SM
_VERSION; ?>') format('woff'),
		url('<?php echo esc_url( S2SM
_URL ); ?>/lib/view/assets/font/servmask.ttf?v=<?php echo S2SM
_VERSION; ?>') format('truetype'),
		url('<?php echo esc_url( S2SM
_URL ); ?>/lib/view/assets/font/servmask.svg?v=<?php echo S2SM
_VERSION; ?>#servmask') format('svg');
		font-weight: normal;
		font-style: normal;
	}

	[class^="s2sm
-icon-"], [class*=" s2sm
-icon-"] {
		font-family: 'servmask';
		speak: none;
		font-style: normal;
		font-weight: normal;
		font-variant: normal;
		text-transform: none;
		line-height: 1;

		/* Better Font Rendering =========== */
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
	}

	.s2sm
-icon-notification:before {
		content: "\e619";
	}

	.s2sm
-label {
		border: 1px solid #5cb85c;
		background-color: transparent;
		color: #5cb85c;
		cursor: pointer;
		text-transform: uppercase;
		font-weight: 600;
		outline: none;
		transition: background-color 0.2s ease-out;
		padding: .2em .6em;
		font-size: 0.8em;
		border-radius: 5px;
		text-decoration: none !important;
	}

	.s2sm
-label:hover {
		background-color: #5cb85c;
		color: #fff;
	}

	<?php if ( version_compare( $version, '3.8', '<' ) ) : ?>
	.toplevel_page_site-migration-export > div.wp-menu-image {
		background: none !important;
	}

	.toplevel_page_site-migration-export > div.wp-menu-image:before {
		line-height: 27px !important;
		content: '';
		background: url('<?php echo esc_url( S2SM
_URL ); ?>/lib/view/assets/img/logo-20x20.png') no-repeat center center;
		speak: none !important;
		font-style: normal !important;
		font-weight: normal !important;
		font-variant: normal !important;
		text-transform: none !important;
		margin-left: 7px;
		/* Better Font Rendering =========== */
		-webkit-font-smoothing: antialiased !important;
		-moz-osx-font-smoothing: grayscale !important;
	}

	<?php else : ?>
	.toplevel_page_site-migration-export > div.wp-menu-image:before {
		position: relative;
		display: inline-block;
		content: '';
		background: url('<?php echo esc_url( S2SM
_URL ); ?>/lib/view/assets/img/logo-20x20.png') no-repeat center center;
		speak: none !important;
		font-style: normal !important;
		font-weight: normal !important;
		font-variant: normal !important;
		text-transform: none !important;
		line-height: 1 !important;
		/* Better Font Rendering =========== */
		-webkit-font-smoothing: antialiased !important;
		-moz-osx-font-smoothing: grayscale !important;
	}

	.wp-menu-open.toplevel_page_site-migration-export,
	.wp-menu-open.toplevel_page_site-migration-export > a {
		background-color: #111 !important;
	}
	<?php endif; ?>
</style>
