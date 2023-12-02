<?php

declare(strict_types=1);

namespace ch_6;

use PHPUnit\Framework\TestCase;

class A
{
    private $b;

    public function __construct(B $b)
    {
        $this->b = $b;
    }

    public function doSomething()
    {
        return $this->b->getValueFromC();
    }
}

class B
{
    private $c;

    public function __construct(C $c)
    {
        $this->c = $c;
    }

    public function getValueFromC()
    {
        return $this->c->getValue();
    }
}

class C
{
    public function getValue()
    {
        return 'Value from C';
    }
}

class recursionFakeObjectTest extends TestCase
{
    public function testA()
    {
        // 創建遞迴模擬物件，模擬 A 依賴 B，B 依賴 C 的物件結構
        $mockC = $this->createMock(C::class);
        $mockC->method('getValue')->willReturn('Mocked value from C');

        $mockB = $this->createMock(B::class);
        // 將 getValueFromC 方法的回傳值設定為預期的值
        $mockB->method('getValueFromC')->willReturn($mockC->getValue());

        $mockA = new A($mockB);

        // 斷言 A 的方法在模擬的物件結構下行為正確
        $this->assertEquals('Mocked value from C', $mockA->doSomething());
    }
}
