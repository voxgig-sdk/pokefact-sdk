import { Context } from './Context';
declare class PokefactError extends Error {
    isPokefactError: boolean;
    sdk: string;
    code: string;
    ctx: Context;
    status: number;
    get notFound(): boolean;
    constructor(code: string, msg: string, ctx: Context);
}
export { PokefactError };
