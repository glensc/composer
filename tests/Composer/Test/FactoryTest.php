<?php

/*
 * This file is part of Composer.
 *
 * (c) Nils Adermann <naderman@naderman.de>
 *     Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Composer\Test;

use PHPUnit\Framework\TestCase;
use Composer\Factory;

class FactoryTest extends TestCase
{
    /**
     * @group TLS
     */
    public function testDefaultValuesAreAsExpected()
    {
        $ioMock = $this->getMockBuilder('Composer\IO\IOInterface')->getMock();

        $ioMock->expects($this->once())
            ->method("writeError");

        $config = $this
            ->getMockBuilder('Composer\Config')
            ->getMock();

        $config->method('get')
            ->with($this->equalTo('disable-tls'))
            ->will($this->returnValue(true));

        Factory::createRemoteFilesystem($ioMock, $config);
    }
}