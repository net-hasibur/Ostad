<?php

require_once 'VehicleBase.php';
require_once 'VehicleActions.php';
require_once 'FileHandler.php';

class VehicleManager extends VehicleBase implements VehicleActions
{
    use FileHandler;

    public function addVehicle($data): void
    {
        $vehicles = $this->readFile();
        $vehicles[] = $data;
        $this->writeFile($vehicles);
    }

    public function editVehicle($id, $data): void
    {
        $vehicles = $this->readFile();

        if (isset($vehicles[$id])) {
            $vehicles[$id] = $data;
            $this->writeFile($vehicles);
        }
    }

    public function deleteVehicle($id): void
    {
        $vehicles = $this->readFile();

        if (isset($vehicles[$id])) {
            unset($vehicles[$id]);
            $this->writeFile(array_values($vehicles));
        }
    }

    public function getVehicles(): mixed
    {
        return $this->readFile();
    }

    public function getDetails($id)
    {
        $vehicles = $this->readFile();
        return $vehicles[$id] ?? null;
    }
}