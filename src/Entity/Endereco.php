<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EnderecoRepository")
 */
class Endereco
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $pais;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $estado;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $cidade;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $bairro;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $logradouro;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $referencia;

    public function fromArray(array $data)
    {
        $this->setPais($data['pais']);
        $this->setEstado($data['estado']);
        $this->setCidade($data['cidade']);
        $this->setBairro($data['bairro']);
        $this->setLogradouro($data['logradouro']);
        $this->setNumero($data['numero']);
        $this->setReferencia($data['referencia'] ?? null);
    }

    public function jsonSerialize()
    {
        return [
            'id'         => $this->getId(),
            'pais'       => $this->getPais(),
            'estado'     => $this->getEstado(),
            'cidade'     => $this->getCidade(),
            'bairro'     => $this->getBairro(),
            'logradouro' => $this->getLogradouro(),
            'numero'     => $this->getNumero(),
            'referencia' => $this->getReferencia()
        ];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPais()
    {
        return $this->pais;
    }

    public function setPais($pais)
    {
        $this->pais = $pais;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function getLogradouro()
    {
        return $this->logradouro;
    }

    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }

    public function getReferencia()
    {
        return $this->referencia;
    }

    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;
    }
}
