<?php

namespace VSTACK\Integration\Test;

use VSTACK\Integration\DefaultLogger;

class DefaultLoggerTest extends \PHPUnit_Framework_TestCase
{
    public function testDebugLogOnlyLogsIfDebugIsEnabled()
    {
        $logger = new DefaultLogger(true);
        $returnValue = $logger->debug('');
        $this->assertTrue($returnValue);

        $logger = new DefaultLogger(false);
        $returnValue = $logger->debug('');
        $this->assertNull($returnValue);
    }
}
