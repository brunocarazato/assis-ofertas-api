<?php
declare(strict_types=1);

namespace App\Domain\Promocao;

interface PromocaoRepository
{
    /**
     * @return Promocao[]
     */
    public function findAll(): array;

    /**
     * @param Promocao $promocao
     * @return Promocao
     * @throws PromocaoNotFoundException
     */
    public function create(Promocao $promocao): string;

    /**
     * @param int $id
     * @return Promocao
     * @throws PromocaoNotFoundException
     */
    public function findPromocaoOfId(int $id): Promocao;
}
