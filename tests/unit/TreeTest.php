<?php

namespace TreeRecursion\Tests\Unit;

use PHPUnit\Framework\TestCase;
use TreeRecursion\Tree;
use TreeRecursion\TreeParentNode;
use TreeRecursion\TreeChildrenNode;
use TreeRecursion\TreeHierarchy;

class GetUserUseCaseTest extends TestCase
{
  public function testTreeWithNeitherAncestorsNorChildren()
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

  public function testTreeWithOneLevelAncestors()
  {
    $tree3 = (new Tree())->setName('Tree 3');
    $tree4 = (new Tree())->setName('Tree 4');
    $tree4->setParent($tree3);
    $treeParentNode3 = new TreeParentNode($tree3, null);
    $treeParentNode4 = new TreeParentNode($tree4, $treeParentNode3);
    $treeSiblingsNode4 = new TreeChildrenNode($tree4, null);

    $expectedTreeHierarchy = new TreeHierarchy(
      $tree4,
      $treeParentNode4,
      $treeSiblingsNode4
    );

    $treeHierarchy = $tree4->hierarchy();

    $this->assertEquals($expectedTreeHierarchy, $treeHierarchy);
  }

  public function testTreeWithTwoLevelAncestors()
  {
    $tree2 = (new Tree())->setName('Tree 2');
    $tree3 = (new Tree())->setName('Tree 3');
    $tree4 = (new Tree())->setName('Tree 4');
    $tree3->setParent($tree2);
    $tree4->setParent($tree3);
    $treeParentNode2 = new TreeParentNode($tree2, null);
    $treeParentNode3 = new TreeParentNode($tree3, $treeParentNode2);
    $treeParentNode4 = new TreeParentNode($tree4, $treeParentNode3);
    $treeSiblingsNode4 = new TreeChildrenNode($tree4, null);

    $expectedTreeHierarchy = new TreeHierarchy(
      $tree4,
      $treeParentNode4,
      $treeSiblingsNode4
    );

    $treeHierarchy = $tree4->hierarchy();

    $this->assertEquals($expectedTreeHierarchy, $treeHierarchy);
  }

  public function testTreeWithThreeLevelAncestors()
  {
    $tree1 = (new Tree())->setName('Tree 1');
    $tree2 = (new Tree())->setName('Tree 2');
    $tree3 = (new Tree())->setName('Tree 3');
    $tree4 = (new Tree())->setName('Tree 4');
    $tree2->setParent($tree1);
    $tree3->setParent($tree2);
    $tree4->setParent($tree3);
    $treeParentNode1 = new TreeParentNode($tree1, null);
    $treeParentNode2 = new TreeParentNode($tree2, $treeParentNode1);
    $treeParentNode3 = new TreeParentNode($tree3, $treeParentNode2);
    $treeParentNode4 = new TreeParentNode($tree4, $treeParentNode3);
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