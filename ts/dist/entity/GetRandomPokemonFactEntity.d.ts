import { PokefactEntityBase } from '../PokefactEntityBase';
import type { PokefactSDK } from '../PokefactSDK';
import type { Control } from '../types';
import type { GetRandomPokemonFact, GetRandomPokemonFactListMatch } from '../PokefactTypes';
declare class GetRandomPokemonFactEntity extends PokefactEntityBase<GetRandomPokemonFact> {
    constructor(client: PokefactSDK, entopts: any);
    make(this: GetRandomPokemonFactEntity): GetRandomPokemonFactEntity;
    list(this: any, reqmatch?: GetRandomPokemonFactListMatch, ctrl?: Control): Promise<GetRandomPokemonFactEntity[]>;
}
export { GetRandomPokemonFactEntity };
