<?php

namespace Amp\CodeStyle;

use PhpCsFixer\Config as PhpCsFixerConfig;

class Config extends PhpCsFixerConfig
{
    public function __construct()
    {
        parent::__construct('Amp');

        $this->setRiskyAllowed(true);
    }

    public function getRules(): array
    {
        return [
            "@PSR1" => true,
            "@PSR2" => true,
            "braces" => [
                "allow_single_line_closure" => true,
            ],
            "array_syntax" => ["syntax" => "short"],
            "cast_spaces" => true,
            "combine_consecutive_unsets" => true,
            "function_to_constant" => true,
            "native_function_invocation" => true,
            "no_multiline_whitespace_before_semicolons" => true,
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
            "psr4" => true,
            "return_type_declaration" => ["space_before" => "none"],
            "short_scalar_cast" => true,
            "single_blank_line_before_namespace" => true,
        ];
    }
}
