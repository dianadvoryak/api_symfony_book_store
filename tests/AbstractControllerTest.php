<?php

namespace App\Tests;

use Doctrine\ORM\EntityManagerInterface;
use Helmich\JsonAssert\JsonAssertions;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class AbstractControllerTest extends WebTestCase
{
    use JsonAssertions;

    protected  KernelBrowser $client;

    protected ?EntityManagerInterface $em;

    protected function setUp(): void
    {
        $_ENV['DATABASE_URL'] = $_ENV['DATABASE_URL'] ?? 'postgres://postgres:12345@127.0.0.1:5432/postgres';
        $_SERVER['DATABASE_URL'] = $_SERVER['DATABASE_URL'] ?? 'postgres://postgres:12345@127.0.0.1:5432/postgres';
//
//        self::bootKernel();
        parent::setUp();
        $this->client = static::createClient();
        $this->em = $this->client->getContainer()->get('doctrine.orm.entity_manager');
    }

    protected static function getKernelClass(): string
    {
        return \App\Kernel::class;
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->em->close();
        $this->em = null;
    }
}
