<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\CastNotation\CastSpacesFixer;
use PhpCsFixer\Fixer\Operator\ConcatSpaceFixer;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\CodingStandard\Fixer\LineLength\LineLengthFixer;
use Symplify\EasyCodingStandard\ValueObject\Option;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ContainerConfigurator $containerConfigurator): void {
    $sets = [
        SetList::PSR_12,
        SetList::CLEAN_CODE,
        SetList::ARRAY,
        SetList::COMMENTS,
        SetList::DOCBLOCK,
        SetList::NAMESPACES,
        SetList::STRICT,
        SetList::DOCTRINE_ANNOTATIONS,
        SetList::SYMFONY,
        SetList::SYMFONY_RISKY,
    ];

    foreach ($sets as $set) {
        $containerConfigurator->import($set);
    }

    $containerConfigurator
        ->parameters()
        ->set(Option::PATHS, [__FILE__, __DIR__ . '/FamilyOfficeOnionLocation5.php', __DIR__ . '/Subscriber']);

    $containerConfigurator
        ->services()
        ->set(ConcatSpaceFixer::class)->call('configure', [[
            'spacing' => 'one',
        ]])
        ->set(CastSpacesFixer::class)->call('configure', [[
            'space' => 'none',
        ]])
        ->set(LineLengthFixer::class)
        ->call('configure', [[
            'max_line_length' => 80,
            'break_long_lines' => true,
            'inline_short_lines' => true,
        ]]);
};
