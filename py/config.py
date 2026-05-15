# Pokefact SDK configuration


def make_config():
    return {
        "main": {
            "name": "Pokefact",
        },
        "feature": {
            "test": {
        "options": {
          "active": False,
        },
      },
        },
        "options": {
            "base": "https://pokefacts.vercel.app",
            "auth": {
                "prefix": "Bearer",
            },
            "headers": {
        "content-type": "application/json",
      },
            "entity": {
                "get_random_pokemon_fact": {},
            },
        },
        "entity": {
      "get_random_pokemon_fact": {
        "fields": [
          {
            "name": "data",
            "req": True,
            "type": "`$ARRAY`",
            "active": True,
            "index$": 0,
          },
        ],
        "name": "get_random_pokemon_fact",
        "op": {
          "list": {
            "name": "list",
            "points": [
              {
                "method": "GET",
                "orig": "/",
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "active": True,
                "parts": [],
                "args": {},
                "select": {},
                "index$": 0,
              },
            ],
            "input": "data",
            "key$": "list",
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
    },
    }
