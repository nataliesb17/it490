using System;
using UnityEngine;

[Serializable]
public class PokemonBase 
{
    public string pokemon_id; //POKEMONID
    public string name; //NAME
    public string type1; //TYPE1
    public string type2; //TYPE2
    public string health; //HEALTH
    public string move1; //MOVE1
    public string move2; //MOVE2
    public string move3; // VE3
    public string move4; //MOVE
  
}

[Serializable]
public class PokemonWrapper
{
    public PokemonBase slot1;
    public PokemonBase slot2;
    public PokemonBase slot3;
    public PokemonBase slot4;
    public PokemonBase slot5;
    public PokemonBase slot6;
    public PokemonBase[] party;
    
    public PokemonBase[] ReturnParty()
    {
        party[0] = slot1;
        party[1] = slot2;
        party[2] = slot3;
        party[3] = slot4;
        party[4] = slot5;
        party[5] = slot6;
        return party;
    }

    public PokemonWrapper CreateNewWrapper()
    {
        PokemonWrapper newObject = new PokemonWrapper();
        return newObject;
    }

    public string FetchName(PokemonBase obj)
    {
        return obj.name;
    }

    public string FetchDexID(PokemonBase obj)
    {
        return obj.pokemon_id;
    }

    public string FetchType_01(PokemonBase obj)
    {
        return obj.type1;
    }

    public string FetchType_02(PokemonBase obj)
    {
        return obj.type2;
    }

    public string FetchHealth(PokemonBase obj)
    {
        return obj.health;
    }

    public string[] FetchMoves(PokemonBase obj)
    {
        string[] moveset = new string[4];
        moveset[0] = obj.move1;
        moveset[1] = obj.move2;
        moveset[2] = obj.move3;
        moveset[3] = obj.move4;

        return moveset;
    }

}