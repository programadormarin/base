<?php
namespace hmarinjr\BaseProject\Domain\Repository;

use \hmarinjr\BaseProject\Infra\Persistence\EntityRepository;

class UserRepository extends EntityRepository
{
    /**
     * @param string $twitterUser
     * @return \hmarinjr\BaseProject\Domain\Entity\User
     */
    public function findOneByTwitterUser($twitterUser)
    {
        $query = $this->createQueryBuilder('user')
                      ->andWhere('user.twitterUser = ?1')
                      ->setParameter(1, $twitterUser)
                      ->setMaxResults(1)
                      ->getQuery();

        $query->useQueryCache(true);

        return $query->getOneOrNullResult();
    }
}