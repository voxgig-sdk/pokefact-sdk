<?php
declare(strict_types=1);

// Pokefact SDK utility: result_body

class PokefactResultBody
{
    public static function call(PokefactContext $ctx): ?PokefactResult
    {
        $response = $ctx->response;
        $result = $ctx->result;
        if ($result && $response && $response->json_func && $response->body) {
            $result->body = ($response->json_func)();
        }
        return $result;
    }
}
