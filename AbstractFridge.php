<?php

abstract class AbstractFridge{

    protected bool $isOpen = false;
    protected array $status = [];
    protected array $shelvesData = [];
    protected int $shelfMaxProductCount = 0;
    protected int $selectedShelf = 0;

    public function getStatus(): string
    {
        return $this->status[$this->selectedShelf] ?? 'empty';
    }

    public function setStatus($status): void
    {
        $this->status[$this->selectedShelf] = $status;
    }

    public function getShelvesData(): array
    {
        return $this->shelvesData;
    }

    public function setShelvesData(array $shelvesData): void
    {
        $this->shelvesData = $shelvesData;
    }

    public function checkShelfStatus():string
    {

        $shelfItemCount = count($this->shelvesData[$this->selectedShelf] ?? []);

        if($shelfItemCount == 0){
            return  'empty';
        }elseif (($shelfItemCount > 0) && ($shelfItemCount != $this->shelfMaxProductCount)){
            return 'partial';
        }else{
            return 'full';
        }

    }

    public function getDoorStatus(): bool
    {
        return $this->isOpen;
    } // unused

    public function setDoorStatus(bool $doorStatus):void
    {
        $this->isOpen = $doorStatus;
    }

    public function setShelfMaxProductCount(int $count):void
{
        $this->shelfMaxProductCount = $count;
    }

    public function setSelectedShelf(int $shelfNumber):void
    {
        $this->selectedShelf = $shelfNumber;
    }

    abstract public function addProduct(int $shelf,string $product);
    abstract public function deleteProduct(int $shelf,string $product);
    abstract public function print();

}