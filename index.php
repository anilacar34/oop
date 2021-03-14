<?php
require_once "Fridge.php";

$product = 'coke';
$fridge = new Fridge();

for($shelf = 1; $shelf < 4; $shelf++){
    $fridge->deleteProduct($shelf,$product);  // An error message is displayed after trying to remove a coke from an empty shelf.
    for($i = 0; $i < 21; $i++){
        $fridge->addProduct($shelf,$product); // Putting an coke to the empty/partial shelf. (20 times)
    }
    $fridge->deleteProduct($shelf,$product); // Remove a coke from a shelf.
}

$fridge->print();

//print_r($Fridge->getShelvesData()); // raw data print

