<?php

namespace VSTACK\Router;

use VSTACK\API\Request;

interface RouterInterface
{
    public function route(Request $request);
    public function getAPIClient();
}
