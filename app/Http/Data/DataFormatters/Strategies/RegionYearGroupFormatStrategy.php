<?php

namespace App\Http\Data\DataFormatters\Strategies;

use App\Http\Data\Abstract\Strategies\DataFormatStrategyInterface;
use App\Http\Domain\Entities\TotalCnaeConsumeDataEntity;

class RegionYearGroupFormatStrategy implements DataFormatStrategyInterface
{
    /**
     * @param TotalCnaeConsumeDataEntity[] $data
     * @return object 
     */
    public function formatData(array $data): object
    {
        $formattedData = [
            'regions' => [],
            'years' => []
        ];

        $regions = array_unique(array_map(function ($entity) {
            return $entity->getRegion();
        }, $data));

        $years = array_unique(array_map(function ($entity) {
            return $entity->getYear();
        }, $data));

        foreach ($years as $year) {
            $yearData = [
                'year' => strval($year),
                'quantities' => []
            ];

            foreach ($regions as $region) {
                $yearData['quantities'][$region] = 0;
            }

            foreach ($data as $entity) {
                if ($entity->getYear() == $year) {
                    $region = $entity->getRegion();
                    $yearData['quantities'][$region]++;
                }
            }

            $yearData['quantities'] = array_values(
                get_object_vars((object)$yearData['quantities'])
            );
            $formattedData['years'][] = $yearData;
        }

        $formattedData['regions'] = array_values(
            get_object_vars((object)$regions)
        );

        return (object) $formattedData;
    }
}
