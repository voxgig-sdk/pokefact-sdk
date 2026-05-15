
import { test, describe } from 'node:test'
import { equal } from 'node:assert'


import { PokefactSDK } from '..'


describe('exists', async () => {

  test('test-mode', async () => {
    const testsdk = await PokefactSDK.test()
    equal(null !== testsdk, true)
  })

})
