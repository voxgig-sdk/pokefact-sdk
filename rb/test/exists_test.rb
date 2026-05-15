# Pokefact SDK exists test

require "minitest/autorun"
require_relative "../Pokefact_sdk"

class ExistsTest < Minitest::Test
  def test_create_test_sdk
    testsdk = PokefactSDK.test(nil, nil)
    assert !testsdk.nil?
  end
end
