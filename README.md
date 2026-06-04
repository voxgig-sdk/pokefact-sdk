# Pokefact SDK

Fetch a random Pokemon fact with a single GET request, no auth required

> TypeScript, Python, PHP, Golang, Ruby, Lua SDKs, a CLI, an interactive REPL, and an MCP server for AI agents — all generated from one OpenAPI spec by [@voxgig/sdkgen](https://github.com/voxgig/sdkgen).

## About Pokefact API

The Pokefact API is a small free service that returns a random Pokemon fact on each request. It is hosted on Vercel at `https://pokefacts.vercel.app` and is listed in the [Free Public APIs](https://freepublicapis.com/pokefact) community catalogue.

What you get from the API:
- A random Pokemon fact returned on each call to the root endpoint.
- No API key, account, or authentication required.
- CORS is enabled, so the endpoint can be called directly from browser-based applications.

The service is intentionally minimal: there is a single endpoint that picks a fact and returns it. No filtering, pagination, or query parameters are documented.

## Try it

**TypeScript**
```bash
npm install pokefact
```

**Python**
```bash
pip install pokefact-sdk
```

**PHP**
```bash
composer require voxgig/pokefact-sdk
```

**Golang**
```bash
go get github.com/voxgig-sdk/pokefact-sdk/go
```

**Ruby**
```bash
gem install pokefact-sdk
```

**Lua**
```bash
luarocks install pokefact-sdk
```

## 30-second quickstart

### TypeScript

```ts
import { PokefactSDK } from 'pokefact'

const client = new PokefactSDK({})

// List all getrandompokemonfacts
const getrandompokemonfacts = await client.GetRandomPokemonFact().list()
```

See the [TypeScript README](ts/README.md) for the
full guide, or scroll down for the same example in other languages.

## What's in the box

| Surface | Use it for | Path |
| --- | --- | --- |
| **SDK** (TypeScript, Python, PHP, Golang, Ruby, Lua) | App integration | `ts/` `py/` `php/` `go/` `rb/` `lua/` |
| **CLI** | Scripts, CI, ops, one-off API calls | `go-cli/` |
| **MCP server** | AI agents (Claude, Cursor, Cline) | `go-mcp/` |

## Use it from an AI agent (MCP)

The generated MCP server exposes every operation in this SDK as an
[MCP](https://modelcontextprotocol.io) tool that Claude, Cursor or Cline
can call directly. Build and register it:

```bash
cd go-mcp && go build -o pokefact-mcp .
```

Then add it to your agent's MCP config (Claude Desktop, Cursor, etc.):

```json
{
  "mcpServers": {
    "pokefact": {
      "command": "/abs/path/to/pokefact-mcp"
    }
  }
}
```

## Entities

The API exposes one entity:

| Entity | Description | API path |
| --- | --- | --- |
| **GetRandomPokemonFact** | Returns one randomly selected Pokemon fact from the service's pool, served from the root path `/`. | `/` |

Each entity supports the following operations where available: **load**,
**list**, **create**, **update**, and **remove**.

## Quickstart in other languages

### Python

```python
from pokefact_sdk import PokefactSDK

client = PokefactSDK({})

# List all getrandompokemonfacts
getrandompokemonfacts, err = client.GetRandomPokemonFact(None).list(None, None)
```

### PHP

```php
<?php
require_once 'pokefact_sdk.php';

$client = new PokefactSDK([]);

// List all getrandompokemonfacts
[$getrandompokemonfacts, $err] = $client->GetRandomPokemonFact(null)->list(null, null);
```

### Golang

```go
import sdk "github.com/voxgig-sdk/pokefact-sdk/go"

client := sdk.NewPokefactSDK(map[string]any{})

// List all getrandompokemonfacts
getrandompokemonfacts, err := client.GetRandomPokemonFact(nil).List(nil, nil)
```

### Ruby

```ruby
require_relative "Pokefact_sdk"

client = PokefactSDK.new({})

# List all getrandompokemonfacts
getrandompokemonfacts, err = client.GetRandomPokemonFact(nil).list(nil, nil)
```

### Lua

```lua
local sdk = require("pokefact_sdk")

local client = sdk.new({})

-- List all getrandompokemonfacts
local getrandompokemonfacts, err = client:GetRandomPokemonFact(nil):list(nil, nil)
```

## Unit testing in offline mode

Every SDK ships a test mode that swaps the HTTP transport for an
in-memory mock, so unit tests run offline.

### TypeScript

```ts
const client = PokefactSDK.test()
const result = await client.GetRandomPokemonFact().load({ id: 'test01' })
// result.ok === true, result.data contains mock data
```

### Python

```python
client = PokefactSDK.test(None, None)
result, err = client.GetRandomPokemonFact(None).load(
    {"id": "test01"}, None
)
```

### PHP

```php
$client = PokefactSDK::test(null, null);
[$result, $err] = $client->GetRandomPokemonFact(null)->load(
    ["id" => "test01"], null
);
```

### Golang

```go
client := sdk.TestSDK(nil, nil)
result, err := client.GetRandomPokemonFact(nil).Load(
    map[string]any{"id": "test01"}, nil,
)
```

### Ruby

```ruby
client = PokefactSDK.test(nil, nil)
result, err = client.GetRandomPokemonFact(nil).load(
  { "id" => "test01" }, nil
)
```

### Lua

```lua
local client = sdk.test(nil, nil)
local result, err = client:GetRandomPokemonFact(nil):load(
  { id = "test01" }, nil
)
```

## How it works

Every SDK call runs the same five-stage pipeline:

1. **Point** — resolve the API endpoint from the operation definition.
2. **Spec** — build the HTTP specification (URL, method, headers, body).
3. **Request** — send the HTTP request.
4. **Response** — receive and parse the response.
5. **Result** — extract the result data for the caller.

A feature hook fires at each stage (e.g. `PrePoint`, `PreSpec`,
`PreRequest`), so features can inspect or modify the pipeline without
forking the SDK.

### Features

| Feature | Purpose |
| --- | --- |
| **TestFeature** | In-memory mock transport for testing without a live server |

Pass custom features via the `extend` option at construction time.

### Direct and Prepare

For endpoints the entity model doesn't cover, use the low-level methods:

- **`direct(fetchargs)`** — build and send an HTTP request in one step.
- **`prepare(fetchargs)`** — build the request without sending it.

Both accept a map with `path`, `method`, `params`, `query`,
`headers`, and `body`. See the [How-to guides](#how-to-guides) below.

## How-to guides

### Make a direct API call

When the entity interface does not cover an endpoint, use `direct`:

**TypeScript:**
```ts
const result = await client.direct({
  path: '/api/resource/{id}',
  method: 'GET',
  params: { id: 'example' },
})
console.log(result.data)
```

**Python:**
```python
result, err = client.direct({
    "path": "/api/resource/{id}",
    "method": "GET",
    "params": {"id": "example"},
})
```

**PHP:**
```php
[$result, $err] = $client->direct([
    "path" => "/api/resource/{id}",
    "method" => "GET",
    "params" => ["id" => "example"],
]);
```

**Go:**
```go
result, err := client.Direct(map[string]any{
    "path":   "/api/resource/{id}",
    "method": "GET",
    "params": map[string]any{"id": "example"},
})
```

**Ruby:**
```ruby
result, err = client.direct({
  "path" => "/api/resource/{id}",
  "method" => "GET",
  "params" => { "id" => "example" },
})
```

**Lua:**
```lua
local result, err = client:direct({
  path = "/api/resource/{id}",
  method = "GET",
  params = { id = "example" },
})
```

## Per-language documentation

- [TypeScript](ts/README.md)
- [Python](py/README.md)
- [PHP](php/README.md)
- [Golang](go/README.md)
- [Ruby](rb/README.md)
- [Lua](lua/README.md)

## Using the Pokefact API

- Upstream: [https://pokefacts.vercel.app](https://pokefacts.vercel.app)

---

Generated from the Pokefact API OpenAPI spec by [@voxgig/sdkgen](https://github.com/voxgig/sdkgen).
