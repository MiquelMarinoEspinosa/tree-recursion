<?php

namespace TreeRecursion;

class Tree {
  private string $name;

  private ?self $parent = null;
  
  /** self[] */
  private array $children = [];

  public function hierarchy(): TreeHierarchy
  {
    return new TreeHierarchy(
      $this,
      $this->getAncestors($this, $this->parent),
      $this->getDescendants($this, $this->children)
    );
  }

  private function getAncestors(Tree $tree, ?Tree $parent): TreeParentNode
  {
      if ($parent === null) {
          return new TreeParentNode($tree, null);
      }
      $treeParentNodeHierarchy = $this->getAncestors($parent, $parent->parent);

      return new TreeParentNode($tree, $treeParentNodeHierarchy);
  }
  
  private function getDescendants(Tree $tree, ?array $children): TreeChildrenNode
  {
      if ($children === []) {
          return new TreeChildrenNode($tree, null);
      }

      $treeChildrenNodesHierarchy = [];
      /** @var Tree $child */
      foreach ($children as $child) {
        $treeChildrenNodesHierarchy[] = $this->getDescendents($child, $child->children);
      }

      return new TreeChildrenNode($tree, $treeChildrenNodesHierarchy);
  }

  public function setName(string $name): self
  {
    $this->name = $name;

    return $this;
  }

  public function setParent(Tree $parent): self
  {
    $this->parent = $parent;

    return $this;
  }

  public function setChildren(array $children): self
  {
    $this->children = $children;

    return $this;
  }
}