<?php

namespace VSTACK\WordPress;

class ClientRoutes
{
    public static $routes = array(
        'zones' => array(
            'class' => 'VSTACK\WordPress\ClientActions',
            'methods' => array(
                'GET' => array(
                    'function' => 'returnWordPressDomain',
                ),
            ),
        ),
    );
}
