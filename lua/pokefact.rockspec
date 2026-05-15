package = "voxgig-sdk-pokefact"
version = "0.0-1"
source = {
  url = "git://github.com/voxgig-sdk/pokefact-sdk.git"
}
description = {
  summary = "Pokefact SDK for Lua",
  license = "MIT"
}
dependencies = {
  "lua >= 5.3",
  "dkjson >= 2.5",
  "dkjson >= 2.5",
}
build = {
  type = "builtin",
  modules = {
    ["pokefact_sdk"] = "pokefact_sdk.lua",
    ["config"] = "config.lua",
    ["features"] = "features.lua",
  }
}
