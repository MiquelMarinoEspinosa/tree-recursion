<?php

namespace TreeRecursion\Tests\Unit;

use PHPUnit\Framework\TestCase;
use TreeRecursion\Tree;

class GetUserUseCaseTest extends TestCase
{
  public function testName() {
    $expectedName = 'Tree 1';
    $actualName = (new Tree())->setName($expectedName)->name();
    $this->assertSame(
      $expectedName, 
      $actualName
    );
  }

  public function testParent() {
    $expectedParent = (new Tree())->setName('Parent Tree 1');
    $actualParent = (new Tree())->setParent($expectedParent)->parent();
    $this->assertEquals(
      $expectedParent, 
      $actualParent
    );
  }

  public function testChildren() {
    $expectedChild = (new Tree())->setName('Child Tree 1');
    $anotherExpectedChild = (new Tree())->setName('Child Tree 2');
    $expectedChildren = [$expectedChild, $anotherExpectedChild];
    $actualChildren = (new Tree())
                              ->addChild($expectedChild)
                              ->addChild($anotherExpectedChild)
                              ->children();
    $this->assertEquals(
      $expectedChildren, 
      $actualChildren
    );
  }
}