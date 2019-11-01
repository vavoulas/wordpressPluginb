<?php

/**
 * WP-Reactivate
 *
 *
 * @package   WP-Reactivate
 * @author    Pangolin
 * @license   GPL-3.0
 * @link      https://gopangolin.com
 * @copyright 2017 Pangolin (Pty) Ltd
 */

namespace Pangolin\WPR\Endpoint;

use Pangolin\WPR;

/**
 * @subpackage REST_Controller
 */
class Wp_contacts
{
    /**
     * Instance of this class.
     *
     * @since    0.8.1
     *
     * @var      object
     */
    protected static $instance = null;

    /**
     * Initialize the plugin by setting localization and loading public scripts
     * and styles.
     *
     * @since     0.8.1
     */
    private function __construct()
    {
        $plugin = WPR\Plugin::get_instance();
        $this->plugin_slug = $plugin->get_plugin_slug();
    }

    /**
     * Set up WordPress hooks and filters
     *
     * @return void
     */
    public function do_hooks()
    {
        add_action('rest_api_init', array($this, 'register_routes'));
    }

    /**
     * Return an instance of this class.
     *
     * @since     0.8.1
     *
     * @return    object    A single instance of this class.
     */
    public static function get_instance()
    {

        // If the single instance hasn't been set, set it now.
        if (null == self::$instance) {
            self::$instance = new self;
            self::$instance->do_hooks();
        }

        return self::$instance;
    }

    /**
     * Register the routes for the objects of the controller.
     */
    public function register_routes()
    {
        $version = '1';
        $namespace = $this->plugin_slug . '/v' . $version;
        $endpoint = '/wp_contacts/';

        register_rest_route(
            $namespace,
            $endpoint,
            array(
                array(
                    'methods'               => \WP_REST_Server::ALLMETHODS,
                    'callback'              => array($this, 'proccess_collection'),

                    'args'                  => array(

                        'name' => array(
                            'required' => true, // means that this parameter must be passed (whatever its value) in order for the request to succeed
                            'type' => 'string',
                            'description' => 'The user\'s name',
                            'validate_callback' => function ($param, $request, $key) {
                                return !empty($param);
                            } // prevent submission of empty field
                        ),
                        'image' => array(
                            'required' => true,
                            'type' => 'image',
                            'format' => 'jpeg',
                            'description' => 'The user\'s image',
                            'validate_callback' => function ($param, $request, $key) {
                                return !empty($param);
                            }
                        ),
                        'description' => array(
                            'required' => true, // means that this parameter must be passed (whatever its value) in order for the request to succeed
                            'type' => 'string',
                            'description' => 'The user\'s role description',
                            'validate_callback' => function ($param, $request, $key) {
                                return !empty($param);
                            }
                        ),
                        'position' => array(
                            'required' => true,
                            'type' => 'string',
                            'description' => 'The user\'s role',
                            'validate_callback' => function ($param, $request, $key) {
                                return !empty($param);
                            }
                        )


                    )

                )

            )
        );
    }








    public function proccess_collection($request)
    {

        $name = $request->get_param('name');
        $description = $request->get_param('description');
        $image = $request->get_param('image');
        $role =  $request->get_param('position');
        $social_media = $request->get_param('social_media');

        return new \WP_REST_Response(array(
            'success'   => true,
            'value'     => $name . ' (' . $role . ')'
        ), 200);
    }
}
