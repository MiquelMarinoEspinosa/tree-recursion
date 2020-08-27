<?php

namespace TreeRecursion;

class TreeParentNode
{
  private Tree $tree;

  private ?TreeParentNode $parent;
  
  public function __construct(Tree $tree, ?TreeParentNode $parent)
  {
    $this->tree = $tree;
    $this->parent = $parent;
  }

  public function parent(): ?TreeParentNode
  {
    return $this->parent;
  }

  public function treeName(): string
  {
    return $this->tree->name();
  }
}