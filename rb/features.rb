# Pokefact SDK feature factory

require_relative 'feature/base_feature'
require_relative 'feature/test_feature'


module PokefactFeatures
  def self.make_feature(name)
    case name
    when "base"
      PokefactBaseFeature.new
    when "test"
      PokefactTestFeature.new
    else
      PokefactBaseFeature.new
    end
  end
end
