
import { Context } from './Context'


class PokefactError extends Error {

  isPokefactError = true

  sdk = 'Pokefact'

  code: string
  ctx: Context

  constructor(code: string, msg: string, ctx: Context) {
    super(msg)
    this.code = code
    this.ctx = ctx
  }

}

export {
  PokefactError
}

