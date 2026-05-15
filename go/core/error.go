package core

type PokefactError struct {
	IsPokefactError bool
	Sdk              string
	Code             string
	Msg              string
	Ctx              *Context
	Result           any
	Spec             any
}

func NewPokefactError(code string, msg string, ctx *Context) *PokefactError {
	return &PokefactError{
		IsPokefactError: true,
		Sdk:              "Pokefact",
		Code:             code,
		Msg:              msg,
		Ctx:              ctx,
	}
}

func (e *PokefactError) Error() string {
	return e.Msg
}
