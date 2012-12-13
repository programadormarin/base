<?php
namespace hmarinjr\BaseProject\Infra\Persistence;

class EntityRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param \hmarinjr\BaseProject\Infra\Persistence\Entity $obj
     */
    public function append(Entity $obj)
    {
        if ($obj->getId() > 0) {
            throw new EntityAlreadyExistsException(
                'Não é possível criar uma entidade que já existe'
            );
        }

        $this->getEntityManager()->persist($obj);
        $this->getEntityManager()->flush();
    }

    /**
     * @param \hmarinjr\BaseProject\Infra\Persistence\Entity $obj
     */
    public function remove(Entity $obj)
    {
        if ($obj->getId() == 0) {
            throw new EntityDoesNotExistsException(
                'Não é possível atualizar uma entidade que ainda não foi adicionada'
            );
        }

        $this->getEntityManager()->remove($obj);
        $this->getEntityManager()->flush();
    }

    /**
     * @param \hmarinjr\BaseProject\Infra\Persistence\Entity $obj
     */
    public function update(Entity $obj)
    {
        if ($obj->getId() == 0) {
            throw new EntityDoesNotExistsException(
                'Não é possível atualizar uma entidade que ainda não foi adicionada'
            );
        }

        $this->getEntityManager()->persist($obj);
        $this->getEntityManager()->flush();
    }
}