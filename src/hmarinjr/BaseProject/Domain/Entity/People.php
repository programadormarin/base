<?php
namespace hmarinjr\BaseProject\Domain\Entity;

use \Doctrine\Common\Collections\ArrayCollection;
use \hmarinjr\BaseProject\Infra\Persistence\Entity;
use \InvalidArgumentException;
use \DateTime;

/**
 * @Entity(repositoryClass="hmarinjr\BaseProject\Domain\Repository\PeopleRepository")
 * @Table("people")
 * @author Hermenegildo Marin Júnior <hermenegildo@qualitysistemas.com.br>
 */
class People implements Entity
{
    /**
     * @Id
 	 * @Column(type="integer")
	 * @generatedValue(strategy="IDENTITY")
     * @var int
     */
    private $id;

     /**
     * @OneToOne(targetEntity="User")
     * @var \hmarinjr\BaseProject\Domain\Entity\User
     */
    private $user;

    /**
     * @Column(type="boolean")
     * @var boolean
     */
    private $active;

    /**
     * @Column(type="datetime", nullable=false, name="creation_time")
     * @var \DateTime
     */
    private $creationTime;

	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param int
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return \hmarinjr\BaseProject\Domain\Entity\User
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * @param \hmarinjr\BaseProject\Domain\Entity\User $user
	 */
	public function setUser(User $user) {
		$this->user = $user;
	}

	/**
     * @return boolean
     */
    public function isActived()
    {
        return $this->active;
    }

	/**
     * @param boolean $active
     */
    public function setActive($active)
    {
        if ($active !== null && !is_bool($active)) {
            throw new InvalidArgumentException(
                'Ativado deve ser TRUE ou FALSE'
            );
        }

        $this->active = $active;
    }

	/**
     * @return \DateTime
     */
    public function getCreationTime()
    {
        return $this->creationTime;
    }

	/**
     * @param \DateTime $creationTime
     */
    public function setCreationTime(DateTime $creationTime)
    {
        $this->creationTime = $creationTime;
    }
}