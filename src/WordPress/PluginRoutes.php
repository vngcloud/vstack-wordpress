<?php

namespace VSTACK\WordPress;

class PluginRoutes extends \VSTACK\API\PluginRoutes
{
    /**
     * @param $routeList
     *
     * @return mixed
     */
    public static function getRoutes($routeList)
    {
        foreach ($routeList as $routePath => $route) {
            $route['class'] = '\VSTACK\WordPress\PluginActions';
            $routeList[$routePath] = $route;
        }

        return $routeList;
    }
}
