<?php

declare(strict_types=1);

namespace AffirmationsMcp;

final class AffirmationRepository
{
    /**
     * @var array<string, list<string>>
     */
    private array $affirmations = [
        'hippy' => [
            'You are a radiant soul, and your energy helps the whole universe exhale.',
            'You are growing in harmony with life, one peaceful breath at a time.',
            'Your kindness is medicine, and it is changing the world around you.',
            'You are exactly where you need to be, and your path is unfolding beautifully.',
        ],
        'goth' => [
            'Even in the dark, you are powerful, steady, and unmistakably alive.',
            'You turn heavy days into art, and that is a rare kind of strength.',
            'Your depth is not a flaw; it is where your brilliance lives.',
            'You carry your shadows with grace, and they cannot dim your worth.',
        ],
        'emo' => [
            'Your feelings are real, and they prove your heart is still fighting for you.',
            'You have survived every hard chapter so far, and that matters.',
            'You are not too much; you are honest, and that is powerful.',
            'You are allowed to heal slowly and still be proud of your progress.',
        ],
        'toxic_positivity' => [
            'Everything is AMAZING all the time, so smile bigger and manifest harder.',
            'No bad vibes allowed; if you believe enough, every problem disappears instantly.',
            'You are crushing life 24/7, so just ignore every negative feeling forever.',
            'Today is PERFECT and nothing can go wrong if you stay extra positive.',
        ],
    ];

    /**
     * @return list<string>
     */
    public function flavors(): array
    {
        return array_keys($this->affirmations);
    }

    /**
     * @return array{flavor:string,affirmation:string}
     */
    public function random(?string $flavor = null): array
    {
        $selectedFlavor = $flavor !== null ? strtolower(trim($flavor)) : '';

        if ($selectedFlavor === '' || !isset($this->affirmations[$selectedFlavor])) {
            $flavors = $this->flavors();
            $selectedFlavor = $flavors[array_rand($flavors)];
        }

        $options = $this->affirmations[$selectedFlavor];
        $affirmation = $options[array_rand($options)];

        return [
            'flavor' => $selectedFlavor,
            'affirmation' => $affirmation,
        ];
    }
}
