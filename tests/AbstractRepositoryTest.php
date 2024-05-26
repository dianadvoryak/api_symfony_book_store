<?php

namespace App\Tests;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class AbstractRepositoryTest extends KernelTestCase
{
    protected ?EntityManagerInterface $em;

    protected static function getKernelClass(): string
    {
        return \App\Kernel::class;
    }

    protected function setUp(): void
    {
        $_ENV['DATABASE_URL'] = $_ENV['DATABASE_URL'] ?? 'postgres://postgres:12345@127.0.0.1:5432/postgres';
        $_SERVER['DATABASE_URL'] = $_SERVER['DATABASE_URL'] ?? 'postgres://postgres:12345@127.0.0.1:5432/postgres';

        self::bootKernel();
        parent::setUp();
//        $this->em = self::getContainer()->get('doctrine.orm.entity_manager');
        $this->em = self::bootKernel()->getContainer()->get('doctrine')->getManager();
    }

    protected function getRepositoryForEntity(string $entityClass): mixed
    {
        return $this->em->getRepository($entityClass);
    }

    protected function tearDown(): void
    {
        // Удаление обработчиков исключений
        restore_error_handler();
        restore_exception_handler();

        parent::tearDown();

        $this->em->close();
        $this->em = null;
    }

}
