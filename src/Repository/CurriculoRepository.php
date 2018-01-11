<?php

namespace App\Repository;

use App\Entity\Curriculo;
use App\Entity\Endereco;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CurriculoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Curriculo::class);
    }

    public function store(array $data)
    {
        $em = $this->getEntityManager();
        $curriculo = new Curriculo();

        $curriculo->fromArray($data);

        $endereco = new Endereco();
        $endereco->fromArray($data['endereco']);
        
        $curriculo->setEndereco($endereco);
        
        $em->persist($endereco);
        $em->persist($curriculo);
        $em->flush();
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('c')
            ->where('c.something = :value')->setParameter('value', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
