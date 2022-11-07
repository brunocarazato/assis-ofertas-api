<?php
declare(strict_types=1);

namespace App\Domain\Promocao;

use App\Domain\DomainException\DomainRecordNotFoundException;

class PromocaoNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The Promocao you requested does not exist.';
}
