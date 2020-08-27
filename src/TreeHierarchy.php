<?php

namespace TreeRecursion;

class TreeHierarchy
{
    private Tree $tree;

    private TreeParentNode $ancestors;

    private TreeChildrenNode $descendants;
    
    public function __construct(
      Tree $tree, 
      TreeParentNode $ancestors, 
      TreeChildrenNode $descendants
    ) {
      $this->tree = $tree;
      $this->ancestors = $ancestors;
      $this->descendants = $descendants;
    }
}