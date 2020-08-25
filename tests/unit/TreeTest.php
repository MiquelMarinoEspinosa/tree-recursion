<?php

namespace TreeRecursion\Tests\Unit;

use PHPUnit\Framework\TestCase;
use TreeRecursion\Tree;

class GetUserUseCaseTest extends TestCase
{
  public function testAssertFalse() {
    $this->assertFalse((new Tree())->returnTrue());
  }
}