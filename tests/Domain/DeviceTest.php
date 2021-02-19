<?php
declare(strict_types = 1);

namespace App\Tests\Domain;

use Domain\Device;
use Domain\Exception\InvalidDeviceTokenException;
use PHPUnit\Framework\TestCase;

final class DeviceTest extends TestCase
{
    public function test_it_should_throw_exception_while_providing_empty_token(): void
    {
        // Then
        $this->expectException(InvalidDeviceTokenException::class);

        // When
        new Device('');
    }
}
