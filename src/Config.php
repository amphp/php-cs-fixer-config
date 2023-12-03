<?php declare(strict_types=1);

namespace Amp\CodeStyle;

use PhpCsFixer\Config as PhpCsFixerConfig;

class Config extends PhpCsFixerConfig
{
    private string $src;

    public function __construct()
    {
        parent::__construct('AMPHP');

        $this->setRiskyAllowed(true);
        $this->setLineEnding("\n");

        if (\is_dir(\dirname(__DIR__, 4) . '/src')) {
            $this->src = \dirname(__DIR__, 4) . '/src';
        } elseif (\is_dir(\dirname(__DIR__, 4) . '/lib')) {
            $this->src = \dirname(__DIR__, 4) . '/lib';
        } else {
            $this->src = __DIR__;
        }
    }

    public function getRules(): array
    {
        return [
            "@PSR1" => true,
            "@PSR2" => true,
            "array_syntax" => ["syntax" => "short"],
            "blank_lines_before_namespace" => true,
            "cast_spaces" => true,
            "combine_consecutive_unsets" => true,
            "declare_strict_types" => true,
            "function_to_constant" => true,
            "line_ending" => true,
            "multiline_whitespace_before_semicolons" => true,
            "native_function_invocation" => ['include' => ['@internal'], 'scope' => 'namespaced'],
            "no_empty_phpdoc" => true,
            "no_extra_blank_lines" => true,
            "no_superfluous_phpdoc_tags" => true,
            "no_unused_imports" => true,
            "no_useless_else" => true,
            "no_useless_return" => true,
            "no_whitespace_before_comma_in_array" => true,
            "no_whitespace_in_blank_line" => true,
            "non_printable_character" => true,
            "normalize_index_brace" => true,
            "ordered_imports" => ['imports_order' => ['class', 'const', 'function']],
            "php_unit_construct" => true,
            "php_unit_dedicate_assert" => true,
            "php_unit_fqcn_annotation" => true,
            "phpdoc_summary" => true,
            "phpdoc_types" => true,
            "psr_autoloading" => ['dir' => $this->src],
            "return_type_declaration" => ["space_before" => "none"],
            "short_scalar_cast" => true,
        ];
    }
}
