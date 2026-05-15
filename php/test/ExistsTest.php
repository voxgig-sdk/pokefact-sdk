<?php
declare(strict_types=1);

// Pokefact SDK exists test

require_once __DIR__ . '/../pokefact_sdk.php';

use PHPUnit\Framework\TestCase;

class ExistsTest extends TestCase
{
    public function test_create_test_sdk(): void
    {
        $testsdk = PokefactSDK::test(null, null);
        $this->assertNotNull($testsdk);
    }
}
