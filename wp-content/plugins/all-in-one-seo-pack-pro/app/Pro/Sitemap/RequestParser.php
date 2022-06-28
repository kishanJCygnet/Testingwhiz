<?php
namespace AIOSEO\Plugin\Pro\Sitemap;

use AIOSEO\Plugin\Common\Sitemap as CommonSitemap;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Parses the current request and checks whether we need to serve a sitemap or a stylesheet.
 *
 * @since 4.2.1
 */
class RequestParser extends CommonSitemap\RequestParser {
	/**
	 * Checks whether we need to serve a sitemap or related stylesheet.
	 *
	 * @since 4.2.1
	 *
	 * @param  WP   $wp The main WordPress environment instance.
	 * @return void
	 */
	public function checkRequest( $wp ) {
		$this->slug = untrailingslashit( strtolower( $wp->request ) );

		foreach ( aioseo()->addons->getLoadedAddons() as $loadedAddon ) {
			if ( ! empty( $loadedAddon->requestParser ) && method_exists( $loadedAddon->requestParser, 'checkRequest' ) ) {
				$loadedAddon->requestParser->checkRequest();
			}
		}

		parent::checkRequest( $wp );
	}
}