# Pokefact SDK configuration

module PokefactConfig
  # Return the process-wide config, built once on first use. The SDK reads
  # the config on every request and never writes to it, so one instance is
  # shared by every client rather than rebuilt per client.
  #
  # The returned hash is shared: treat it as read-only. Callers that need to
  # mutate should use make_config, which always returns a fresh copy.
  def self.shared_config
    @shared_config ||= make_config
  end


  # Build a fresh, fully materialised config hash. Every call rebuilds the
  # whole structure, so prefer shared_config unless you need a private copy
  # you intend to mutate.
  def self.make_config
    {
      "main" => {
        "name" => "Pokefact",
        "slug" => "pokefact",
        "version" => "0.0.1",
        "target" => "rb",
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
              "short" => "Array containing Pokemon facts",
              "type" => "`$ARRAY`",
            },
          ],
          "name" => "get_random_pokemon_fact",
          "op" => {
            "list" => {
              "input" => "data",
              "name" => "list",
              "points" => [
                {
                  "args" => {},
                  "kind" => "http",
                  "method" => "GET",
                  "orig" => "/",
                  "parts" => [],
                  "select" => {},
                  "transform" => {
                    "req" => "`reqdata`",
                    "res" => "`body.data`",
                  },
                },
              ],
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
