package voxgigpokefactsdk

import (
	"github.com/voxgig-sdk/pokefact-sdk/core"
	"github.com/voxgig-sdk/pokefact-sdk/entity"
	"github.com/voxgig-sdk/pokefact-sdk/feature"
	_ "github.com/voxgig-sdk/pokefact-sdk/utility"
)

// Type aliases preserve external API.
type PokefactSDK = core.PokefactSDK
type Context = core.Context
type Utility = core.Utility
type Feature = core.Feature
type Entity = core.Entity
type PokefactEntity = core.PokefactEntity
type FetcherFunc = core.FetcherFunc
type Spec = core.Spec
type Result = core.Result
type Response = core.Response
type Operation = core.Operation
type Control = core.Control
type PokefactError = core.PokefactError

// BaseFeature from feature package.
type BaseFeature = feature.BaseFeature

func init() {
	core.NewBaseFeatureFunc = func() core.Feature {
		return feature.NewBaseFeature()
	}
	core.NewTestFeatureFunc = func() core.Feature {
		return feature.NewTestFeature()
	}
	core.NewGetRandomPokemonFactEntityFunc = func(client *core.PokefactSDK, entopts map[string]any) core.PokefactEntity {
		return entity.NewGetRandomPokemonFactEntity(client, entopts)
	}
}

// Constructor re-exports.
var NewPokefactSDK = core.NewPokefactSDK
var TestSDK = core.TestSDK
var NewContext = core.NewContext
var NewSpec = core.NewSpec
var NewResult = core.NewResult
var NewResponse = core.NewResponse
var NewOperation = core.NewOperation
var MakeConfig = core.MakeConfig
var NewBaseFeature = feature.NewBaseFeature
var NewTestFeature = feature.NewTestFeature
