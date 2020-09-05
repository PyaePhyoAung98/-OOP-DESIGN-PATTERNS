<?php
//builder interface with different methods
interface Builder
{
    public function addVege();
    public function addNoodle();
    public function addMeat();
}
//implementing the builder and interface with different implementation

class MalaBuilder implements Builder
{
    private $product;
    //to rest the mala object as a new one
    public function __construct()
    {
        $this->product = new Mala;
    }
    //All production steps work with the same product instance
    public function addVege()
    {
        $this->product->ingredients[] = "Vegetable";
    }
    public function addNoodle()
    {
        $this->product->ingredients[] = "Noddle";
    }
    public function addMeat()
    {
        $this->product->ingredients[] = "Meat";
    }

    //returning results for each different implementaions
    public function add()
    {
        $result = $this->product;
        //To rest the mela object as a new one,
        $this->product = new Mala;
        return $result;
    }
}
//display the final results of Malabuilder

class Mala
{
    public $ingredients = [];
    public function returnMala()
    {
        echo implode(', ', $this->ingredients) . "<br>";
    }
}
//I added a sample MalaDirector to create a few ready made impementations
class MalaDirector
{
    private $builder;
    public function setBuilder(Builder $builder)
    {
        $this->builder = $builder;
    }
    public function addVegeNoodle()
    {
        $this->builder->addVege();
        $this->builder->addNoodle();
    }
    public function addVegeMeatNoddle()
    {
        $this->builder->addVege();
        $this->builder->addMeat();
        $this->builder->addNoodle();
    }
}

//ClientCode
function clientCode(MalaDirector $malaDirector)
{
    $builder = new MalaBuilder;
    $malaDirector->setBuilder($builder);

    echo "This is vege Mala:\n";
    $malaDirector->addVegeNoodle();
    $builder->add()->returnMala();

    echo "Full Ingredients Mala:\n";
    $malaDirector->addVegeMeatNoddle();
    $builder->add()->returnMala();

    //This time with no MalaDirector usage.

    echo "Custom Mala:\n";
    $builder->addNoodle();
    $builder->addMeat();
    $builder->add()->returnMala();
}
$malaDirector = new MalaDirector;
clientCode($malaDirector);
