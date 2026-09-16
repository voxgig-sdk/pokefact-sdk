# Pokefact SDK feature factory

require_relative 'feature/base_feature'
require_relative 'feature/ratelimit_feature'
require_relative 'feature/retry_feature'
require_relative 'feature/test_feature'
require_relative 'feature/timeout_feature'


module PokefactFeatures
  def self.make_feature(name)
    case name
    when "base"
      PokefactBaseFeature.new
    when "ratelimit"
      PokefactRatelimitFeature.new
    when "retry"
      PokefactRetryFeature.new
    when "test"
      PokefactTestFeature.new
    when "timeout"
      PokefactTimeoutFeature.new
    else
      PokefactBaseFeature.new
    end
  end
end
