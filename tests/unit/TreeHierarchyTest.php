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

  public function testTreeHierarchyWithOneLevelOneChild()
  {
    $tree4 = (new Tree())->setName('Tree 4');
    $tree5 = (new Tree())->setName('Tree 5');
    $tree4->addChild($tree5);
    
    $treeHierarchyAsArray5['tree'] = $tree5->name();
    $treeHierarchyAsArray5['children'] = null;

    $treeHierarchyAsArray4['tree'] = $tree4->name();
    $treeHierarchyAsArray4['parent'] = null;
    $treeHierarchyAsArray4['children'] = [$treeHierarchyAsArray5];
    
    $treeHierarchy = $tree4->hierarchy();

    $this->assertSame(
      $treeHierarchyAsArray4,
      $treeHierarchy->hierarchyAsArray()
    );
  }

  public function testTreeHierarchyWithOneLevelTwoChildren()
  {
    $tree4 = (new Tree())->setName('Tree 4');
    $tree5 = (new Tree())->setName('Tree 5');
    $tree6 = (new Tree())->setName('Tree 6');
    $tree4->addChild($tree5);
    $tree4->addChild($tree6);
    
    $treeHierarchyAsArray5['tree'] = $tree5->name();
    $treeHierarchyAsArray5['children'] = null;

    $treeHierarchyAsArray6['tree'] = $tree6->name();
    $treeHierarchyAsArray6['children'] = null;

    $treeHierarchyAsArray4['tree'] = $tree4->name();
    $treeHierarchyAsArray4['parent'] = null;
    $treeHierarchyAsArray4['children'] = [$treeHierarchyAsArray5, $treeHierarchyAsArray6];
    
    $treeHierarchy = $tree4->hierarchy();

    $this->assertSame(
      $treeHierarchyAsArray4,
      $treeHierarchy->hierarchyAsArray()
    );
  }

  public function testTreeHierarchyWithTwoLevelsLevelOneTwoChildrenLevelTwoOneChild()
  {
    $tree4 = (new Tree())->setName('Tree 4');
    $tree5 = (new Tree())->setName('Tree 5');
    $tree6 = (new Tree())->setName('Tree 6');
    $tree7 = (new Tree())->setName('Tree 7');
    $tree9 = (new Tree())->setName('Tree 9');
    $tree5->addChild($tree7);
    $tree6->addChild($tree9);
    $tree4->addChild($tree5);
    $tree4->addChild($tree6);
    
    $treeHierarchyAsArray7['tree'] = $tree7->name();
    $treeHierarchyAsArray7['children'] = null;

    $treeHierarchyAsArray9['tree'] = $tree9->name();
    $treeHierarchyAsArray9['children'] = null;

    $treeHierarchyAsArray5['tree'] = $tree5->name();
    $treeHierarchyAsArray5['children'] = [$treeHierarchyAsArray7];

    $treeHierarchyAsArray6['tree'] = $tree6->name();
    $treeHierarchyAsArray6['children'] = [$treeHierarchyAsArray9];

    $treeHierarchyAsArray4['tree'] = $tree4->name();
    $treeHierarchyAsArray4['parent'] = null;
    $treeHierarchyAsArray4['children'] = [$treeHierarchyAsArray5, $treeHierarchyAsArray6];
    
    $treeHierarchy = $tree4->hierarchy();

    $this->assertSame(
      $treeHierarchyAsArray4,
      $treeHierarchy->hierarchyAsArray()
    );
  }

  public function testTreeHierarchyWithTwoLevelsLevelOneTwoChildrenLevelTwoChildren()
  {
    $tree4 = (new Tree())->setName('Tree 4');
    $tree5 = (new Tree())->setName('Tree 5');
    $tree6 = (new Tree())->setName('Tree 6');
    $tree7 = (new Tree())->setName('Tree 7');
    $tree8 = (new Tree())->setName('Tree 8');
    $tree9 = (new Tree())->setName('Tree 9');
    $tree10 = (new Tree())->setName('Tree 10');
    $tree5->addChild($tree7);
    $tree5->addChild($tree8);
    $tree6->addChild($tree9);
    $tree6->addChild($tree10);
    $tree4->addChild($tree5);
    $tree4->addChild($tree6);
    
    $treeHierarchyAsArray7['tree'] = $tree7->name();
    $treeHierarchyAsArray7['children'] = null;

    $treeHierarchyAsArray8['tree'] = $tree8->name();
    $treeHierarchyAsArray8['children'] = null;

    $treeHierarchyAsArray9['tree'] = $tree9->name();
    $treeHierarchyAsArray9['children'] = null;

    $treeHierarchyAsArray10['tree'] = $tree10->name();
    $treeHierarchyAsArray10['children'] = null;

    $treeHierarchyAsArray5['tree'] = $tree5->name();
    $treeHierarchyAsArray5['children'] = [$treeHierarchyAsArray7, $treeHierarchyAsArray8];

    $treeHierarchyAsArray6['tree'] = $tree6->name();
    $treeHierarchyAsArray6['children'] = [$treeHierarchyAsArray9, $treeHierarchyAsArray10];

    $treeHierarchyAsArray4['tree'] = $tree4->name();
    $treeHierarchyAsArray4['parent'] = null;
    $treeHierarchyAsArray4['children'] = [$treeHierarchyAsArray5, $treeHierarchyAsArray6];
    
    $treeHierarchy = $tree4->hierarchy();

    $this->assertSame(
      $treeHierarchyAsArray4,
      $treeHierarchy->hierarchyAsArray()
    );
  }

  public function testTreeHierarchyWithThreeDescendantsLevels()
  {
    $tree4 = (new Tree())->setName('Tree 4');
    $tree5 = (new Tree())->setName('Tree 5');
    $tree6 = (new Tree())->setName('Tree 6');
    $tree7 = (new Tree())->setName('Tree 7');
    $tree8 = (new Tree())->setName('Tree 8');
    $tree9 = (new Tree())->setName('Tree 9');
    $tree10 = (new Tree())->setName('Tree 10');
    $tree11 = (new Tree())->setName('Tree 11');
    $tree12 = (new Tree())->setName('Tree 12');
    $tree13 = (new Tree())->setName('Tree 13');
    $tree14 = (new Tree())->setName('Tree 14');
    $tree15 = (new Tree())->setName('Tree 15');
    $tree16 = (new Tree())->setName('Tree 16');
    $tree7->addChild($tree11);
    $tree7->addChild($tree12);
    $tree8->addChild($tree13);
    $tree8->addChild($tree14);
    $tree8->addChild($tree15);
    $tree9->addChild($tree16);
    $tree5->addChild($tree7);
    $tree5->addChild($tree8);
    $tree6->addChild($tree9);
    $tree6->addChild($tree10);
    $tree4->addChild($tree5);
    $tree4->addChild($tree6);
    
    $treeHierarchyAsArray11['tree'] = $tree11->name();
    $treeHierarchyAsArray11['children'] = null;

    $treeHierarchyAsArray12['tree'] = $tree12->name();
    $treeHierarchyAsArray12['children'] = null;

    $treeHierarchyAsArray13['tree'] = $tree13->name();
    $treeHierarchyAsArray13['children'] = null;

    $treeHierarchyAsArray14['tree'] = $tree14->name();
    $treeHierarchyAsArray14['children'] = null;

    $treeHierarchyAsArray15['tree'] = $tree15->name();
    $treeHierarchyAsArray15['children'] = null;

    $treeHierarchyAsArray16['tree'] = $tree16->name();
    $treeHierarchyAsArray16['children'] = null;

    $treeHierarchyAsArray7['tree'] = $tree7->name();
    $treeHierarchyAsArray7['children'] = [$treeHierarchyAsArray11, $treeHierarchyAsArray12];

    $treeHierarchyAsArray8['tree'] = $tree8->name();
    $treeHierarchyAsArray8['children'] = [$treeHierarchyAsArray13, $treeHierarchyAsArray14, $treeHierarchyAsArray15];

    $treeHierarchyAsArray9['tree'] = $tree9->name();
    $treeHierarchyAsArray9['children'] = [$treeHierarchyAsArray16];

    $treeHierarchyAsArray10['tree'] = $tree10->name();
    $treeHierarchyAsArray10['children'] = null;

    $treeHierarchyAsArray5['tree'] = $tree5->name();
    $treeHierarchyAsArray5['children'] = [$treeHierarchyAsArray7, $treeHierarchyAsArray8];

    $treeHierarchyAsArray6['tree'] = $tree6->name();
    $treeHierarchyAsArray6['children'] = [$treeHierarchyAsArray9, $treeHierarchyAsArray10];

    $treeHierarchyAsArray4['tree'] = $tree4->name();
    $treeHierarchyAsArray4['parent'] = null;
    $treeHierarchyAsArray4['children'] = [$treeHierarchyAsArray5, $treeHierarchyAsArray6];
    
    $treeHierarchy = $tree4->hierarchy();

    $this->assertSame(
      $treeHierarchyAsArray4,
      $treeHierarchy->hierarchyAsArray()
    );
  }

  public function testTreeHierarchyWithAncestorsAndDescendants()
  {
    //ancestors
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
    $tree4->setParent($tree3);

    //descendants
    $tree5 = (new Tree())->setName('Tree 5');
    $tree6 = (new Tree())->setName('Tree 6');
    $tree7 = (new Tree())->setName('Tree 7');
    $tree8 = (new Tree())->setName('Tree 8');
    $tree9 = (new Tree())->setName('Tree 9');
    $tree10 = (new Tree())->setName('Tree 10');
    $tree11 = (new Tree())->setName('Tree 11');
    $tree12 = (new Tree())->setName('Tree 12');
    $tree13 = (new Tree())->setName('Tree 13');
    $tree14 = (new Tree())->setName('Tree 14');
    $tree15 = (new Tree())->setName('Tree 15');
    $tree16 = (new Tree())->setName('Tree 16');
    $tree7->addChild($tree11);
    $tree7->addChild($tree12);
    $tree8->addChild($tree13);
    $tree8->addChild($tree14);
    $tree8->addChild($tree15);
    $tree9->addChild($tree16);
    $tree5->addChild($tree7);
    $tree5->addChild($tree8);
    $tree6->addChild($tree9);
    $tree6->addChild($tree10);
    $tree4->addChild($tree5);
    $tree4->addChild($tree6);
    
    $treeHierarchyAsArray11['tree'] = $tree11->name();
    $treeHierarchyAsArray11['children'] = null;

    $treeHierarchyAsArray12['tree'] = $tree12->name();
    $treeHierarchyAsArray12['children'] = null;

    $treeHierarchyAsArray13['tree'] = $tree13->name();
    $treeHierarchyAsArray13['children'] = null;

    $treeHierarchyAsArray14['tree'] = $tree14->name();
    $treeHierarchyAsArray14['children'] = null;

    $treeHierarchyAsArray15['tree'] = $tree15->name();
    $treeHierarchyAsArray15['children'] = null;

    $treeHierarchyAsArray16['tree'] = $tree16->name();
    $treeHierarchyAsArray16['children'] = null;

    $treeHierarchyAsArray7['tree'] = $tree7->name();
    $treeHierarchyAsArray7['children'] = [$treeHierarchyAsArray11, $treeHierarchyAsArray12];

    $treeHierarchyAsArray8['tree'] = $tree8->name();
    $treeHierarchyAsArray8['children'] = [$treeHierarchyAsArray13, $treeHierarchyAsArray14, $treeHierarchyAsArray15];

    $treeHierarchyAsArray9['tree'] = $tree9->name();
    $treeHierarchyAsArray9['children'] = [$treeHierarchyAsArray16];

    $treeHierarchyAsArray10['tree'] = $tree10->name();
    $treeHierarchyAsArray10['children'] = null;

    $treeHierarchyAsArray5['tree'] = $tree5->name();
    $treeHierarchyAsArray5['children'] = [$treeHierarchyAsArray7, $treeHierarchyAsArray8];

    $treeHierarchyAsArray6['tree'] = $tree6->name();
    $treeHierarchyAsArray6['children'] = [$treeHierarchyAsArray9, $treeHierarchyAsArray10];

    $treeHierarchyAsArray4['tree'] = $tree4->name();
    $treeHierarchyAsArray4['parent'] = $treeHierarchyAsArray3;
    $treeHierarchyAsArray4['children'] = [$treeHierarchyAsArray5, $treeHierarchyAsArray6];
    
    $treeHierarchy = $tree4->hierarchy();

    $this->assertSame(
      $treeHierarchyAsArray4,
      $treeHierarchy->hierarchyAsArray()
    );
  }
}