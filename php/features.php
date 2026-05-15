<?php
declare(strict_types=1);

// Pokefact SDK feature factory

require_once __DIR__ . '/feature/BaseFeature.php';
require_once __DIR__ . '/feature/TestFeature.php';


class PokefactFeatures
{
    public static function make_feature(string $name)
    {
        switch ($name) {
            case "base":
                return new PokefactBaseFeature();
            case "test":
                return new PokefactTestFeature();
            default:
                return new PokefactBaseFeature();
        }
    }
}
