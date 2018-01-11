<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Fresh\DoctrineEnumBundle\Validator\Constraints as DoctrineAssert;
use App\Entity\Enum\SexoType;
use App\Entity\Enum\EstadoCivilType;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CurriculoRepository")
 */
class Curriculo implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Endereco")
     * @ORM\JoinColumn(name="endereco_id", referencedColumnName="id", nullable=false)
     */
    private $endereco;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="SexoType", nullable=false)
     * @DoctrineAssert\Enum(entity="App\Entity\Enum\SexoType")
     */
    private $sexo;

    /**
     * @ORM\Column(type="integer")
     */
    private $idade;

    /**
     * @ORM\Column(type="EstadoCivilType", nullable=false)
     * @DoctrineAssert\Enum(entity="App\Entity\Enum\EstadoCivilType")
     */
    private $estadoCivil;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $telefone;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descricao;
    
    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $habilidades;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $experiencias;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $formacao;

    public function __get($property)
    {
        return $this->$property;
    }

    public function jsonSerialize()
    {
        return [
            'id'           => $this->id,
            'name'         => $this->getName(),
            'sexo'         => $this->getSexo(),
            'idade'        => $this->getIdade(),
            'estado_civil' => $this->getEstadoCivil(),
            'telefone'     => $this->getTelefone(),
            'descricao'    => $this->getDescricao(),
            'habilidades'  => $this->getHabilidades(),
            'experiencias' => $this->getExperiencias(),
            'formacao'     => $this->getFormacoes()
        ];
    }

    public function fromArray(array $data)
    {
        $this->setName($data['name']);
        $this->setSexo($data['sexo']);
        $this->setEstadoCivil($data['estado_civil']);
        $this->setIdade($data['idade']);
        $this->setEmail($data['email']);
        $this->setTelefone($data['telefone']);

        $this->setDescricao($data['descricao'] ?? null);
        $this->setHabilidades($data['habilidades'] ?? null);
        $this->setExperiencias($data['experiencias'] ?? null);
        $this->setFormacoes($data['formacao'] ?? null);
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSexo()
    {
        return $this->name;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function getEstadoCivil()
    {
        return $this->estadoCivil;
    }

    public function setEstadoCivil($estadoCivil)
    {
        $this->estadoCivil = $estadoCivil;
    }

    public function getIdade()
    {
        return $this->idade;
    }

    public function setIdade($idade)
    {
        $this->idade = $idade;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getHabilidades()
    {
        return $this->habilidades;
    }

    public function setHabilidades($habilidade)
    {
        if (is_array($habilidade)) {
            $this->habilidades = $habilidade;
            return;
        }

        $this->habilidades[] = $habilidade;
    }

    public function getExperiencias()
    {
        return $this->habilidades;
    }

    public function setExperiencias($experiencia)
    {
        if (is_array($experiencia)) {
            $this->experiencias = $experiencia;
            return;
        }

        $this->experiencias[] = $experiencia;
    }

    public function getFormacoes()
    {
        return $this->formacao;
    }

    public function setFormacoes($formacao)
    {
        if (is_array($formacao)) {
            $this->formacao = $formacao;
            return;
        }

        $this->formacao[] = $formacao;
    }
}