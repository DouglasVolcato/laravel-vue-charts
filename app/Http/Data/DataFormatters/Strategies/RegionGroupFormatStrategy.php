<?php

namespace App\Http\Data\DataFormatters\Strategies;

use App\Http\Data\Abstract\Strategies\DataFormatStrategyInterface;
use App\Http\Domain\Entities\TotalCnaeConsumeDataEntity;

class RegionGroupFormatStrategy implements DataFormatStrategyInterface
{
    /**
     * @param TotalCnaeConsumeDataEntity[] $data 
     * @return object
     */
    public function formatData(array $data): object
    {
        $regions = [];
        $quantities = [];

        foreach ($data as $entity) {
            $region = $entity->getRegion();

            if (!isset($regions[$region])) {
                $regions[$region] = $region;
                $quantities[$region] = 0;
            }
            $quantities[$region]++;
        }

        return (object)[
            'regions' => array_values($regions),
            'quantities' => array_values($quantities)
        ];
    }
}
