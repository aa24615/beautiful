<?php

namespace Zyan\Tests\Handle;

use PHPUnit\Framework\TestCase;
use Zyan\Beautiful\Handle\Mobile;

class MobileTest extends TestCase
{
    public function test_handle()
    {
        $this->assertSame('17657485', Mobile::handle(8615917657485));
        $this->assertSame('17657485', Mobile::handle('8615917657485'));
        $this->assertSame('17657485', Mobile::handle('+8615917657485'));
        $this->assertSame('76 57485', Mobile::handle('+86159176 57485'));
    }
}
