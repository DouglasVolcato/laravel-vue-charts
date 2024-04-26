<?php

namespace App\Http\Infra\Gateways;

use App\Http\Domain\Entities\TotalCnaeConsumeDataEntity;
use Illuminate\Support\Facades\Http;

class GetTotalCnaeConsumeDataGateway
{
    /**
     * @return TotalCnaeConsumeDataEntity[]
     */
    public function execute(): array
    {
        $response = Http::get(getenv('REGION_GOV_DATA'));
        if ($response->successful()) {
            $apiData = $response->json()['benf_autorizadas_completo'];
            $entities = [];

            foreach ($apiData as $item) {
                if ($this->validData($item)) {
                    $entity = new TotalCnaeConsumeDataEntity();
                    $entity->setYear($item['ANO DO CONSUMO']);
                    $entity->setDescription($item['DESCRICAO']);
                    $entity->setRegion($item['REGIÃO']);
                    $entity->setTotal($item['TOTAL']);
                    $entity->setState($item['UF']);
                    $entity->setMonth($item['MÊS DO CONSUMO']);
                    $entities[] = $entity;
                }
            }

            return $entities;
        } else {
            return [];
        }
    }

    private function validData(array $data)
    {
        if (
            !isset($data['ANO DO CONSUMO']) ||
            !isset($data['DESCRICAO']) ||
            !isset($data['REGIÃO']) ||
            !isset($data['TOTAL']) ||
            !isset($data['UF']) ||
            !isset($data['MÊS DO CONSUMO'])
        ) {
            return false;
        };
        return true;
    }
}
