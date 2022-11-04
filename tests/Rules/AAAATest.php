<?php

namespace Zyan\Tests\Rules;

use PHPUnit\Framework\TestCase;
use Zyan\Beautiful\Rules\AAAA;
use Zyan\Beautiful\RulesInterface;

class AAAATest extends TestCase
{
    public function test_go()
    {
        $this->assertTrue(!AAAA::go(15911231485));
        $this->assertTrue(AAAA::go(15911112222));
        $this->assertTrue(AAAA::go(15911118222));
        $this->assertTrue(!AAAA::go(15911148222));
        $this->assertTrue(AAAA::go(15911111222));
        $this->assertTrue(AAAA::go(15955555222));
        $this->assertTrue(AAAA::go(15955000072));
        $this->assertTrue(AAAA::go('15955555222'));
        $this->assertTrue(!AAAA::go('159555 55222'));
        $this->assertInstanceOf(RulesInterface::class, new AAAA());
    }
}
