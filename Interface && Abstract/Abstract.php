<?php
  abstract class Recipe
  {
    protected function addSalt()
    {
      var_dump('Add some salt');
      return $this;
    }
    protected function addPepper()
    {
      var_dump('Add some pepper');
      return $this;
    }
    public function cook()
    {
      return $this
            ->addSalt()
            ->addPepper()
            ->addMainIngredient();
    }
    protected abstract function addMainIngredient();
  }
  class ChickenCurry extends Recipe
  {
    public function addMainIngredient()
    {
      var_dump('Add raw chicken');
      return $this;
    }
  }
  $chickenCurry = new ChickenCurry();
  $chickenCurry->cook();

  class PorkCurry extends Recipe
  {
    public function addMainIngredient()
    {
      var_dump('Add raw pork');
      return $this;
    }
  }
  $porkCurry = new PorkCurry();
  $porkCurry->cook();

 ?>
