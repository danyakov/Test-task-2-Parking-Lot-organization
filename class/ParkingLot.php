<?php

interface Parking
{
  public function addToParking(string $car);
  public function removeFromParking(string $car);
  public function getAllCars();
}



class ParkingLot implements Parking
{
    private $parking = []; // our Parking Lot
    private $parkingLines; // How many lines (rows) will be in our Parking
    private $lineLimit; // How many cars will be available for each line

  /**
   * ParkingLot constructor.
   * @param int $parkingLines
   * @param int $lineLimit
   */
    public function __construct(int $parkingLines, int $lineLimit)
    {
        $this->parkingLines = $parkingLines;
        $this->lineLimit    = $lineLimit;

        // Lets build parking lines for parking lot as many as we can
        for ($i=0; $i<$this->parkingLines; $i++) {
            // let it be parkingLine_# an Array. We will add and remove cars in lines of parking.
            $this->parking['parkingLine_'.$i] = [];
        }
    }

    /**
     * @param $car - string
     * @return bool
     */
    public function addToParking(string $car):bool
    {
        // Let's check which parking line has place for car.
        foreach ($this->parking as $key => $parkLine) {
            if(count($parkLine) < $this->lineLimit) {
                $this->parking[$key][] = $car; // if there is a place in current parkline, stop and add a car there
                return true; // Car was parked
            }
        }
        return false;  // if all lines are occupied
    }

    /**
     * @param $car
     * @return bool
     */

    public function removeFromParking(string $car):bool
    {
        // We have car's name. Let's find and remove it.
        foreach ($this->parking as $key => $parkLine) {
            if(in_array($car, $parkLine)) { // check if we have this car in our line,
                array_splice($this->parking[$key], array_search($car, $parkLine), 1); // remove it.
                return true;
            }
        }
        return false; // we couldn't find our car.
    }

    /**
     * @return array
     */
    public function getAllCars():array
    {
        return $this->parking;
    }
}