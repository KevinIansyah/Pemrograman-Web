<?php
require_once('product.php');

class CDRack extends Product
{
    private $capacity;
    private $model;

    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getPrice()
    {
        return $this->price + ($this->price * 15 / 100);
    }

    public function calculatePrice()
    {
        $salePrice = $this->getPrice() - ($this->getPrice() * $this->getDiscount() / 100);
        return $salePrice;
    }
}
