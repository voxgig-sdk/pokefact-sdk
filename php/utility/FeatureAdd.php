<?php
declare(strict_types=1);

// Pokefact SDK utility: feature_add

class PokefactFeatureAdd
{
    public static function call(PokefactContext $ctx, mixed $f): void
    {
        $ctx->client->features[] = $f;
    }
}
