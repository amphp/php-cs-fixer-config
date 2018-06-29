<?php

namespace Amp\CS\Config\Test;

use PhpCsFixer\ConfigInterface;
use PHPUnit\Framework\TestCase;
use Amp\CS\Config\Amp;

class AmpTest extends TestCase
{
    /**
     * @test
     */
    public function it_implements_interface(): void
    {
        $config = new Amp();
        $this->assertInstanceOf(ConfigInterface::class, $config);
    }

    /**
     * @test
     */
    public function it_returns_correct_values(): void
    {
        $config = new Amp();
        $this->assertSame('amp', $config->getName());
        $this->assertTrue($config->getUsingCache());
        $this->assertTrue($config->getRiskyAllowed());
    }

    /**
     * @test
     */
    public function it_has_rules(): void
    {
        $config = new Amp();
        $this->assertNotEmpty($config->getRules());
    }

    /**
     * @test
     */
    public function it_does_not_have_header_comment_fixer_by_default(): void
    {
        $config = new Amp();
        $rules = $config->getRules();
        $this->assertArrayHasKey('header_comment', $rules);
        $this->assertFalse($rules['header_comment']);
    }
}

