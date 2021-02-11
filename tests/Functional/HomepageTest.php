<?php
declare(strict_types=1);

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
// https://blog.cleancoder.com/uncle-bob/2017/10/03/TestContravariance.html
class HomepageTest extends WebTestCase
{
    /**
     * @test
     */
    public function homepage_shouldShowHomepage()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $content = $client->getResponse()->getContent();
        $this->assertStringContainsString('<li>51cm</li>', $content);
        $this->assertStringContainsString('<li>53cm</li>', $content);
    }
}
