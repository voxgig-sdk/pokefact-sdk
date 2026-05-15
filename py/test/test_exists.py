# ProjectName SDK exists test

import pytest
from pokefact_sdk import PokefactSDK


class TestExists:

    def test_should_create_test_sdk(self):
        testsdk = PokefactSDK.test(None, None)
        assert testsdk is not None
