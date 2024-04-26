<?php

namespace App\Http\Presentation\Controllers;

use App\Http\Domain\Services\TotalCnaeConsumeServiceFacade;

class TotalCnaeConsumeController
{
    private TotalCnaeConsumeServiceFacade $totalCnaeConsumeServiceFacade;

    public function __construct(TotalCnaeConsumeServiceFacade $totalCnaeConsumeServiceFacade)
    {
        $this->totalCnaeConsumeServiceFacade = $totalCnaeConsumeServiceFacade;
    }

    public function index(): object
    {
        return (object)[
            'descriptionGroup' => $this->totalCnaeConsumeServiceFacade->getDescriptionGroupData(),
            'regionGroup' => $this->totalCnaeConsumeServiceFacade->getRegionGroupData(),
            'stateGroup' => $this->totalCnaeConsumeServiceFacade->getStateGroupData(),
            'regionYearGroup' => $this->totalCnaeConsumeServiceFacade->getRegionYearGroupData(),
            'stateYearGroup' => $this->totalCnaeConsumeServiceFacade->getStateYearGroupData(),
            'yearRegionGroup' => $this->totalCnaeConsumeServiceFacade->getYearRegionGroupData(),
            'yearStateGroup' => $this->totalCnaeConsumeServiceFacade->getYearStateGroupData(),
        ];
    }
}
