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
              "active" => true,
              "name" => "data",
              "req" => true,
              "type" => "`$ARRAY`",
              "index$" => 0,
            },
          ],
          "name" => "get_random_pokemon_fact",
          "op" => {
            "list" => {
              "input" => "data",
              "name" => "list",
              "points" => [
                {
                  "active" => true,
                  "args" => {},
                  "method" => "GET",
                  "orig" => "/",
                  "parts" => [],
                  "select" => {},
                  "transform" => {
                    "req" => "`reqdata`",
                    "res" => "`body`",
                  },
                  "index$" => 0,
                },
              ],
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
