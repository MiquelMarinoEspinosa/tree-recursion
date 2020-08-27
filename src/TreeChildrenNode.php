<?php

namespace TreeRecursion;

class TreeChildrenNode
{
  private Tree $tree;

  /** @var TreeChildrenNode[]|null */
  private ?array $children;
  
  public function __construct(Tree $tree, ?array $children)
  {
    $this->tree = $tree;
    $this->children = $children;
  }

  public function treeName(): string
  {
    return $this->tree->name();
  }

  public function children(): ?array
  {
    return $this->children;
  }
}