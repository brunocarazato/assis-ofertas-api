<?php
declare(strict_types=1);

namespace App\Domain\Promocao;

use DateTime;
use JsonSerializable;

class Promocao implements JsonSerializable
{
    private ?int $id;

    private string $produto;

    private int $categoria;
    
    private string $fotoPromocao;
    
    // private string $foto1;

    // private string $foto2;

    // private string $foto3;

    private DateTime $dataIni;

    private DateTime $dataFim;

    // private string $diaSemana;

    // private string $tipo; //futuramente pode ser um enum

    // private string $fornecedor;
    
    private bool $ativa;

    // private DateTime $criadoEm;

    // public function __construct(?int $id, string $produto, string $fotoPromocao, string $foto1, 
    //     string $foto2, string $foto3, string $dataIni, string $dataFim, string $diaSemana, string $tipo, string $fornecedor, bool $ativa)
    // {
    //     $this->id = $id;
    //     $this->produto = $produto;
    //     $this->fotoPromocao = $fotoPromocao;
    //     $this->foto1 = $foto1;
    //     $this->foto2 = $foto2;
    //     $this->foto3 = $foto3;
    //     $this->dataIni = $dataIni;
    //     $this->dataFim = $dataFim;
    //     $this->diaSemana = $diaSemana;
    //     $this->tipo = $tipo;
    //     $this->fornecedor = $fornecedor;
    //     $this->ativa = $ativa;

    // }

    public function __construct(){

    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'produto' => $this->produto,
            'categoria' => $this->categoria,
            'dataIni' => $this->dataIni,
            'dataFim' => $this->dataFim,
            'fotoPromocao' => $this->fotoPromocao,
            'ativa' => $this->ativa,
        ];
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * Get the value of produto
     */ 
    public function getProduto()
    {
        return $this->produto;
    }

    /**
     * Set the value of produto
     *
     * @return  self
     */ 
    public function setProduto($produto)
    {
        $this->produto = $produto;

        return $this;
    }

    /**
     * Get the value of dataIni
     */ 
    public function getDataIni()
    {
        return $this->dataIni;
    }

    /**
     * Set the value of dataIni
     *
     * @return  self
     */ 
    public function setDataIni($dataIni)
    {
        $this->dataIni = $dataIni;

        return $this;
    }

    /**
     * Get the value of dataFim
     */ 
    public function getDataFim()
    {
        return $this->dataFim;
    }

    /**
     * Set the value of dataFim
     *
     * @return  self
     */ 
    public function setDataFim($dataFim)
    {
        $this->dataFim = $dataFim;

        return $this;
    }

    /**
     * Get the value of ativa
     */ 
    public function getAtiva()
    {
        return $this->ativa;
    }

    /**
     * Set the value of ativa
     *
     * @return  self
     */ 
    public function setAtiva($ativa)
    {
        $this->ativa = $ativa;

        return $this;
    }

    /**
     * Get the value of fotoPromocao
     */ 
    public function getFotoPromocao()
    {
        return $this->fotoPromocao;
    }

    /**
     * Set the value of fotoPromocao
     *
     * @return  self
     */ 
    public function setFotoPromocao($fotoPromocao)
    {
        $this->fotoPromocao = $fotoPromocao;

        return $this;
    }

    /**
     * Get the value of categoria
     */ 
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of categoria
     *
     * @return  self
     */ 
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }
}