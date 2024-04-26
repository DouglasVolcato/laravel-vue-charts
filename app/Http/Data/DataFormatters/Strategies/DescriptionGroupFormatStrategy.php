<?php

namespace App\Http\Data\DataFormatters\Strategies;

use App\Http\Data\Abstract\Strategies\DataFormatStrategyInterface;
use App\Http\Domain\Entities\TotalCnaeConsumeDataEntity;

class DescriptionGroupFormatStrategy implements DataFormatStrategyInterface
{
    /**
     * @param TotalCnaeConsumeDataEntity[] $data 
     * @return object
     */
    public function formatData(array $data): object

    {
        $descriptions = [];
        $quantities = [];

        foreach ($data as $entity) {
            $description = $entity->getDescription();

            if (!isset($descriptions[$description])) {
                $descriptions[$description] = $description;
                $quantities[$description] = 0;
            }
            $quantities[$description]++;
        }

        return (object)[
            'descriptions' => array_values($descriptions),
            'quantities' => array_values($quantities)
        ];
    }
}
