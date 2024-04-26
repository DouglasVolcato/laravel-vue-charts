<?php

namespace App\Http\Data\Abstract\Strategies;

use App\Http\Domain\Entities\TotalCnaeConsumeDataEntity;

interface DataFormatStrategyInterface
{
    /**
     * @param TotalCnaeConsumeDataEntity[] $data 
     * @return object
     */
    public function formatData(array $data): object;
}
