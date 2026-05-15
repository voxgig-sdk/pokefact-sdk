<?php
declare(strict_types=1);

// Pokefact SDK utility: prepare_body

class PokefactPrepareBody
{
    public static function call(PokefactContext $ctx): mixed
    {
        if ($ctx->op->input === 'data') {
            return ($ctx->utility->transform_request)($ctx);
        }
        return null;
    }
}
