# Pokefact SDK utility: make_context
require_relative '../core/context'
module PokefactUtilities
  MakeContext = ->(ctxmap, basectx) {
    PokefactContext.new(ctxmap, basectx)
  }
end
