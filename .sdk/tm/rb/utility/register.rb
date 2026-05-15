# Pokefact SDK utility registration
require_relative '../core/utility_type'
require_relative 'clean'
require_relative 'done'
require_relative 'make_error'
require_relative 'feature_add'
require_relative 'feature_hook'
require_relative 'feature_init'
require_relative 'fetcher'
require_relative 'make_fetch_def'
require_relative 'make_context'
require_relative 'make_options'
require_relative 'make_request'
require_relative 'make_response'
require_relative 'make_result'
require_relative 'make_point'
require_relative 'make_spec'
require_relative 'make_url'
require_relative 'param'
require_relative 'prepare_auth'
require_relative 'prepare_body'
require_relative 'prepare_headers'
require_relative 'prepare_method'
require_relative 'prepare_params'
require_relative 'prepare_path'
require_relative 'prepare_query'
require_relative 'result_basic'
require_relative 'result_body'
require_relative 'result_headers'
require_relative 'transform_request'
require_relative 'transform_response'

PokefactUtility.registrar = ->(u) {
  u.clean = PokefactUtilities::Clean
  u.done = PokefactUtilities::Done
  u.make_error = PokefactUtilities::MakeError
  u.feature_add = PokefactUtilities::FeatureAdd
  u.feature_hook = PokefactUtilities::FeatureHook
  u.feature_init = PokefactUtilities::FeatureInit
  u.fetcher = PokefactUtilities::Fetcher
  u.make_fetch_def = PokefactUtilities::MakeFetchDef
  u.make_context = PokefactUtilities::MakeContext
  u.make_options = PokefactUtilities::MakeOptions
  u.make_request = PokefactUtilities::MakeRequest
  u.make_response = PokefactUtilities::MakeResponse
  u.make_result = PokefactUtilities::MakeResult
  u.make_point = PokefactUtilities::MakePoint
  u.make_spec = PokefactUtilities::MakeSpec
  u.make_url = PokefactUtilities::MakeUrl
  u.param = PokefactUtilities::Param
  u.prepare_auth = PokefactUtilities::PrepareAuth
  u.prepare_body = PokefactUtilities::PrepareBody
  u.prepare_headers = PokefactUtilities::PrepareHeaders
  u.prepare_method = PokefactUtilities::PrepareMethod
  u.prepare_params = PokefactUtilities::PrepareParams
  u.prepare_path = PokefactUtilities::PreparePath
  u.prepare_query = PokefactUtilities::PrepareQuery
  u.result_basic = PokefactUtilities::ResultBasic
  u.result_body = PokefactUtilities::ResultBody
  u.result_headers = PokefactUtilities::ResultHeaders
  u.transform_request = PokefactUtilities::TransformRequest
  u.transform_response = PokefactUtilities::TransformResponse
}
