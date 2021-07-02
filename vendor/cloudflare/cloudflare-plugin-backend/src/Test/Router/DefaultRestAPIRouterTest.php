<?php

namespace VSTACK\Router\Test;

use VSTACK\API\Request;
use VSTACK\Integration\DefaultIntegration;
use VSTACK\Router\DefaultRestAPIRouter;

class DefaultRestAPIRouterTest extends \PHPUnit_Framework_TestCase
{
    private $clientV4APIRouter;
    private $mockConfig;
    private $mockClientAPI;
    private $mockAPI;
    private $mockIntegration;
    private $mockDataStore;
    private $mockLogger;
    private $mockRoutes = array();

    public function setup()
    {
        $this->mockConfig = $this->getMockBuilder('VSTACK\Integration\DefaultConfig')
            ->disableOriginalConstructor()
            ->getMock();
        $this->mockClientAPI = $this->getMockBuilder('VSTACK\API\Client')
            ->disableOriginalConstructor()
            ->getMock();
        $this->mockAPI = $this->getMockBuilder('VSTACK\Integration\IntegrationAPIInterface')
            ->disableOriginalConstructor()
            ->getMock();
        $this->mockDataStore = $this->getMockBuilder('VSTACK\Integration\DataStoreInterface')
            ->disableOriginalConstructor()
            ->getMock();
        $this->mockLogger = $this->getMockBuilder('VSTACK\Integration\DefaultLogger')
            ->disableOriginalConstructor()
            ->getMock();
        $this->mockIntegration = new DefaultIntegration($this->mockConfig, $this->mockAPI, $this->mockDataStore, $this->mockLogger);
        $this->clientV4APIRouter = new DefaultRestAPIRouter($this->mockIntegration, $this->mockClientAPI, $this->mockRoutes);
    }

    public function testGetRouteReturnsClassFunctionForValidRoute()
    {
        $routes = array(
            'zones' => array(
                'class' => 'testClass',
                'methods' => array(
                    'GET' => array(
                        'function' => 'testFunction',
                    ),
                ),
            ),
        );
        $this->clientV4APIRouter->setRoutes($routes);

        $request = new Request('GET', 'zones', array(), array());

        $response = $this->clientV4APIRouter->getRoute($request);

        $this->assertEquals(array(
            'class' => 'testClass',
            'function' => 'testFunction',
        ), $response);
    }

    public function testGetRouteReturnsFalseForNoRouteFound()
    {
        $request = new Request('GET', 'zones', array(), array());
        $response = $this->clientV4APIRouter->getRoute($request);
        $this->assertFalse($response);
    }
}
