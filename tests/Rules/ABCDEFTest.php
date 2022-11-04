<?php

namespace Zyan\Tests\Rules;

use PHPUnit\Framework\TestCase;
use Zyan\Beautiful\Rules\ABCDEF;
use Zyan\Beautiful\RulesInterface;

class ABCDEFTest extends TestCase
{
    public function test_go()
    {
        $this->assertTrue(ABCDEF::go(15912345672));
        $this->assertTrue(ABCDEF::go(15911345678));
        $this->assertTrue(ABCDEF::go(15901234578));
        $this->assertTrue(ABCDEF::go(15955123456));
        $this->assertTrue(ABCDEF::go(15955012345));
        $this->assertTrue(ABCDEF::go('15951234562'));
        $this->assertTrue(ABCDEF::go('159555 123456'));
        $this->assertTrue(!ABCDEF::go(15911148222));
        $this->assertTrue(!ABCDEF::go(15934523344));
        $this->assertTrue(!ABCDEF::go('159555 123756'));
        $this->assertTrue(!ABCDEF::go('159555123445678'));
        $this->assertInstanceOf(RulesInterface::class, new ABCDEF());
    }
}
