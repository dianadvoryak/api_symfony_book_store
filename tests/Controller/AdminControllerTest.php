<?php

namespace App\Tests\Controller;

use App\Tests\AbstractControllerTest;

class AdminControllerTest extends AbstractControllerTest
{
    public function testGrantAuthor(): void
    {
        $user = $this->createUser('user@test.com', 'testtest');

        $this->createAdmin('admin@test.com', 'testtest');
        $this->auth('admin@test.com', 'testtest');
        $this->client->request('POST', '/api/v1/admin/grantAuthor/'.$user->getId());

        $this->assertResponseIsSuccessful();
    }
}
