<?php

abstract class TvSetFactory
{
    abstract function createTv();
    abstract function createCdPlayer();
}
class PanasonicFactory extends TvSetFactory
{
    public function createTv()
    {
        return new PanasonicTv;
    }
    public function createCdPlayer()
    {
        return new PanasonicCdPlayer();
    }
}
class SamsaungFactory extends TvSetFactory
{
    public function createTv()
    {
        return new SamsaungTv;
    }
    public function createCdPlayer()
    {
        return new SamsaungCdPlayer();
    }
}
/**
 * Now lets build family of object classes.
 * Tv & CdPlayer in this scenario.
 */
abstract class Tv
{
    abstract function getTv();
}
/**
 * These classes have to be implemented by their relative factory.
 */
class PanasonicTv extends Tv
{
    public function getTv()
    {
        return "Panasonic TV, ";
    }
}
class SamsaungTv extends Tv
{
    public function getTv(): string
    {
        return "Samsaung TV, ";
    }
}
abstract class CdPlayer
{
    abstract function getCdPlayer();
}
class PanasonicCdPlayer extends CdPlayer
{
    public function getCdPlayer()
    {
        return "PanasonicCdPlayer";
    }
}
class SamsaungCdPlayer extends CdPlayer
{
    public function getCdPlayer()
    {
        return "SamsaungCdPlayer";
    }
}

//client Code 
function test($tvSetFactory)
{
    $tv = $tvSetFactory->createTv();
    echo ('TV model is ' . $tv->getTv());

    $cdPlayer = $tvSetFactory->createCdPlayer();
    echo ('CD Player model is ' . $cdPlayer->getCdPlayer());
}

$tvSetFactory = new PanasonicFactory;
test($tvSetFactory);
echo "<br/>";
$tvSetFactory = new SamsaungFactory;
test($tvSetFactory);
