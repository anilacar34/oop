<?php
require_once "Fridge.php";

$product = 'coke';
$Fridge = new Fridge();

for($shelf = 1; $shelf < 4; $shelf++){
    $Fridge->deleteProduct($shelf,$product);  // An error message is displayed after trying to remove a coke from an empty shelf.
    for($i = 0; $i < 21; $i++){
        $Fridge->addProduct($shelf,$product); // Putting an coke to the empty/partial shelf. (20 times)
    }
    $Fridge->deleteProduct($shelf,$product); // Remove a coke from a shelf.
}

$Fridge->print();

//print_r($Fridge->getShelvesData()); // raw data print

