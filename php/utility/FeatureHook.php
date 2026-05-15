<?php
declare(strict_types=1);

// Pokefact SDK utility: feature_hook

class PokefactFeatureHook
{
    public static function call(PokefactContext $ctx, string $name): void
    {
        if (!$ctx->client) {
            return;
        }
        $features = $ctx->client->features ?? null;
        if (!$features) {
            return;
        }
        foreach ($features as $f) {
            if (method_exists($f, $name)) {
                $f->$name($ctx);
            }
        }
    }
}
