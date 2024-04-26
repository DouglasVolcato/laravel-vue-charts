<?php

namespace App\Http\Data\DataFormatters\Strategies;

use App\Http\Data\Abstract\Strategies\DataFormatStrategyInterface;
use App\Http\Domain\Entities\TotalCnaeConsumeDataEntity;

class StateGroupFormatStrategy implements DataFormatStrategyInterface
{
    /**
     * @param TotalCnaeConsumeDataEntity[] $data 
     * @return object
     */
    public function formatData(array $data): object
    {
        $states = [];
        $quantities = [];

        foreach ($data as $entity) {
            $state = $entity->getState();

            if (!isset($states[$state])) {
                $states[$state] = $state;
                $quantities[$state] = 0;
            }
            $quantities[$state]++;
        }

        return (object)[
            'states' => array_values($states),
            'quantities' => array_values($quantities)
        ];
    }
}
