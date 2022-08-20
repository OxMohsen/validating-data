<?php

return (new PhpCsFixer\Config())
    ->setRules([
        '@PhpCsFixer' => true,
        'ordered_imports' => [
            'imports_order'  => ['class', 'function', 'const'],
            'sort_algorithm' => 'length',
        ],
        'binary_operator_spaces'                 => ['default' => 'align_single_space_minimal'],
        'concat_space'                           => ['spacing' => 'one'],
        'multiline_whitespace_before_semicolons' => true,
        'not_operator_with_successor_space'      => true,
        'ternary_to_null_coalescing'             => true,
        'native_function_invocation'             => true,
    ])
    ->setRiskyAllowed(true)
    ->setLineEnding("\n");
