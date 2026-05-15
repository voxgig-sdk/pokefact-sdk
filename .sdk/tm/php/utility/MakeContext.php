<?php
declare(strict_types=1);

// Pokefact SDK utility: make_context

require_once __DIR__ . '/../core/Context.php';

class PokefactMakeContext
{
    public static function call(array $ctxmap, ?PokefactContext $basectx): PokefactContext
    {
        return new PokefactContext($ctxmap, $basectx);
    }
}
