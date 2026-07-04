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
              'active' => true,
              'name' => 'data',
              'req' => true,
              'type' => '`$ARRAY`',
              'index$' => 0,
            ],
          ],
          'name' => 'get_random_pokemon_fact',
          'op' => [
            'list' => [
              'input' => 'data',
              'name' => 'list',
              'points' => [
                [
                  'active' => true,
                  'args' => [],
                  'method' => 'GET',
                  'orig' => '/',
                  'parts' => [],
                  'select' => [],
                  'transform' => [
                    'req' => '`reqdata`',
                    'res' => '`body`',
                  ],
                  'index$' => 0,
                ],
              ],
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
