<?php

namespace App\Security;

use App\Entity\User;
use App\Repository\UserRepository;
use Lexik\Bundle\JWTAuthenticationBundle\Security\User\PayloadAwareUserProviderInterface;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;

class JwtUserProvider implements PayloadAwareUserProviderInterface
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    /**
     * @throws \JsonException
     */
    public function loadUserByIdentifier(string $identifier): UserInterface
    {
        return $this->getUser('email', $identifier);
    }

    /**
     * @throws \JsonException
     */
    public function loadUserByIdentifierAndPayload(string $identifier, array $payload): UserInterface
    {
        return $this->getUser('id', $payload['id']);
    }

    public function refreshUser(UserInterface $user): ?UserInterface
    {
        return null;
    }

    public function supportsClass(string $class)
    {
        return User::class === $class || is_subclass_of($class, User::class);
    }

    private function getUser($key, $value): UserInterface
    {
        $user = $this->userRepository->findOneBy([$key => $value]);
        if (null === $user) {
            $e = new UserNotFoundException('User with id '.json_encode($value, JSON_THROW_ON_ERROR).' not found.');
            $e->setUserIdentifier(json_encode($value, JSON_THROW_ON_ERROR));

            throw $e;
        }

        return $user;
    }
}
