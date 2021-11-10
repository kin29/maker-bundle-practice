<?php

namespace App\Tests\Command;

use Symfony\Component\Panther\PantherTestCase;

class DeliciousPizzaCommandTest extends PantherTestCase
{
    public function testSomething(): void
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/');

        $this->assertSelectorTextContains('h1', 'Hello World');
    }
}
