<?php

namespace VSTACK\Router\Test;

use VSTACK\API\Client;
use VSTACK\API\Request;
use VSTACK\Integration\DefaultConfig;
use VSTACK\Integration\DefaultLogger;
use VSTACK\Integration\DefaultIntegration;
use VSTACK\Integration\DataStoreInterface;
use VSTACK\Integration\IntegrationAPIInterface;
use VSTACK\Router\RequestRouter;
use VSTACK\Router\DefaultRestAPIRouter;

class RequestRouterTest extends \PHPUnit_Framework_TestCase
{
    protected $mockConfig;
    protected $mockClient;
    protected $mockAPI;
    protected $mockIntegration;
    protected $mockDataStore;
    protected $mockLogger;
    protected $mockRequest;
    protected $requestRouter;

    public function setup()
    {
        $this->mockConfig = $this->getMockBuilder(DefaultConfig::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->mockClient = $this->getMockBuilder(Client::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->mockAPI = $this->getMockBuilder(IntegrationAPIInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->mockDataStore = $this->getMockBuilder(DataStoreInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->mockLogger = $this->getMockBuilder(DefaultLogger::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->mockIntegration = new DefaultIntegration($this->mockConfig, $this->mockAPI, $this->mockDataStore, $this->mockLogger);

        $this->mockRequest = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->requestRouter = new RequestRouter($this->mockIntegration);
    }

    public function testAddRouterAddsRouter()
    {
        $clientName = "clientName";
        $this->mockClient->method('getAPIClientName')->willReturn($clientName);

        $this->requestRouter->addRouter($this->mockClient, null);
        $this->assertEquals(DefaultRestAPIRouter::class, get_class($this->requestRouter->getRouterList()[$clientName]));
    }

    public function testRoutePassesValidRequestToDefaultRestAPIRouter()
    {
        $mockDefaultRestAPIRouter = $this->getMockBuilder('VSTACK\Router\DefaultRestAPIRouter')
            ->disableOriginalConstructor()
            ->getMock();
        $mockAPIClient = $this->getMockBuilder('VSTACK\API\Client')
            ->disableOriginalConstructor()
            ->getMock();
        $mockAPIClient->method('shouldRouteRequest')->willReturn(true);
        $mockDefaultRestAPIRouter->method('getAPIClient')->willReturn($mockAPIClient);
        $mockDefaultRestAPIRouter->expects($this->once())->method('route');

        $this->requestRouter->setRouterList(array($mockDefaultRestAPIRouter));

        $this->requestRouter->route($this->mockRequest);
    }
}
