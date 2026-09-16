

import Path from 'node:path'
import * as Fs from 'node:fs'

import { test, describe, afterEach } from 'node:test'
import assert from 'node:assert'
import { createLiveTransport } from '../../live-runner'
import { runLiveEntity } from '../../live-entity'


import { PokefactSDK, BaseFeature, stdutil } from '../../..'

import {
  envOverride,
  liveClientOptions,
  liveDelay,
  loadEnvLocal,
  makeCtrl,
  makeMatch,
  makeReqdata,
  makeStepData,
  makeValid,
  maybeSkipControl,
} from '../../utility'


// AFTER the imports on purpose: TypeScript hoists `import` above any
// statement in the emitted CommonJS, so a loader placed above them would
// run only after every imported module had already been evaluated - and
// anything reading process.env at module scope would miss these values.
loadEnvLocal(__dirname + '/../../../.env.local')


describe('GetRandomPokemonFactEntity', async () => {

  // Per-test live pacing. Delay is read from sdk-test-control.json's
  // `test.live.delayMs`; only sleeps when POKEFACT_TEST_LIVE=TRUE.
  afterEach(liveDelay('POKEFACT_TEST_LIVE'))

  test('instance', async () => {
    const testsdk = PokefactSDK.test()
    const ent = testsdk.GetRandomPokemonFact()
    assert(null != ent)
  })


  test('basic', async (t) => {

    const live = 'TRUE' === process.env.POKEFACT_TEST_LIVE
    for (const op of ['list']) {
      if (!live && maybeSkipControl(t, 'entityOp', 'get_random_pokemon_fact.' + op, live)) return
    }

    
    const setup = basicSetup()
    if (setup.live) {
      return runLiveEntity(setup, {"active":true,"alias":{"field":{}},"fields":[{"active":true,"name":"data","req":true,"short":"Array containing Pokemon facts","type":"`$ARRAY`","index$":0}],"name":"get_random_pokemon_fact","op":{"list":{"input":"data","name":"list","points":[{"active":true,"args":{},"contract":{"id":"GET /","json":"{\"operationId\":\"getRandomPokemonFact\",\"parameters\":[],\"protocol\":\"http\",\"responses\":{\"200\":{\"content\":{\"application/json\":{\"examples\":{\"eternatus\":{\"summary\":\"Example Pokemon fact\",\"value\":{\"data\":[\"Eternamax Eternatus: Is tied with Blissey for the highest base HP stat of all Pokémon. Has the highest base Defense and Special Defense stats of all Pokémon. A level 100 Eternamax Eternatus could reach 655 in one of these stats, which would cause the stat to overflow to 0, due to a quirk in the coding for Pokémon Sword and Shield which affects no other Pokémon. Has the highest base stat total of all Pokémon, with 1125. This also makes it the only Pokémon with a four-digit base stat total. Is the only alternate form of a Legendary Pokémon that cannot be legitimately used by the player.\"]}}},\"schema\":{\"properties\":{\"data\":{\"description\":\"Array containing Pokemon facts\",\"items\":{\"description\":\"A random Pokemon fact\",\"type\":\"string\"},\"type\":\"array\"}},\"required\":[\"data\"],\"type\":\"object\"}}},\"description\":\"Successful response with a random Pokemon fact\"},\"500\":{\"content\":{\"application/json\":{\"schema\":{\"properties\":{\"error\":{\"description\":\"Error message\",\"type\":\"string\"}},\"type\":\"object\"}}},\"description\":\"Internal server error\"}},\"securitySource\":\"unspecified\"}","source":"openapi3","version":1},"kind":"http","method":"GET","orig":"/","segments":[],"select":{},"transform":{"req":"`reqdata`","res":"`body.data`"},"index$":0}],"key$":"list"}},"relations":{"ancestors":[]},"key$":"get_random_pokemon_fact","name__orig":"get_random_pokemon_fact","Name":"GetRandomPokemonFact","name_":"get_random_pokemon_fact","name-":"get-random-pokemon-fact","NAME":"GET_RANDOM_POKEMON_FACT","index$":0}, {"active":true,"entity":"get_random_pokemon_fact","key$":"BasicGetRandomPokemonFactFlow","kind":"basic","name":"BasicGetRandomPokemonFactFlow","param":{},"step":[{"active":true,"data":{},"input":{},"match":{},"op":"list","spec":[],"valid":[{"apply":"ItemExists","def":{"ref":"get_random_pokemon_fact_ref01"}}],"index$":0}]}, 'GetRandomPokemonFact')
    }
    const client = setup.client
    const struct = setup.struct

    const isempty = struct.isempty
    const select = struct.select

    let get_random_pokemon_fact_ref01_data = Object.values(setup.data.existing.get_random_pokemon_fact)[0] as any

    // LIST
    const get_random_pokemon_fact_ref01_ent = client.GetRandomPokemonFact()
    const get_random_pokemon_fact_ref01_match: any = {}

    const get_random_pokemon_fact_ref01_list = (await get_random_pokemon_fact_ref01_ent.list(get_random_pokemon_fact_ref01_match)).map((e: any) => e.data())


  })
})



function basicSetup(extra?: any) {
  // TODO: fix test def options
  const options: any = {} // null

  // TODO: needs test utility to resolve path
  const entityDataFile =
    Path.resolve(__dirname, 
      '../../../../.sdk/test/entity/get_random_pokemon_fact/GetRandomPokemonFactTestData.json')

  // TODO: file ready util needed?
  const entityDataSource = Fs.readFileSync(entityDataFile).toString('utf8')

  // TODO: need a xlang JSON parse utility in voxgig/struct with better error msgs
  const entityData = JSON.parse(entityDataSource)

  options.entity = entityData.existing

  let client = PokefactSDK.test(options, extra)
  const struct = client.utility().struct
  const merge = struct.merge
  const transform = struct.transform

  let idmap = transform(
    ['get_random_pokemon_fact01','get_random_pokemon_fact02','get_random_pokemon_fact03'],
    {
      '`$PACK`': ['', {
        '`$KEY`': '`$COPY`',
        '`$VAL`': ['`$FORMAT`', 'upper', '`$COPY`']
      }]
    })

  const env = envOverride({
    'POKEFACT_TEST_GET_RANDOM_POKEMON_FACT_ENTID': idmap,
    'POKEFACT_TEST_LIVE': 'FALSE',
    'POKEFACT_TEST_EXPLAIN': 'FALSE',
  })

  idmap = env['POKEFACT_TEST_GET_RANDOM_POKEMON_FACT_ENTID']

  const live = 'TRUE' === env.POKEFACT_TEST_LIVE

  const transport = createLiveTransport()
  if (live) {
    const rawIds = process.env['POKEFACT_TEST_GET_RANDOM_POKEMON_FACT_ENTID']
    idmap = rawIds && rawIds.trim() ? JSON.parse(rawIds) : {}
    if (!idmap || Array.isArray(idmap) || typeof idmap !== 'object') {
      throw new Error('Live ENTID must be a JSON object')
    }
    client = new PokefactSDK(merge([
      // FIRST, so the generated fields below win: sdk-test-control.json's
      // test.client.options adds to the live client, it does not redirect it.
      liveClientOptions(),
      {
      },
      // 'extra || {}', not a bare 'extra': struct.merge returns UNDEFINED when the
      // last entry is undefined, and basicSetup is normally called with no
      // argument at all - so a bare 'extra' silently discarded the apikey
      // and server values above and handed the SDK undefined. Harmless
      // while there was nothing in that object; not harmless now.
      extra || {},
      { system: { fetch: transport.fetch } }
    ]))
  }

  const setup = {
    idmap,
    env,
    options,
    client,
    struct,
    data: entityData,
    explain: 'TRUE' === env.POKEFACT_TEST_EXPLAIN,
    live,
    transport,
    now: Date.now(),
  }

  return setup
}
  
