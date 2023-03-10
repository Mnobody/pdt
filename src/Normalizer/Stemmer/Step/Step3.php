<?php

declare(strict_types=1);

namespace App\Normalizer\Stemmer\Step;

use App\Normalizer\Stemmer\Word;

final class Step3 implements StepInterface
{
    private const REPLACEMENTS = [
        'ational' => 'ate',
        'tional' => 'tion',
        'alize' => 'al',

        'icate' => 'ic',
        'iciti' => 'ic',
        'ical' => 'ic',

        // deletes
        'ful' => '', 'ness' => ''
    ];

    private const ATIVE_ENDING = 'ative';

    public function __invoke(Word $word): Word
    {
        foreach (self::REPLACEMENTS as $ending => $replacement) {
            if ($word->endsWith($ending)) {
                return $word->inR1($ending)
                    ? $word->replaceEnding($ending, $replacement)
                    : $word;
            }
        }

        if ($word->endsWith(self::ATIVE_ENDING) && $word->inR2(self::ATIVE_ENDING)) {
            return $word->cutOffEnding(self::ATIVE_ENDING);
        }

        return $word;
    }
}
