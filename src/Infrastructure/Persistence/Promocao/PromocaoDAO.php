<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Promocao;

use App\Domain\Promocao\Promocao;
use App\Domain\Promocao\PromocaoNotFoundException;
use App\Domain\Promocao\PromocaoRepository;
use Slim\App;
use PDO;

class PromocaoDAO implements PromocaoRepository
{
    /**
     * @var Promocao[]
     */
    private array $promocoes;

    /**
     * @param Promocao[]|null $promocoes
     */
    public function __construct(array $promocoes = null, PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        $sth = $this->connection->prepare("SELECT * FROM promocao ORDER BY id");
        $sth->execute();
        $data = $sth->fetchAll(\PDO::FETCH_ASSOC);
        $payload = $data;
        $this->promocoes = $payload;
        return array_values($this->promocoes);
    }

    public function create(Promocao $novo): string
    {
        $sth = $this->connection->prepare("INSERT INTO promocao(produto, categoria, fotoPromocao, dataIni, dataFim, ativa) VALUES (:produto, :categoria, :fotoPromocao, :dataIni, :dataFim, :ativa)");
        $sth->execute(array('produto' => $novo->getProduto(), 'categoria' => $novo->getCategoria(), 'fotoPromocao' => $novo->getFotoPromocao(), 'dataIni' => $novo->getDataIni()->format('Y-m-d H:i:s'), 'dataFim' => $novo->getDataFim()->format('Y-m-d H:i:s'), 'ativa' => (!$novo->getAtiva() ? 0 : 1)));
        $sth->fetchAll(\PDO::FETCH_ASSOC);
        $lastId = $this->connection->lastInsertId();
        return $lastId;
    }

    /**
     * {@inheritdoc}
     */
    public function findPromocaoOfId(int $id): Promocao
    {
        if (!isset($this->promocoes[$id])) {
            throw new PromocaoNotFoundException();
        }

        return $this->promocoes[$id];
    }
}
