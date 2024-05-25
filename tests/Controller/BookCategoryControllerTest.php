<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BookCategoryControllerTest extends WebTestCase
{
    public function testCategories(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/v1/book/categories');
        $responseContent = $client->getResponse()->getContent();

        $this->assertResponseIsSuccessful();
//        $this->assertJsonStringEqualsJsonString(
//            __DIR__.'/responses/BookCategoryControllerTest_testCategories.json',
//            $responseContent
//        );
        $expectedJson = file_get_contents(__DIR__.'/responses/BookCategoryControllerTest_testCategories.json');
        $this->assertJsonStringEqualsJsonString(
            $expectedJson,
            $responseContent
        );

    }
}
