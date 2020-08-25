<?php

namespace TreeRecursion;

class Tree {
  private string $name;

  private self $parent;
  
  /** self[] */
  private array $children = [];

  public function setName(string $name): self
  {
    $this->name = $name;

    return $this;
  }

  public function setParent(self $parent): self
  {
    $this->parent = $parent;

    return $this;
  }

  public function addChild(self $child): self
  {
    $this->children[] = $child;

    return $this;
  }

  public function name(): string
  {
    return $this->name;
  }

  public function parent(): self
  {
    return $this->parent;
  }

  /**
   * @return self[]
   */
  public function children(): array
  {
    return $this->children;
  }
}