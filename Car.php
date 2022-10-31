<?php


class Car
{

    public const ALLOWED_ENERGIES = 
    [
        'fuel',
        'electric',
    ];

    private string $energy;
    private int $fuelLevel;
    private bool $hasParkBrake= true;

    public function __construct(string $color, int $nbSeats, string $energy, int $currentSpeed)
    {  
        $this->color = $color;
        $this->nbSeats = $nbSeats;
        $this->energy = $energy;
        $this->currentSpeed = $currentSpeed;
    }

    public function getEnergy(): string
    {
        return $this->energy;
    }

    public function setEnergy(string $energy) : Car
    {
        if(in_array($energy, self::ALLOWED_ENERGIES)){
            $this->energy = $energy;
            // $this->setEnergy($energy);
        }
        return $this;
    }


    public function getFuelLevel(): int
    {   
        return $this->fuelLevel;
    }

    public function setFuelLevel(int $fuelLevel) : void
    {
        $this->fuelLevel = $fuelLevel;
    }

    public function getHasParkBrake(): bool
    {
        return $this->hasParkBrake;
    }

    public function setHasParkBrake(bool $hasParkBrake) : void
    {
        $this->hasParkBrake = $hasParkBrake;
    }

    public function forward(): string
    {
        $this->currentSpeed = 15;
        return "Go !";
    }

    public function brake(): string
    {
        $sentence = "";
        while ($this->currentSpeed > 0) {
            $this->currentSpeed--;
            $sentence .= "Brake !!!";
        }

        $sentence .= "I'm stopped !";
        return $sentence;
    }
    public function start(): void
    {
        try {
            if ($this->hasParkBrake) {
                echo 'OK to start, the handbrake is off <br>' . PHP_EOL;
            } else {
                throw new Exception('the handbrake is on !<br>');
            }
        } catch (Exception $e) {
            echo 'problem: ' . $e->getMessage() . PHP_EOL;
            echo 'solution: the handbrake is off now <br>';
        } finally {
            echo 'My car runs like a donut!<br>' . PHP_EOL;
        }
    }
}