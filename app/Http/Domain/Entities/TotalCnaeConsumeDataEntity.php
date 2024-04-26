<?php

namespace App\Http\Domain\Entities;

class TotalCnaeConsumeDataEntity
{
    private int $year;
    private string $description;
    private string $region;
    private float $total;
    private string $state;
    private int $month;

    public function getYear(): int
    {
        return $this->year;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function setRegion(string $region): void
    {
        $this->region = $region;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function setTotal(float $total): void
    {
        $this->total = $total;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): void
    {
        $this->state = $state;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function setMonth(int $month): void
    {
        $this->month = $month;
    }
}
