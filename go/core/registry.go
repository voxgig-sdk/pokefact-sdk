package core

var UtilityRegistrar func(u *Utility)

var NewBaseFeatureFunc func() Feature

var NewTestFeatureFunc func() Feature

var NewGetRandomPokemonFactEntityFunc func(client *PokefactSDK, entopts map[string]any) PokefactEntity

