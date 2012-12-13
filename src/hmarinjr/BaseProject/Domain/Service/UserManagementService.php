<?php
namespace hmarinjr\BaseProject\Domain\Service;

use \Abraham\TwitterOAuth\TwitterClient;
use \hmarinjr\BaseProject\Domain\Entity\User;
use \hmarinjr\BaseProject\Domain\Repository\UserRepository;

class UserManagementService
{
    /**
     * @var \hmarinjr\BaseProject\Domain\Repository\UserRepository
     */
    private $repository;

    /**
     * @param \hmarinjr\BaseProject\Domain\Repository\UserRepository $repository
     * @param \Abraham\TwitterOAuth\TwitterClient $client
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $name
     * @param string $twitterUser
     * @param string $email
     * @param string $githubUser
     * @param string $bio
     * @param boolean $follow
     * @return \hmarinjr\BaseProject\Domain\Entity\User
     */
    public function create(
        $name,
        $twitterUser,
        $email,
        $githubUser,
        $bio,
        $follow
    ) {
        $user = User::create(
            $name,
            $twitterUser,
            $email,
            $githubUser,
            $bio
        );

        $this->repository->append($user);

        if ($follow) {
            $this->client->createFriendship('PHP_SC');
        }

        return $user;
    }

    /**
     * @param int $id
     * @param string $name
     * @param string $email
     * @param string $githubUser
     * @param string $bio
     * @return \hmarinjr\BaseProject\Domain\Entity\User
     */
    public function update(
        $id,
        $name,
        $email,
        $githubUser,
        $bio
    ) {
        $user = $this->getById($id);
        $user->setName($name);
        $user->setEmail($email);
        $user->setGithubUser($githubUser);
        $user->setBio($bio);

        $this->repository->update($user);

        return $user;
    }

    /**
     * @param int $id
     * @return \hmarinjr\BaseProject\Domain\Entity\User
     */
    public function getById($id)
    {
        return $this->repository->findOneById($id);
    }

    /**
     * @param string $twitterUser
     * @return \hmarinjr\BaseProject\Domain\Entity\User
     */
    public function getByTwitterUser($twitterUser)
    {
        return $this->repository->findOneByTwitterUser($twitterUser);
    }
}