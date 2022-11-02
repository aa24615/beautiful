<?php

namespace Zyan\Tests;

use PHPUnit\Framework\TestCase;
use Zyan\Beautiful\Beautiful;

class BeautifulTest extends TestCase
{
    public function test_go(){
        $a = Beautiful::go('159176571212485',['aaaa'],['mobile']);

        print_r($a);

        $this->assertTrue(true);
    }
}