<?php

declare(strict_types=1);

namespace SlamCsFixer;

use PhpCsFixer\Config as PhpCsFixerConfig;
use PhpCsFixer\Fixer as MainFixer;

final class Config extends PhpCsFixerConfig
{
    public function __construct(bool $version2 = true)
    {
        parent::__construct(sprintf('%s:%s', __NAMESPACE__, $version2 ? 2 : 1));

        $this->setRiskyAllowed(true);
        $this->registerCustomFixers(array(
            new FinalAbstractPublicFixer(),
            new FinalInternalClassFixer(),
            new FunctionReferenceSpaceFixer(),
            new InlineCommentSpacerFixer(),
            new PhpFileOnlyProxyFixer(new MainFixer\Basic\BracesFixer()),
            new PhpFileOnlyProxyFixer(new MainFixer\Semicolon\SemicolonAfterInstructionFixer()),
            new PhpFileOnlyProxyFixer(new MainFixer\Semicolon\SpaceAfterSemicolonFixer()),
            new PhpFileOnlyProxyFixer(new MainFixer\Strict\DeclareStrictTypesFixer()),
            new Utf8Fixer(),
        ));
        $this->setRules(array(
            '@DoctrineAnnotation' => true,
            '@PHP71Migration' => true,
            '@PHP71Migration:risky' => true,
            '@Symfony' => true,
            '@Symfony:risky' => true,
            'Slam/final_abstract_public' => $version2,
            'Slam/final_internal_class' => $version2,
            'Slam/function_reference_space' => true,
            'Slam/inline_comment_spacer' => true,
            'Slam/php_only_braces' => true,
            'Slam/php_only_declare_strict_types' => $version2,
            'Slam/php_only_semicolon_after_instruction' => true,
            'Slam/php_only_space_after_semicolon' => true,
            'Slam/utf8' => $version2,
            'align_multiline_comment' => array('comment_type' => 'all_multiline'),
            'array_syntax' => array('syntax' => 'long'),
            'binary_operator_spaces' => false,
            'blank_line_before_return' => false,
            'blank_line_before_statement' => true,
            'braces' => false,
            'class_definition' => array('singleItemSingleLine' => true),
            'class_keyword_remove' => false,
            'combine_consecutive_issets' => false,
            'combine_consecutive_unsets' => false,
            'concat_space' => array('spacing' => 'one'),
            'declare_strict_types' => false,
            'doctrine_annotation_array_assignment' => true,
            'doctrine_annotation_spaces' => true,
            'encoding' => $version2,
            'general_phpdoc_annotation_remove' => false,
            'hash_to_slash_comment' => false,
            'header_comment' => false,
            'heredoc_to_nowdoc' => true,
            'linebreak_after_opening_tag' => true,
            'list_syntax' => true,
            'mb_str_functions' => $version2,
            'method_argument_space' => array('keep_multiple_spaces_after_comma' => true),
            'native_function_invocation' => false,
            'no_blank_lines_before_namespace' => false,
            'no_extra_consecutive_blank_lines' => array('tokens' => array('break', 'continue', 'extra', 'return', 'throw', 'use', 'useTrait', 'curly_brace_block', 'parenthesis_brace_block', 'square_brace_block')),
            'no_multiline_whitespace_around_double_arrow' => false,
            'no_multiline_whitespace_before_semicolons' => false,
            'no_null_property_initialization' => true,
            'no_php4_constructor' => true,
            'no_short_echo_tag' => true,
            'no_superfluous_elseif' => true,
            'no_unneeded_control_parentheses' => $version2,
            'no_unreachable_default_argument_value' => true,
            'no_useless_else' => true,
            'no_useless_return' => true,
            'not_operator_with_space' => false,
            'not_operator_with_successor_space' => true,
            'ordered_class_elements' => array('order' => array('use_trait', 'constant_public', 'constant_protected', 'constant_private', 'property', 'construct', 'destruct', 'magic', 'phpunit', 'method')),
            'ordered_imports' => true,
            'php_unit_strict' => false,
            'php_unit_test_class_requires_covers' => false,
            'phpdoc_add_missing_param_annotation' => false,
            'phpdoc_order' => true,
            'phpdoc_types_order' => true,
            'pow_to_exponentiation' => false,
            'psr0' => true,
            'random_api_migration' => true,
            'semicolon_after_instruction' => true,
            'silenced_deprecation_error' => false,
            'simplified_null_return' => false,
            'single_line_comment_style' => true,
            'space_after_semicolon' => true,
            'strict_comparison' => $version2,
            'strict_param' => $version2,
            'unary_operator_spaces' => false,
            'yoda_style' => $version2,
        ));
    }
}
