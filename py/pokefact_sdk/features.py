# Pokefact SDK feature factory

from pokefact_sdk.feature.base_feature import PokefactBaseFeature
from pokefact_sdk.feature.ratelimit_feature import PokefactRatelimitFeature
from pokefact_sdk.feature.retry_feature import PokefactRetryFeature
from pokefact_sdk.feature.test_feature import PokefactTestFeature
from pokefact_sdk.feature.timeout_feature import PokefactTimeoutFeature


_FEATURES = {
    "base": lambda: PokefactBaseFeature(),
    "ratelimit": lambda: PokefactRatelimitFeature(),
    "retry": lambda: PokefactRetryFeature(),
    "test": lambda: PokefactTestFeature(),
    "timeout": lambda: PokefactTimeoutFeature(),
}


def _make_feature(name):
    factory = _FEATURES.get(name)
    if factory is not None:
        return factory()
    return _FEATURES["base"]()


# True when this SDK was generated with the named feature class - the
# constructor's tolerance for extend-carried features reads this (an
# active name with no generated class must not become a BaseFeature
# stray when an extend instance carries it).
def _has_feature(name):
    return name in _FEATURES
