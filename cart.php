<?php

class cart
{
    public $id, $itemname, $price, $qty, $restid, $cuisine,$restname;

    public function __construct($id, $itemname, $price, $qty, $restid, $cuisine,$restname)
    {
        $this->id = $id;
        $this->itemname = $itemname;
        $this->price = $price;
        $this->qty = $qty;
        $this->restid = $restid;
        $this->cuisine = $cuisine;
        $this->restname = $restname;
    }
}