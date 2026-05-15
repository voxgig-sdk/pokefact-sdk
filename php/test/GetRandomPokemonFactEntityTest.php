<?php
declare(strict_types=1);

// GetRandomPokemonFact entity test

require_once __DIR__ . '/../pokefact_sdk.php';
require_once __DIR__ . '/Runner.php';

use PHPUnit\Framework\TestCase;
use Voxgig\Struct\Struct as Vs;

class GetRandomPokemonFactEntityTest extends TestCase
{
    public function test_create_instance(): void
    {
        $testsdk = PokefactSDK::test(null, null);
        $ent = $testsdk->GetRandomPokemonFact(null);
        $this->assertNotNull($ent);
    }

    public function test_basic_flow(): void
    {
        $setup = get_random_pokemon_fact_basic_setup(null);
        // Per-op sdk-test-control.json skip.
        $_live = !empty($setup["live"]);
        foreach (["list"] as $_op) {
            [$_shouldSkip, $_reason] = Runner::is_control_skipped("entityOp", "get_random_pokemon_fact." . $_op, $_live ? "live" : "unit");
            if ($_shouldSkip) {
                $this->markTestSkipped($_reason ?? "skipped via sdk-test-control.json");
                return;
            }
        }
        // The basic flow consumes synthetic IDs from the fixture. In live mode
        // without an *_ENTID env override, those IDs hit the live API and 4xx.
        if (!empty($setup["synthetic_only"])) {
            $this->markTestSkipped("live entity test uses synthetic IDs from fixture — set POKEFACT_TEST_GET_RANDOM_POKEMON_FACT_ENTID JSON to run live");
            return;
        }
        $client = $setup["client"];

        // Bootstrap entity data from existing test data.
        $get_random_pokemon_fact_ref01_data_raw = Vs::items(Helpers::to_map(
            Vs::getpath($setup["data"], "existing.get_random_pokemon_fact")));
        $get_random_pokemon_fact_ref01_data = null;
        if (count($get_random_pokemon_fact_ref01_data_raw) > 0) {
            $get_random_pokemon_fact_ref01_data = Helpers::to_map($get_random_pokemon_fact_ref01_data_raw[0][1]);
        }

        // LIST
        $get_random_pokemon_fact_ref01_ent = $client->GetRandomPokemonFact(null);
        $get_random_pokemon_fact_ref01_match = [];

        [$get_random_pokemon_fact_ref01_list_result, $err] = $get_random_pokemon_fact_ref01_ent->list($get_random_pokemon_fact_ref01_match, null);
        $this->assertNull($err);
        $this->assertIsArray($get_random_pokemon_fact_ref01_list_result);

    }
}

function get_random_pokemon_fact_basic_setup($extra)
{
    Runner::load_env_local();

    $entity_data_file = __DIR__ . '/../../.sdk/test/entity/get_random_pokemon_fact/GetRandomPokemonFactTestData.json';
    $entity_data_source = file_get_contents($entity_data_file);
    $entity_data = json_decode($entity_data_source, true);

    $options = [];
    $options["entity"] = $entity_data["existing"];

    $client = PokefactSDK::test($options, $extra);

    // Generate idmap.
    $idmap = [];
    foreach (["get_random_pokemon_fact01", "get_random_pokemon_fact02", "get_random_pokemon_fact03"] as $k) {
        $idmap[$k] = strtoupper($k);
    }

    // Detect ENTID env override before envOverride consumes it. When live
    // mode is on without a real override, the basic test runs against synthetic
    // IDs from the fixture and 4xx's. Surface this so the test can skip.
    $entid_env_raw = getenv("POKEFACT_TEST_GET_RANDOM_POKEMON_FACT_ENTID");
    $idmap_overridden = $entid_env_raw !== false && str_starts_with(trim($entid_env_raw), "{");

    $env = Runner::env_override([
        "POKEFACT_TEST_GET_RANDOM_POKEMON_FACT_ENTID" => $idmap,
        "POKEFACT_TEST_LIVE" => "FALSE",
        "POKEFACT_TEST_EXPLAIN" => "FALSE",
        "POKEFACT_APIKEY" => "NONE",
    ]);

    $idmap_resolved = Helpers::to_map(
        $env["POKEFACT_TEST_GET_RANDOM_POKEMON_FACT_ENTID"]);
    if ($idmap_resolved === null) {
        $idmap_resolved = Helpers::to_map($idmap);
    }

    if ($env["POKEFACT_TEST_LIVE"] === "TRUE") {
        $merged_opts = Vs::merge([
            [
                "apikey" => $env["POKEFACT_APIKEY"],
            ],
            $extra ?? [],
        ]);
        $client = new PokefactSDK(Helpers::to_map($merged_opts));
    }

    $live = $env["POKEFACT_TEST_LIVE"] === "TRUE";
    return [
        "client" => $client,
        "data" => $entity_data,
        "idmap" => $idmap_resolved,
        "env" => $env,
        "explain" => $env["POKEFACT_TEST_EXPLAIN"] === "TRUE",
        "live" => $live,
        "synthetic_only" => $live && !$idmap_overridden,
        "now" => (int)(microtime(true) * 1000),
    ];
}
