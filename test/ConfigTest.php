<?php

namespace Amp\CodeStyle\Test;

use Amp\CodeStyle\Config;
use PhpCsFixer\ConfigInterface;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    /** @test */
    public function it_implements_interface()
    {
        $config = new Config();
        $this->assertInstanceOf(ConfigInterface::class, $config);
    }

    /** @test */
    public function it_returns_correct_values()
    {
        $config = new Config();
        $this->assertSame('Amp', $config->getName());
        $this->assertTrue($config->getUsingCache());
        $this->assertTrue($config->getRiskyAllowed());
    }

    /** @test */
    public function it_has_rules()
    {
        $config = new Config();
        $this->assertNotEmpty($config->getRules());
    }

    /** @test */
    public function it_does_not_have_header_comment_fixer_by_default()
    {
        $config = new Config();
        $rules = $config->getRules();
        $this->assertFalse($rules['header_comment'] ?? false);
    }
}
