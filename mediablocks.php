<?php

/*
Plugin Name: Медиаблоки
Plugin URI: https://github.com/nikolays93/mediablocks
Description: Добавляет возможность создавать медиа блоки (Карусел, слайдер, галарея..)
Version: 0.0.2 alpha
Author: NikolayS93
Author URI: https://vk.com/nikolays_93
Author EMAIL: nikolayS93@ya.ru
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 * Хуки плагина:
 * $pageslug . _after_title (default empty hook)
 * $pageslug . _before_form_inputs (default empty hook)
 * $pageslug . _inside_page_content
 * $pageslug . _inside_side_container
 * $pageslug . _inside_advanced_container
 * $pageslug . _after_form_inputs (default empty hook)
 * $pageslug . _after_page_wrap (default empty hook)
 *
 * Фильтры плагина:
 * "get_{DOMAIN}_option_name" - имя опции плагина
 * "get_{DOMAIN}_option" - значение опции плагина
 * "load_{DOMAIN}_file_if_exists" - информация полученная с файла
 * "get_{DOMAIN}_plugin_dir" - Дирректория плагина (доступ к файлам сервера)
 * "get_{DOMAIN}_plugin_url" - УРЛ плагина (доступ к внешним файлам)
 *
 * $pageslug . _form_action - Аттрибут action формы на странице настроек плагина
 * $pageslug . _form_method - Аттрибут method формы на странице настроек плагина
 */

namespace NikolayS93\MediaBlocks;

if ( ! defined( 'ABSPATH' ) )
    exit; // disable direct access

const PLUGIN_DIR = __DIR__;
const DOMAIN = '_plugin';

// Нужно подключить заранее для подключения файлов @see include_required_files()
// активации и деактивации плагина @see activate(), uninstall();
require __DIR__ . '/utils.php';

class Plugin
{
    const DEFAULT_TYPE = 'slider';

    private static $initialized;
    private function __construct() {}

    static function activate() { add_option( Utils::get_option_name(), array() ); }
    static function uninstall() { delete_option( Utils::get_option_name() ); }

    public static function initialize()
    {
        if( self::$initialized )
            return false;

        load_plugin_textdomain( DOMAIN, false, basename(PLUGIN_DIR) . '/languages/' );
        self::include_required_files();
        self::_actions();

        self::$initialized = true;
    }

    /**
     * Подключение файлов нужных для работы плагина
     */
    private static function include_required_files()
    {
        $include = Utils::get_plugin_dir('includes');
        $vendor = Utils::get_plugin_dir('/vendor');
        $classes = array(
            'Leafo\ScssPhp\Version'           => '/leafo/scssphp/scss.inc.php',
            __NAMESPACE__ . '\WP_Admin_Forms' => '/nikolays93/WPAdminForm/init.php',
            '\Mustache_Engine'                => '/mustache/mustache/src/Mustache/Autoloader.php',
        );

        foreach ($classes as $classname => $path) {
            if( ! class_exists($classname) ) {
                Utils::load_file_if_exists( $vendor . $path );
            }
            else {
                Utils::write_debug(sprintf( __('Duplicate class %s', DOMAIN), $classname ), __FILE__);
            }
        }

        if( class_exists('Mustache_Autoloader') )
            \Mustache_Autoloader::register();

        // includes
        Utils::load_file_if_exists( $include . '/register-assets.php' );
        Utils::load_file_if_exists( $include . '/register-post-type.php' );
        Utils::load_file_if_exists( $include . '/post-edit-page.php' );
        Utils::load_file_if_exists( $include . '/shortcodes.php' );
        Utils::load_file_if_exists( $include . '/filters.php' );
    }

    private static function _actions(){}
}



register_activation_hook( __FILE__, array( __NAMESPACE__ . '\Plugin', 'activate' ) );
register_uninstall_hook( __FILE__, array( __NAMESPACE__ . '\Plugin', 'uninstall' ) );
// register_deactivation_hook( __FILE__, array( __NAMESPACE__ . '\Plugin', 'deactivate' ) );

add_action( 'plugins_loaded', array( __NAMESPACE__ . '\Plugin', 'initialize' ), 10 );
