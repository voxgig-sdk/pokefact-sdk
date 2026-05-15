-- Pokefact SDK error

local PokefactError = {}
PokefactError.__index = PokefactError


function PokefactError.new(code, msg, ctx)
  local self = setmetatable({}, PokefactError)
  self.is_sdk_error = true
  self.sdk = "Pokefact"
  self.code = code or ""
  self.msg = msg or ""
  self.ctx = ctx
  self.result = nil
  self.spec = nil
  return self
end


function PokefactError:error()
  return self.msg
end


function PokefactError:__tostring()
  return self.msg
end


return PokefactError
