<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BookControllerTest extends WebTestCase
{

    public function testBooksByCategory(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/v1/category/16/books');
        $responseContent = $client->getResponse()->getContent();

        $this->assertResponseIsSuccessful();
//        $this->assertJsonStringEqualsJsonString(
//            __DIR__.'/responses/BookControllerTest_testBooksByCategory.json',
//            $responseContent
//        );
        $expectedJson = file_get_contents(__DIR__.'/responses/BookControllerTest_testBooksByCategory.json');
        $this->assertJsonStringEqualsJsonString(
            $expectedJson,
            $responseContent
        );
    }
}
