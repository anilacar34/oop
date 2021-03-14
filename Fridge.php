<?php

require_once "AbstractFridge.php";

class Fridge extends AbstractFridge{

    public function __construct()
    {
        $this->setShelvesData([
            '1' => [],
            '2' => [],
            '3' => [],
        ]);

        $this->setShelfMaxProductCount(20);

        $this->setStatus($this->checkShelfStatus());
    }

    public function addProduct(int $shelf, string $product)
    {
        $this->setDoorStatus(1);

        $this->setSelectedShelf($shelf);

        if($this->getStatus() != 'full'){
            if($this->getStatus() == 'partial'){
                print($this->getStatus() . PHP_EOL);      // watch on the "Partial" status
            }
            $shelvesData = $this->getShelvesData();
            $shelvesData[$shelf][] = $product;
            $this->setShelvesData($shelvesData);
        }else{
            print('Shelf ' . $shelf . ' has been full !'. PHP_EOL);
        }

        $this->setStatus($this->checkShelfStatus());

        $this->setDoorStatus(0);
    }

    public function deleteProduct($shelf, $product)
    {
        $this->setDoorStatus(1);

        $this->setSelectedShelf($shelf);

        if($this->getStatus() != 'empty'){
            $shelvesData = $this->getShelvesData();
            array_pop($shelvesData[$shelf]);
            $this->setShelvesData($shelvesData);
        }else{
            print('Shelf ' . $shelf . ' is empty!'. PHP_EOL);
        }

        $this->setStatus($this->checkShelfStatus());

        $this->setDoorStatus(0);
    }

    public function print()
    {
        foreach ($this->getShelvesData() as $shelfNumber => $shelfData) {
            echo "---------------------------".PHP_EOL;
            echo 'Shelf ' . $shelfNumber . ' Product Count : ' . count($shelfData) .  PHP_EOL;
            echo 'Shelf ' . $shelfNumber . ' Product : ' . implode(',',$shelfData) .  PHP_EOL;
        }
    }
}
