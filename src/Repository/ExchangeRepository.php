<?php

namespace App\Repository;

use App\Entity\Exchange;

/**
 * ExchangeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ExchangeRepository extends \Doctrine\ORM\EntityRepository
{
    public function findExchanges()
    {
        $qb = $this->createQueryBuilder('e');

        return $qb->getQuery()->getArrayResult();
    }

    public function findCheapestExchanges()
    {
        $qb = $this->createQueryBuilder('e');

        $qb
            ->select('e, MIN(e.rate) AS HIDDEN minRate')
            ->groupBy('e.code')
            ->orderBy('minRate', 'DESC');

        return $qb->getQuery()->getArrayResult();
    }

    public function insert(Exchange $exchange)
    {
        $em = $this->getEntityManager();

        $em->persist($exchange);
        $em->flush($exchange);
    }

    public function findOneByProviderAndCode(string $provider, string $code)
    {
        $qb = $this->createQueryBuilder('e');

        $qb
            ->where($qb->expr()->eq('e.provider', ':provider'))
            ->andWhere($qb->expr()->eq('e.code', ':code'))
            ->setParameters(
                [
                    'provider' => $provider,
                    'code' => $code,
                ]
            );

        return $qb->getQuery()->getOneOrNullResult();
    }

    public function update(Exchange $exchange)
    {
        $em = $this->getEntityManager();

        $em->flush($exchange);
    }
}