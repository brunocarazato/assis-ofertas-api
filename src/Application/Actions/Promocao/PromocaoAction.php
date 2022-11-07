<?php
declare(strict_types=1);

namespace App\Application\Actions\Promocao;

use App\Application\Actions\Action;
use App\Domain\Promocao\PromocaoRepository;
use Psr\Log\LoggerInterface;

abstract class PromocaoAction extends Action
{
    protected PromocaoRepository $promocaoRepository;

    public function __construct(LoggerInterface $logger, PromocaoRepository $promocaoRepository)
    {
        parent::__construct($logger);
        $this->promocaoRepository = $promocaoRepository;
    }
}
