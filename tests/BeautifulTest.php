<?php

namespace Zyan\Tests;

use PHPUnit\Framework\TestCase;
use Zyan\Beautiful\Beautiful;

class BeautifulTest extends TestCase
{
    public function test_go()
    {
        $this->assertSame(['AAAA'], Beautiful::go('1591234567811111', ['ABCDEF','AAAA'], ['mobile']));
        $this->assertSame(['ABCDEF','AAAA'], Beautiful::go('1591234567811111', ['ABCDEF','AAAA']));
        $this->assertSame(['AAAA','ABCDEF'], Beautiful::go('1591234567811111', ['AAAA','ABCDEF']));
        $this->assertSame([], Beautiful::go('15913412411', ['AAAA','ABCDEF']));
        $this->assertSame([], Beautiful::go('15913412411'));
        $this->assertSame([], Beautiful::go('222233323222'));

        $this->assertTrue(true);
    }
}
