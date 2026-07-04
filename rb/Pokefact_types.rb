# frozen_string_literal: true

# Typed models for the Pokefact SDK.
#
# GENERATED from the API model: main.kit.entity.<e>.fields[] and per-op
# params (op.<name>.points[].args.params[]). Member types come from the
# canonical type sentinels via @voxgig/sdkgen canonToType (source of truth:
# @voxgig/apidef VALID_CANON). Ruby types are unenforced; these YARD
# annotations document the shapes. Do not edit by hand.

# GetRandomPokemonFact entity data model.
#
# @!attribute [rw] data
#   @return [Array]
GetRandomPokemonFact = Struct.new(
  :data,
  keyword_init: true
)

# Match filter for GetRandomPokemonFact#list (any subset of GetRandomPokemonFact fields).
#
# @!attribute [rw] data
#   @return [Array, nil]
GetRandomPokemonFactListMatch = Struct.new(
  :data,
  keyword_init: true
)

