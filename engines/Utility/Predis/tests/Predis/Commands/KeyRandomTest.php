<?php

/*
 * This file is part of the Predis package.
 *
 * (c) Daniele Alessandri <suppakilla@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Predis\Commands;

use \PHPUnit_Framework_TestCase as StandardTestCase;

/**
 * @group commands
 * @group realm-key
 */
class KeyRandomTest extends CommandTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function getExpectedCommand()
    {
        return 'Predis\Commands\KeyRandom';
    }

    /**
     * {@inheritdoc}
     */
    protected function getExpectedId()
    {
        return 'RANDOMKEY';
    }

    /**
     * @group disconnected
     */
    public function testFilterArguments()
    {
        $arguments = array();
        $expected = array();

        $command = $this->getCommand();
        $command->setArguments($arguments);

        $this->assertSame($expected, $command->getArguments());
    }

    /**
     * @group disconnected
     */
    public function testParseResponse()
    {
        $raw = 'key';
        $expected = 'key';

        $command = $this->getCommand();

        $this->assertSame($expected, $command->parseResponse($raw));
    }

    /**
     * @group connected
     */
    public function testReturnsFalseOnNonExpiringKeys()
    {
        $keys = array('key:1' => 1, 'key:2' => 2, 'key:3' => 3);

        $redis = $this->getClient();
        $redis->mset($keys);

        $this->assertContains($redis->randomkey(), array_keys($keys));
    }

    /**
     * @group connected
     */
    public function testReturnsNullOnEmptyDatabase()
    {
        $redis = $this->getClient();

        $this->assertNull($redis->randomkey());
    }
}
