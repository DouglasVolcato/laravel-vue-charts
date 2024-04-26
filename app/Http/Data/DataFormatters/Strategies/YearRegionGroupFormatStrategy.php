<?php

namespace App\Http\Data\DataFormatters\Strategies;

use App\Http\Data\Abstract\Strategies\DataFormatStrategyInterface;
use App\Http\Domain\Entities\TotalCnaeConsumeDataEntity;

class YearRegionGroupFormatStrategy implements DataFormatStrategyInterface
{
    /**
     * @param TotalCnaeConsumeDataEntity[] $data
     * @return object 
     */
    public function formatData(array $data): object
    {
        $formattedData = [
            'years' => [],
            'regions' => []
        ];

        $years = array_unique(array_map(function ($entity) {
            return $entity->getYear();
        }, $data));

        $regions = array_unique(array_map(function ($entity) {
            return $entity->getRegion();
        }, $data));

        foreach ($regions as $region) {
            $regionData = [
                'region' => strval($region),
                'quantities' => []
            ];

            foreach ($years as $year) {
                $regionData['quantities'][$year] = 0;
            }

            foreach ($data as $entity) {
                if ($entity->getRegion() == $region) {
                    $year = $entity->getYear();
                    $regionData['quantities'][$year]++;
                }
            }

            $regionData['quantities'] = array_values(
                get_object_vars((object)$regionData['quantities'])
            );
            $formattedData['regions'][] = $regionData;
        }

        $formattedData['years'] = array_values(
            get_object_vars((object)$years)
        );

        return (object) $formattedData;
    }
}
