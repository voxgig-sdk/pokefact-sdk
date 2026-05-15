<?php
declare(strict_types=1);

// Pokefact SDK configuration

class PokefactConfig
{
    public static function make_config(): array
    {
        return [
            "main" => [
                "name" => "Pokefact",
            ],
            "feature" => [
                "test" => [
          'options' => [
            'active' => false,
          ],
        ],
            ],
            "options" => [
                "base" => "https://pokefacts.vercel.app",
                "auth" => [
                    "prefix" => "Bearer",
                ],
                "headers" => [
          'content-type' => 'application/json',
        ],
                "entity" => [
                    "get_random_pokemon_fact" => [],
                ],
            ],
            "entity" => [
        'get_random_pokemon_fact' => [
          'fields' => [
            [
              'name' => 'data',
              'req' => true,
              'type' => '`$ARRAY`',
              'active' => true,
              'index$' => 0,
            ],
          ],
          'name' => 'get_random_pokemon_fact',
          'op' => [
            'list' => [
              'name' => 'list',
              'points' => [
                [
                  'method' => 'GET',
                  'orig' => '/',
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'active' => true,
                  'parts' => [],
                  'args' => [],
                  'select' => [],
                  'index$' => 0,
                ],
              ],
              'input' => 'data',
              'key$' => 'list',
            ],
          ],
          'relations' => [
            'ancestors' => [],
          ],
        ],
      ],
        ];
    }


    public static function make_feature(string $name)
    {
        require_once __DIR__ . '/features.php';
        return PokefactFeatures::make_feature($name);
    }
}
