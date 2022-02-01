<?php

namespace Amp\CodeStyle;

use PhpCsFixer\ConfigInterface;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function testImplementsInterface(): void
    {
        $config = new Config();
        $this->assertInstanceOf(ConfigInterface::class, $config);
    }

    public function testReturnsCorrectValues(): void
    {
        $config = new Config();
        $this->assertSame('AMPHP', $config->getName());
        $this->assertTrue($config->getUsingCache());
        $this->assertTrue($config->getRiskyAllowed());
    }

    public function testHasRules(): void
    {
        $config = new Config();
        $this->assertNotEmpty($config->getRules());
    }

    public function testDoesNotHaveHeaderCommentFixerByDefault(): void
    {
        $config = new Config();
        $rules = $config->getRules();
        $this->assertFalse($rules['header_comment'] ?? false);
    }
}
