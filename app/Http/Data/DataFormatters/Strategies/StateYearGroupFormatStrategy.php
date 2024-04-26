<?php

namespace App\Http\Data\DataFormatters\Strategies;

use App\Http\Data\Abstract\Strategies\DataFormatStrategyInterface;
use App\Http\Domain\Entities\TotalCnaeConsumeDataEntity;

class StateYearGroupFormatStrategy implements DataFormatStrategyInterface
{
    /**
     * @param TotalCnaeConsumeDataEntity[] $data
     * @return object 
     */
    public function formatData(array $data): object
    {
        $formattedData = [
            'states' => [],
            'years' => []
        ];

        $states = array_unique(array_map(function ($entity) {
            return $entity->getState();
        }, $data));

        $years = array_unique(array_map(function ($entity) {
            return $entity->getYear();
        }, $data));

        foreach ($years as $year) {
            $yearData = [
                'year' => strval($year),
                'quantities' => []
            ];

            foreach ($states as $state) {
                $yearData['quantities'][$state] = 0;
            }

            foreach ($data as $entity) {
                if ($entity->getYear() == $year) {
                    $state = $entity->getState();
                    $yearData['quantities'][$state]++;
                }
            }

            $yearData['quantities'] = array_values(
                get_object_vars((object)$yearData['quantities'])
            );
            $formattedData['years'][] = $yearData;
        }

        $formattedData['states'] = array_values(
            get_object_vars((object)$states)
        );

        return (object) $formattedData;
    }
}
