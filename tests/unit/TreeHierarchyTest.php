<?php

namespace TreeRecursion\Tests\Unit;

use PHPUnit\Framework\TestCase;
use TreeRecursion\Tree;

class TreeHierarchyTest extends TestCase
{
  public function testTreeHierarchyWithNeitherAncestorsNorDescendants()
  {
    $tree4 = (new Tree())->setName('Tree 4');
    $treeHierarchyAsArray4['tree'] = $tree4->name();
    $treeHierarchyAsArray4['parent'] = null;
    $treeHierarchyAsArray4['children'] = null;
    
    $treeHierarchy = $tree4->hierarchy();

    $this->assertSame(
      $treeHierarchyAsArray4,
      $treeHierarchy->hierarchyAsArray()
    );
  }

  public function testTreeHierarchyWithOneLevelAncestors()
  {
    $tree3 = (new Tree())->setName('Tree 3');
    $treeHierarchyAsArray3['tree'] = $tree3->name();
    $treeHierarchyAsArray3['parent'] = null;
    
    $tree4 = (new Tree())->setName('Tree 4');
    $treeHierarchyAsArray4['tree'] = $tree4->name();
    $treeHierarchyAsArray4['parent'] = $treeHierarchyAsArray3;
    $treeHierarchyAsArray4['children'] = null;
    $tree4->setParent($tree3);
    $treeHierarchy = $tree4->hierarchy();

    $this->assertSame(
      $treeHierarchyAsArray4,
      $treeHierarchy->hierarchyAsArray()
    );
  }

  public function testTreeHierarchyWithTwoLevelsAncestors()
  {
    $tree2 = (new Tree())->setName('Tree 2');
    $treeHierarchyAsArray2['tree'] = $tree2->name();
    $treeHierarchyAsArray2['parent'] = null;

    $tree3 = (new Tree())->setName('Tree 3');
    $tree3->setParent($tree2);
    $treeHierarchyAsArray3['tree'] = $tree3->name();
    $treeHierarchyAsArray3['parent'] = $treeHierarchyAsArray2;
    
    $tree4 = (new Tree())->setName('Tree 4');
    $treeHierarchyAsArray4['tree'] = $tree4->name();
    $treeHierarchyAsArray4['parent'] = $treeHierarchyAsArray3;
    $treeHierarchyAsArray4['children'] = null;
    $tree4->setParent($tree3);
    $treeHierarchy = $tree4->hierarchy();

    $this->assertSame(
      $treeHierarchyAsArray4,
      $treeHierarchy->hierarchyAsArray()
    );
  }

  public function testTreeHierarchyWithThreeLevelsAncestors()
  {
    $tree1 = (new Tree())->setName('Tree 1');
    $treeHierarchyAsArray1['tree'] = $tree1->name();
    $treeHierarchyAsArray1['parent'] = null;

    $tree2 = (new Tree())->setName('Tree 2');
    $tree2->setParent($tree1);
    $treeHierarchyAsArray2['tree'] = $tree2->name();
    $treeHierarchyAsArray2['parent'] = $treeHierarchyAsArray1;

    $tree3 = (new Tree())->setName('Tree 3');
    $tree3->setParent($tree2);
    $treeHierarchyAsArray3['tree'] = $tree3->name();
    $treeHierarchyAsArray3['parent'] = $treeHierarchyAsArray2;
    
    $tree4 = (new Tree())->setName('Tree 4');
    $treeHierarchyAsArray4['tree'] = $tree4->name();
    $treeHierarchyAsArray4['parent'] = $treeHierarchyAsArray3;
    $treeHierarchyAsArray4['children'] = null;
    $tree4->setParent($tree3);
    $treeHierarchy = $tree4->hierarchy();

    $this->assertSame(
      $treeHierarchyAsArray4,
      $treeHierarchy->hierarchyAsArray()
    );
  }
}