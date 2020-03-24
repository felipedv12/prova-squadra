<?php


namespace App\Transformers;


use App\Entities\Sistema;

class SistemaTransformer
{
    public function transform(Sistema $sistema){
        return[
            'idSistema' => $sistema->getIdSistema(),
            'descricaoSistema' => $sistema->getDescricaoSistema(),
            'siglaSistema' => $sistema->getSiglaSistema(),
            'emailSistema' => $sistema->getEmailSistema(),
            'urlSistema' => $sistema->getUrlSistema(),
            'statusSistema' => ($sistema->getStatusSistema() ? 'Ativo' : 'Cancelado')
        ];
    }

    public function transformAll(array $sistemas) {
        return array_map(
            function ($sistema) {
                return $this->transform($sistema);
            }, $sistemas
        );
    }
}
