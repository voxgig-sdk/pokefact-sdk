# Pokefact SDK feature factory

from feature.base_feature import PokefactBaseFeature
from feature.test_feature import PokefactTestFeature


def _make_feature(name):
    features = {
        "base": lambda: PokefactBaseFeature(),
        "test": lambda: PokefactTestFeature(),
    }
    factory = features.get(name)
    if factory is not None:
        return factory()
    return features["base"]()
