<?php
declare(strict_types=1);

namespace App\Application\Actions\Promocao;

use Psr\Http\Message\ResponseInterface as Response;

class ListPromocaoAction extends PromocaoAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $promocoes = $this->promocaoRepository->findAll();

        $this->logger->info("Promocoes list was viewed.");

        return $this->respondWithData($promocoes);
    }
}
