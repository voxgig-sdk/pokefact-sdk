# Pokefact SDK configuration

module PokefactConfig
  def self.make_config
    {
      "main" => {
        "name" => "Pokefact",
      },
      "feature" => {
        "test" => {
          "options" => {
            "active" => false,
          },
        },
      },
      "options" => {
        "base" => "https://pokefacts.vercel.app",
        "auth" => {
          "prefix" => "Bearer",
        },
        "headers" => {
          "content-type" => "application/json",
        },
        "entity" => {
          "get_random_pokemon_fact" => {},
        },
      },
      "entity" => {
        "get_random_pokemon_fact" => {
          "fields" => [
            {
              "name" => "data",
              "req" => true,
              "type" => "`$ARRAY`",
              "active" => true,
              "index$" => 0,
            },
          ],
          "name" => "get_random_pokemon_fact",
          "op" => {
            "list" => {
              "name" => "list",
              "points" => [
                {
                  "method" => "GET",
                  "orig" => "/",
                  "transform" => {
                    "req" => "`reqdata`",
                    "res" => "`body`",
                  },
                  "active" => true,
                  "parts" => [],
                  "args" => {},
                  "select" => {},
                  "index$" => 0,
                },
              ],
              "input" => "data",
              "key$" => "list",
            },
          },
          "relations" => {
            "ancestors" => [],
          },
        },
      },
    }
  end


  def self.make_feature(name)
    require_relative 'features'
    PokefactFeatures.make_feature(name)
  end
end
