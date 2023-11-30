<?php declare(strict_types=1);

namespace ch_5\src;

class MyTestableComplicatedInterface implements ComplicatedInterface
{
    public string $meth1_a, $meth1_b, $meth2_b;
    public bool $meth1_c, $meth2_c, $meth3_c;
    public int $meth1_x, $meth2_x, $meth3_x;
    public int $meth1_0, $meth2_0, $meth3_0;

    public function method1(string $a, string $b, bool $c, int $x, object $o)
    {
        $this->meth1_a = $a;
        $this->meth1_b = $b;
        $this->meth1_c = $c;
        $this->meth1_x = $x;
        $this->meth1_0 = 0;
    }

    public function method2(string $b, bool $c, int $x, object $o)
    {
        $this->meth2_b = $b;
        $this->meth2_c = $c;
        $this->meth2_x = $x;
        $this->meth2_0 = 0;
    }

    public function method3(bool $c, int $x, object $o)
    {
        $this->meth3_c = $c;
        $this->meth3_x = $x;
        $this->meth3_0 = 0;
    }
}