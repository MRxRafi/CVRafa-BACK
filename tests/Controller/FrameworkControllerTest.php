<?php


namespace App\Tests\Controller;


use Symfony\Component\HttpFoundation\Request;

/**
 * Class StudyControllerTest
 *
 * @package App\Tests\Controller
 * @group controllers
 */
class FrameworkControllerTest extends BaseTestCase
{
    private const RUTA_API = '/frameworks';

    /**
     * Test GET /frameworks 200 Ok
     *
     * @return void
     */
    public function testCgetAction200ok(): void {
        self::$client->request(Request::METHOD_GET, self::RUTA_API);
        $response = self::$client->getResponse();
        self::assertTrue($response->isSuccessful());
        self::assertJson($response->getContent());
        $frameworks = json_decode($response->getContent(), true);
        self::assertTrue(is_array($frameworks));
    }
}