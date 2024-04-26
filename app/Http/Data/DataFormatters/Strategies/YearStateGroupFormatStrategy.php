<?php

namespace App\Http\Data\DataFormatters\Strategies;

use App\Http\Data\Abstract\Strategies\DataFormatStrategyInterface;
use App\Http\Domain\Entities\TotalCnaeConsumeDataEntity;

class YearStateGroupFormatStrategy implements DataFormatStrategyInterface
{
    /**
     * @param TotalCnaeConsumeDataEntity[] $data
     * @return object 
     */
    public function formatData(array $data): object
    {
        $formattedData = [
            'years' => [],
            'states' => []
        ];

        $years = array_unique(array_map(function ($entity) {
            return $entity->getYear();
        }, $data));

        $states = array_unique(array_map(function ($entity) {
            return $entity->getState();
        }, $data));

        foreach ($states as $state) {
            $stateData = [
                'state' => strval($state),
                'quantities' => []
            ];

            foreach ($years as $year) {
                $stateData['quantities'][$year] = 0;
            }

            foreach ($data as $entity) {
                if ($entity->getState() == $state) {
                    $year = $entity->getYear();
                    $stateData['quantities'][$year]++;
                }
            }

            $stateData['quantities'] = array_values(
                get_object_vars((object)$stateData['quantities'])
            );
            $formattedData['states'][] = $stateData;
        }
        
        $formattedData['years'] = array_values(
            get_object_vars((object)$years)
        );

        return (object) $formattedData;
    }
}
