<?php

namespace TreeRecursion\Tests\Unit;

use PHPUnit\Framework\TestCase;
use TreeRecursion\Tree;
use TreeRecursion\TreeParentNode;
use TreeRecursion\TreeChildrenNode;
use TreeRecursion\TreeHierarchy;

class GetUserUseCaseTest extends TestCase
{
  public function testTreeWithNeitherParentsNorChildren()
    {
        $tree4 = (new Tree())->setName('Tree 4');
        $treeParentNode4 = new TreeParentNode($tree4, null);
        $treeSiblingsNode4 = new TreeChildrenNode($tree4, null);

        $expectedTreeHierarchy = new TreeHierarchy(
          $tree4,
          $treeParentNode4,
          $treeSiblingsNode4
        );

        $treeHierarchy = $tree4->hierarchy();

        $this->assertEquals($expectedTreeHierarchy, $treeHierarchy);
    }
}