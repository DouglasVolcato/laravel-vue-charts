<?php

namespace App\Http\Data\DataFormatters\Factories;

use App\Http\Data\DataFormatters\Strategies\DescriptionGroupFormatStrategy;
use App\Http\Data\DataFormatters\Strategies\YearRegionGroupFormatStrategy;
use App\Http\Data\DataFormatters\Strategies\RegionYearGroupFormatStrategy;
use App\Http\Data\DataFormatters\Strategies\YearStateGroupFormatStrategy;
use App\Http\Data\DataFormatters\Strategies\StateYearGroupFormatStrategy;
use App\Http\Data\DataFormatters\Strategies\RegionGroupFormatStrategy;
use App\Http\Data\DataFormatters\Strategies\StateGroupFormatStrategy;
use App\Http\Data\Abstract\Strategies\DataFormatStrategyInterface;
use App\Http\Data\DataFormatters\Enums\StrategyTypeEnum;

class TotalCnaeConsumeDataFormatFactory
{
    public function initialize(int $strategyType): DataFormatStrategyInterface
    {
        switch ($strategyType) {
            case StrategyTypeEnum::DESCRIPTION:
                return new DescriptionGroupFormatStrategy();

            case StrategyTypeEnum::REGION:
                return new RegionGroupFormatStrategy();

            case StrategyTypeEnum::STATE:
                return new StateGroupFormatStrategy();

            case StrategyTypeEnum::REGION_YEAR:
                return new RegionYearGroupFormatStrategy();

            case StrategyTypeEnum::STATE_YEAR:
                return new StateYearGroupFormatStrategy();

            case StrategyTypeEnum::YEAR_REGION:
                return new YearRegionGroupFormatStrategy();

            case StrategyTypeEnum::YEAR_STATE:
                return new YearStateGroupFormatStrategy();
        }
    }
}
