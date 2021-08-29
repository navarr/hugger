<?php

namespace Navarr\Hugger\Test;

use Navarr\Hugger\Hugger;
use PHPUnit\Framework\TestCase;
use Psr\Hug\Huggable;

class HuggerTest extends TestCase
{
    public function testHuggingDoesNotInfiniteLoop(): void
    {
        $hugger = new Hugger();
        $hugger->hug($hugger); // Hug self!

        $this->assertTrue(true); // Hugging did not infinitely loop
    }

    public function testEachItemInAGroupHugGetsHugged(): void
    {
        $hugger = new Hugger();

        $a = $this->createMock(Huggable::class);
        $a->expects($this->once())
            ->method('hug')
            ->with($hugger);

        $b = $this->createMock(Huggable::class);
        $b->expects($this->once())
            ->method('hug')
            ->with($hugger);

        $hugger->groupHug([$a, $b]);
    }
}
