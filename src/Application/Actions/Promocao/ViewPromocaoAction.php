<?php
declare(strict_types=1);

namespace App\Application\Actions\Promocao;

use Psr\Http\Message\ResponseInterface as Response;

class ViewPromocaoAction extends PromocaoAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $promocaoId = (int) $this->resolveArg('id');
        $promocao = $this->promocaoRepository->findPromocaoOfId($promocaoId);

        $this->logger->info("Promocao of id `${promocaoId}` was viewed.");

        return $this->respondWithData($promocao);
    }
}
