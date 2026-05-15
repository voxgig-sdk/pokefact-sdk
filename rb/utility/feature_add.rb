# Pokefact SDK utility: feature_add
module PokefactUtilities
  FeatureAdd = ->(ctx, f) {
    ctx.client.features << f
  }
end
