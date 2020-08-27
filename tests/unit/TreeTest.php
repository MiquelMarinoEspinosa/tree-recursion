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

      $this->assertEquals(
        $expectedTreeHierarchy, 
        $tree4->hierarchy()
      );
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

    $this->assertEquals(
      $expectedTreeHierarchy, 
      $tree4->hierarchy()
    );
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

    $this->assertEquals(
      $expectedTreeHierarchy, 
      $tree4->hierarchy()
    );
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

    $this->assertEquals(
      $expectedTreeHierarchy, 
      $tree4->hierarchy()
    );
  }

  public function testTreeWithOneLevelOneSingleDescendant()
  {
    $tree4 = (new Tree())->setName('Tree 4');
    $tree5 = (new Tree())->setName('Tree 5');
    $tree4->addChild($tree5);
    $treeParentNode4 = new TreeParentNode($tree4, null);
    $treeSiblingsNode5 = new TreeChildrenNode($tree5, null);
    $treeSiblingsNode4 = new TreeChildrenNode($tree4, [$treeSiblingsNode5]);

    $expectedTreeHierarchy = new TreeHierarchy(
      $tree4,
      $treeParentNode4,
      $treeSiblingsNode4
    );

    $this->assertEquals(
      $expectedTreeHierarchy, 
      $tree4->hierarchy()
    );
  }

  public function testTreeWithOneLevelTwoDescendants()
  {
    $tree4 = (new Tree())->setName('Tree 4');
    $tree5 = (new Tree())->setName('Tree 5');
    $tree4->addChild($tree5);
    $tree6 = (new Tree())->setName('Tree 6');
    $tree4->addChild($tree6);
    $treeParentNode4 = new TreeParentNode($tree4, null);
    $treeSiblingsNode5 = new TreeChildrenNode($tree5, null);
    $treeSiblingsNode6 = new TreeChildrenNode($tree6, null);
    $treeSiblingsNode4 = new TreeChildrenNode($tree4, [$treeSiblingsNode5, $treeSiblingsNode6]);

    $expectedTreeHierarchy = new TreeHierarchy(
      $tree4,
      $treeParentNode4,
      $treeSiblingsNode4
    );

    $this->assertEquals(
      $expectedTreeHierarchy, 
      $tree4->hierarchy()
    );
  }

  public function testTreeWithTwoLevelsLevelOneTwoDescendantsLevelTwoOneDescendant()
  {
    $tree4 = (new Tree())->setName('Tree 4');
    $tree5 = (new Tree())->setName('Tree 5');
    $tree7 = (new Tree())->setName('Tree 7');
    $tree5->addChild($tree7);
    $tree4->addChild($tree5);
    $tree6 = (new Tree())->setName('Tree 6');
    $tree9 = (new Tree())->setName('Tree 9');
    $tree6->addChild($tree9);
    $tree4->addChild($tree6);
    $treeChildrenNode7 = new TreeChildrenNode($tree7, null);
    $treeChildrenNode9 = new TreeChildrenNode($tree9, null);
    $treeSiblingsNode5 = new TreeChildrenNode($tree5, [$treeChildrenNode7]);
    $treeSiblingsNode6 = new TreeChildrenNode($tree6, [$treeChildrenNode9]);
    $treeParentNode4 = new TreeParentNode($tree4, null);
    $treeSiblingsNode4 = new TreeChildrenNode($tree4, [$treeSiblingsNode5, $treeSiblingsNode6]);

    $expectedTreeHierarchy = new TreeHierarchy(
      $tree4,
      $treeParentNode4,
      $treeSiblingsNode4
    );

    $this->assertEquals(
      $expectedTreeHierarchy, 
      $tree4->hierarchy()
    );
  }

  public function testTreeWithTwoLevelsLevelOneTwoDescendantsLevelTwoTwoDescendants()
  {
    $tree4 = (new Tree())->setName('Tree 4');
    $tree5 = (new Tree())->setName('Tree 5');
    $tree7 = (new Tree())->setName('Tree 7');
    $tree8 = (new Tree())->setName('Tree 8');
    $tree5->addChild($tree7);
    $tree5->addChild($tree8);
    $tree4->addChild($tree5);
    $tree6 = (new Tree())->setName('Tree 6');
    $tree9 = (new Tree())->setName('Tree 9');
    $tree10 = (new Tree())->setName('Tree 10');
    $tree6->addChild($tree9);
    $tree6->addChild($tree10);
    $tree4->addChild($tree6);
    $treeChildrenNode7 = new TreeChildrenNode($tree7, null);
    $treeChildrenNode9 = new TreeChildrenNode($tree9, null);
    $treeChildrenNode8 = new TreeChildrenNode($tree8, null);
    $treeChildrenNode10 = new TreeChildrenNode($tree10, null);
    $treeSiblingsNode5 = new TreeChildrenNode($tree5, [$treeChildrenNode7, $treeChildrenNode8]);
    $treeSiblingsNode6 = new TreeChildrenNode($tree6, [$treeChildrenNode9, $treeChildrenNode10]);
    $treeParentNode4 = new TreeParentNode($tree4, null);
    $treeSiblingsNode4 = new TreeChildrenNode($tree4, [$treeSiblingsNode5, $treeSiblingsNode6]);

    $expectedTreeHierarchy = new TreeHierarchy(
      $tree4,
      $treeParentNode4,
      $treeSiblingsNode4
    );

    $this->assertEquals(
      $expectedTreeHierarchy, 
      $tree4->hierarchy()
    );
  }

  public function testTreeWithThreeDescendantsLevels()
  {
    $tree4 = (new Tree())->setName('Tree 4');
    $tree5 = (new Tree())->setName('Tree 5');
    $tree7 = (new Tree())->setName('Tree 7');
    $tree11 = (new Tree())->setName('Tree 11');
    $tree12 = (new Tree())->setName('Tree 12');
    $tree7->addChild($tree11);
    $tree7->addChild($tree12);
    $tree8 = (new Tree())->setName('Tree 8');
    $tree13 = (new Tree())->setName('Tree 13');
    $tree14 = (new Tree())->setName('Tree 14');
    $tree15 = (new Tree())->setName('Tree 15');
    $tree8->addChild($tree13);
    $tree8->addChild($tree14);
    $tree8->addChild($tree15);
    $tree5->addChild($tree7);
    $tree5->addChild($tree8);
    $tree4->addChild($tree5);
    $tree6 = (new Tree())->setName('Tree 6');
    $tree9 = (new Tree())->setName('Tree 9');
    $tree16 = (new Tree())->setName('Tree 16');
    $tree9->addChild($tree16);
    $tree10 = (new Tree())->setName('Tree 10');
    $tree6->addChild($tree9);
    $tree6->addChild($tree10);
    $tree4->addChild($tree6);
    $treeChildrenNode11 = new TreeChildrenNode($tree11, null);
    $treeChildrenNode12 = new TreeChildrenNode($tree12, null);
    $treeChildrenNode16 = new TreeChildrenNode($tree16, null);
    $treeChildrenNode13 = new TreeChildrenNode($tree13, null);
    $treeChildrenNode14 = new TreeChildrenNode($tree14, null);
    $treeChildrenNode15 = new TreeChildrenNode($tree15, null);
    $treeChildrenNode7 = new TreeChildrenNode($tree7, [$treeChildrenNode11, $treeChildrenNode12]);
    $treeChildrenNode9 = new TreeChildrenNode($tree9, [$treeChildrenNode16]);
    $treeChildrenNode8 = new TreeChildrenNode($tree8, [$treeChildrenNode13, $treeChildrenNode14, $treeChildrenNode15]);
    $treeChildrenNode10 = new TreeChildrenNode($tree10, null);
    $treeSiblingsNode5 = new TreeChildrenNode($tree5, [$treeChildrenNode7, $treeChildrenNode8]);
    $treeSiblingsNode6 = new TreeChildrenNode($tree6, [$treeChildrenNode9, $treeChildrenNode10]);
    $treeParentNode4 = new TreeParentNode($tree4, null);
    $treeSiblingsNode4 = new TreeChildrenNode($tree4, [$treeSiblingsNode5, $treeSiblingsNode6]);

    $expectedTreeHierarchy = new TreeHierarchy(
      $tree4,
      $treeParentNode4,
      $treeSiblingsNode4
    );

    $this->assertEquals(
      $expectedTreeHierarchy, 
      $tree4->hierarchy()
    );
  }

  public function testTreeWithAncestorsAndDescendants()
  {
    // Ancestors
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

    // Descendants
    $tree5 = (new Tree())->setName('Tree 5');
    $tree7 = (new Tree())->setName('Tree 7');
    $tree11 = (new Tree())->setName('Tree 11');
    $tree12 = (new Tree())->setName('Tree 12');
    $tree7->addChild($tree11);
    $tree7->addChild($tree12);
    $tree8 = (new Tree())->setName('Tree 8');
    $tree13 = (new Tree())->setName('Tree 13');
    $tree14 = (new Tree())->setName('Tree 14');
    $tree15 = (new Tree())->setName('Tree 15');
    $tree8->addChild($tree13);
    $tree8->addChild($tree14);
    $tree8->addChild($tree15);
    $tree5->addChild($tree7);
    $tree5->addChild($tree8);
    $tree4->addChild($tree5);
    $tree6 = (new Tree())->setName('Tree 6');
    $tree9 = (new Tree())->setName('Tree 9');
    $tree16 = (new Tree())->setName('Tree 16');
    $tree9->addChild($tree16);
    $tree10 = (new Tree())->setName('Tree 10');
    $tree6->addChild($tree9);
    $tree6->addChild($tree10);
    $tree4->addChild($tree6);
    $treeChildrenNode11 = new TreeChildrenNode($tree11, null);
    $treeChildrenNode12 = new TreeChildrenNode($tree12, null);
    $treeChildrenNode16 = new TreeChildrenNode($tree16, null);
    $treeChildrenNode13 = new TreeChildrenNode($tree13, null);
    $treeChildrenNode14 = new TreeChildrenNode($tree14, null);
    $treeChildrenNode15 = new TreeChildrenNode($tree15, null);
    $treeChildrenNode7 = new TreeChildrenNode($tree7, [$treeChildrenNode11, $treeChildrenNode12]);
    $treeChildrenNode9 = new TreeChildrenNode($tree9, [$treeChildrenNode16]);
    $treeChildrenNode8 = new TreeChildrenNode($tree8, [$treeChildrenNode13, $treeChildrenNode14, $treeChildrenNode15]);
    $treeChildrenNode10 = new TreeChildrenNode($tree10, null);
    $treeSiblingsNode5 = new TreeChildrenNode($tree5, [$treeChildrenNode7, $treeChildrenNode8]);
    $treeSiblingsNode6 = new TreeChildrenNode($tree6, [$treeChildrenNode9, $treeChildrenNode10]);
    $treeSiblingsNode4 = new TreeChildrenNode($tree4, [$treeSiblingsNode5, $treeSiblingsNode6]);

    $expectedTreeHierarchy = new TreeHierarchy(
      $tree4,
      $treeParentNode4,
      $treeSiblingsNode4
    );

    $this->assertEquals(
      $expectedTreeHierarchy, 
      $tree4->hierarchy()
    );
  }
}