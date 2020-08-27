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

    public function hierarchyAsArray(): array
    {
      $hierarchyAsArray['tree'] = $this->tree->name();
      $hierarchyAsArray['parent'] = $this->buildAncestors($this->ancestors->parent());
      $hierarchyAsArray['children'] = $this->buildDescendants($this->descendants->children());
      
      return $hierarchyAsArray;
    }

    private function buildAncestors(?TreeParentNode $parentNode): ?array
    {
        if ($parentNode === null) {
            return null;
        }

        $parentAsArray = $this->buildAncestors($parentNode->parent());
        $treeAsArray['tree']  = $parentNode->treeName();
        $treeAsArray['parent'] = $parentAsArray;

        return $treeAsArray;
    }

    /**
     * @param TreeChildrenNode[]|null
     *
     * @return array
     */
    private function buildDescendants(?array $childrenNode): ?array
    {
        if ($childrensNode === null) {
            return null;
        }

        $childrensAsArray = [];
        /** @var TreeChildrenNode $childreNode */
        foreach ($childrenNode as $childNode) {
            $childrenAsArray = $this->buildDescendants($childNode->children());
            $childAsArray['tree'] = $childNode->treeName();
            $childAsArray['siblings'] = $childrenAsArray;
            $childrensAsArray[] = $childAsArray;
        }

        return $childrensAsArray;
    }
}