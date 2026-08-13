# Pokefact SDK utility: make_context

from pokefact_sdk.core.context import PokefactContext


def make_context_util(ctxmap, basectx):
    return PokefactContext(ctxmap, basectx)
