using System;
using UnityEngine;

[Serializable]
public class PokemonBase 
{
    public string pokemonid; //POKEMONID
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
    public PokemonBase pokemonObject;

    

    public string FetchName()
    {
        return pokemonObject.name;
    }

}