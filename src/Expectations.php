<?php

declare(strict_types=1);

use Misaf\VendraTesting\TranslationParity;
use Pest\Expectation;

if (function_exists('expect')) {
    expect()->extend('toHaveAtLeastTwoLocales', function (string $moduleName): Expectation {
        /** @var Expectation $expectation */
        $expectation = $this;

        TranslationParity::assertModuleHasAtLeastTwoLocales(
            moduleName: $moduleName,
            languageDirectory: (string) $expectation->value,
        );

        return $expectation;
    });

    expect()->extend('toHaveTranslationsInSync', function (string $moduleName): Expectation {
        /** @var Expectation $expectation */
        $expectation = $this;

        TranslationParity::assertModuleTranslationsAreInSync(
            moduleName: $moduleName,
            languageDirectory: (string) $expectation->value,
        );

        return $expectation;
    });

    expect()->extend('toHaveSortedTranslationKeys', function (string $moduleName): Expectation {
        /** @var Expectation $expectation */
        $expectation = $this;

        TranslationParity::assertModuleTranslationKeysAreSorted(
            moduleName: $moduleName,
            languageDirectory: (string) $expectation->value,
        );

        return $expectation;
    });
}
