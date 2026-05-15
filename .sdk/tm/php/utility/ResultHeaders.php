<?php
declare(strict_types=1);

// Pokefact SDK utility: result_headers

class PokefactResultHeaders
{
    public static function call(PokefactContext $ctx): ?PokefactResult
    {
        $response = $ctx->response;
        $result = $ctx->result;
        if ($result) {
            if ($response && is_array($response->headers)) {
                $result->headers = $response->headers;
            } else {
                $result->headers = [];
            }
        }
        return $result;
    }
}
