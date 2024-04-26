<?php

namespace App\Http\Domain\Services;

use App\Http\Data\DataFormatters\Factories\TotalCnaeConsumeDataFormatFactory;
use App\Http\Infra\Gateways\GetTotalCnaeConsumeDataGateway;
use App\Http\Data\DataFormatters\Enums\StrategyTypeEnum;
use App\Http\Domain\Entities\TotalCnaeConsumeDataEntity;

class TotalCnaeConsumeServiceFacade
{
    /** @var TotalCnaeConsumeDataEntity[] */
    private $data;
    private TotalCnaeConsumeDataFormatFactory $totalCnaeConsumeDataFormatFactory;
    private GetTotalCnaeConsumeDataGateway $getTotalCnaeConsumeDataGateway;

    public function __construct(
        GetTotalCnaeConsumeDataGateway $getTotalCnaeConsumeDataGateway,
        TotalCnaeConsumeDataFormatFactory $totalCnaeConsumeDataFormatFactory
    ) {
        $this->getTotalCnaeConsumeDataGateway = $getTotalCnaeConsumeDataGateway;
        $this->totalCnaeConsumeDataFormatFactory = $totalCnaeConsumeDataFormatFactory;
        $this->requestAndSetTotalCnaeConsumeData();
    }

    public function getDescriptionGroupData(): object
    {
        $formatStrategy = $this->totalCnaeConsumeDataFormatFactory->initialize(
            StrategyTypeEnum::DESCRIPTION
        );
        return $formatStrategy->formatData($this->data);
    }

    public function getRegionGroupData()
    {
        $formatStrategy = $this->totalCnaeConsumeDataFormatFactory->initialize(
            StrategyTypeEnum::REGION
        );
        return $formatStrategy->formatData($this->data);
    }

    public function getStateGroupData()
    {
        $formatStrategy = $this->totalCnaeConsumeDataFormatFactory->initialize(
            StrategyTypeEnum::STATE
        );
        return $formatStrategy->formatData($this->data);
    }

    public function getRegionYearGroupData()
    {
        $formatStrategy = $this->totalCnaeConsumeDataFormatFactory->initialize(
            StrategyTypeEnum::REGION_YEAR
        );
        return $formatStrategy->formatData($this->data);
    }

    public function getStateYearGroupData()
    {
        $formatStrategy = $this->totalCnaeConsumeDataFormatFactory->initialize(
            StrategyTypeEnum::STATE_YEAR
        );
        return $formatStrategy->formatData($this->data);
    }

    public function getYearRegionGroupData()
    {
        $formatStrategy = $this->totalCnaeConsumeDataFormatFactory->initialize(
            StrategyTypeEnum::YEAR_REGION
        );
        return $formatStrategy->formatData($this->data);
    }

    public function getYearStateGroupData()
    {
        $formatStrategy = $this->totalCnaeConsumeDataFormatFactory->initialize(
            StrategyTypeEnum::YEAR_STATE
        );
        return $formatStrategy->formatData($this->data);
    }

    private function requestAndSetTotalCnaeConsumeData()
    {
        $this->data = $this->getTotalCnaeConsumeDataGateway->execute();
    }
}
