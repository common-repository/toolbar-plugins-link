<?php
/*
Plugin Name: Toolbar Plugins Link
Plugin URI: https://wordpress.org/plugins/toolbar-plugins-link/
Description: Ultralight plugin to customize the admin <a href="https://wordpress.org/support/article/toolbar/" title="WordPress support article on Toolbar">Toolbar</a> and add a shortcut to the plugins page. Navigate directly to the Plugins page.
Author: Hareesh Pillai
Author URI: https://profiles.wordpress.org/hareesh-pillai/
Text Domain: toolbar-plugins-link
Version: 1.3.2
License: GPLv2 or later
*/

/*  Copyright 2015 Hareesh Pillai (email: hareesh.hsr289 at gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

function tpl_add_plugins_page() {
	if ( current_user_can( 'activate_plugins' ) || current_user_can( 'edit_plugins' ) || current_user_can( 'install_plugins' ) || current_user_can( 'update_plugins' ) || current_user_can( 'delete_plugins' ) ) {
		global $wp_admin_bar;
		$args = array(
			'id'     => 'plugins',
			'title'  => __('Plugins', 'toolbar-plugins-link'),
			'href'   => admin_url( 'plugins.php'),
			'parent' => 'appearance'
		);
		$wp_admin_bar->add_menu( $args );
	}
}
add_action( 'wp_before_admin_bar_render', 'tpl_add_plugins_page');


function tpl_load_textdomain() {
	load_plugin_textdomain( 'toolbar-plugins-link', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );
}
add_action('plugins_loaded', 'tpl_load_textdomain');