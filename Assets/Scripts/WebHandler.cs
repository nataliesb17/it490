using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.Networking;
using UnityEngine.UI;


public class WebHandler : MonoBehaviour
{

    public string url;
    public string data_str = "";
    public string[] party;
    public PokemonBase[] serialized_party;

    public void FetchData()
    {
        StartCoroutine(_FetchData());
    }

    public IEnumerator _FetchData()
    {

        //Web requests
        Debug.Log(url);
        WWW req = new WWW(url);
        yield return req;
        data_str = req.text;
        party = data_str.Split(',');
        Debug.Log("Data: " + data_str);
        Debug.Log("Party: " + party);

        //Json
        string json_str = JsonUtility.ToJson(data_str);
        PokemonBase poke = new PokemonBase();
        poke = JsonUtility.FromJson<PokemonBase>(json_str);
        //serialized_party[0] = poke;
        Debug.Log("POKEMON NAME: " + poke.name);
        Debug.Log("POKEMON ID: " + poke.pokemonid);
       // Debug.Log(serialized_party[0]);
        
    }
    
}
