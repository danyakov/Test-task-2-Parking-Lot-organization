<?php
include_once "class/ParkingLot.php";
$ourCars = ['Audi', 'Bentley', 'Mini', 'BMW', 'Cadillac', 'Chrystler', 'Ford', 'Fiat', 'Renault', 'Lada', 'Ferrari', 'VolksWagen', 'Mazeratti', 'Mercedes'];

// let's make an Object
$ParkingObject = new ParkingLot(2, 3);

// let's run through our car's list and add cars to Parking Lot.
foreach ($ourCars as $car) {
    $addCarStatus = $ParkingObject->addToParking($car);
    if(!$addCarStatus) {
        // We have no place in our Parking Lot
        break;
    }
}
// let's see all cars
seeCars($ParkingObject->getAllCars());

// lets remove one car
$ParkingObject->removeFromParking('Bentley');

// let's see cars again without Bentley
seeCars($ParkingObject->getAllCars());

function seeCars($array) {
   //Just to make it visible in browser.
    echo '<ul>';
   $i=1;
   foreach ($array as $key=>$value) {
       echo '<li>Parking line #'.$i.': '.implode($value, ',').'</li>';
       $i++;
   }
   echo '</ul>';
}

