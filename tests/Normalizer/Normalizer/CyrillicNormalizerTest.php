<?php

declare(strict_types=1);

namespace App\Tests\Normalizer\Normalizer;

use App\Shared\Letter\Cyrillic;
use PHPUnit\Framework\TestCase;
use App\Normalizer\Letter\CyrillicToLatinMapper;
use App\Normalizer\Normalizer\CyrillicNormalizer;

class CyrillicNormalizerTest extends TestCase
{
    private CyrillicNormalizer $normalizer;

    protected function setUp(): void
    {
        $this->normalizer = new CyrillicNormalizer(
            new Cyrillic,
            new CyrillicToLatinMapper
        );
    }

    /**
     * @dataProvider texts
     * @test
     */
    public function replaces_cyrillic_letters($input, $expected): void
    {
        $normalized = $this->normalizer->normalize($input);

        $this->assertEquals($expected, $normalized);
    }

    public function texts(): array
    {
        return [
            [
                'аеорсухіАВЕОРСТУХІКМН',
                'aeopcyxiABEOPCTYXIKMH'
            ],
            [
                'Lorem Іpsum іs sіmрly dummу text оf thе рrinting аnd tyрesеttіng іndustrу. Richаrd McСlintоck, a Latin рrofessor at Нampdеn-Sydney Сollege in Virginia.',
                'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.'
            ]
        ];
    }
}
