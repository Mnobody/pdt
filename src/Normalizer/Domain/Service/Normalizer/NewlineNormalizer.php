<?php

declare(strict_types=1);

namespace Normalizer\Domain\Service\Normalizer;

final class NewlineNormalizer implements NormalizerInterface
{
    private const PATTERN = '/\n+/';
    private const NEWLINE = "\n";

    public function normalize(string $string): string
    {
        return preg_replace(
            self::PATTERN,
            self::NEWLINE,
            $string,
        );
    }
}
