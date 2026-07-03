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
            "active": True,
            "name": "data",
            "req": True,
            "type": "`$ARRAY`",
            "index$": 0,
          },
        ],
        "name": "get_random_pokemon_fact",
        "op": {
          "list": {
            "input": "data",
            "name": "list",
            "points": [
              {
                "active": True,
                "args": {},
                "method": "GET",
                "orig": "/",
                "parts": [],
                "select": {},
                "transform": {
                  "req": "`reqdata`",
                  "res": "`body`",
                },
                "index$": 0,
              },
            ],
            "key$": "list",
          },
        },
        "relations": {
          "ancestors": [],
        },
      },
    },
    }
