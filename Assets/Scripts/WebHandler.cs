using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.Networking;
using UnityEngine.UI;
using System;


[Serializable]
public class WebHandler : MonoBehaviour
{

    public string url;
    public string data_str = "";
    public string[] test_variable;
    public PokemonWrapper poke;

    private void Start()
    {
        FetchData();
    }
    public void FetchData()
    {
        StartCoroutine(_FetchData());
    }

    //Web requests
    public IEnumerator _FetchData()
    {        
        Debug.Log(url);
        WWW req = new WWW(url);
        yield return req;
        data_str = req.text;
        test_variable = data_str.Split(',');
        Debug.Log("Data: " + data_str);
        Debug.Log("Party: " + test_variable);
        CreatePokemonObjects(data_str);
    }

    //Parse json to PokemonBase class
    public PokemonWrapper CreatePokemonObjects(string datastr)
    {
        poke = new PokemonWrapper().CreateNewWrapper();
        data_str.Trim();
        poke = JsonUtility.FromJson<PokemonWrapper>(data_str);

        Debug.Log(poke.slot1.name);
        Debug.Log(poke.slot2.pokemonid + " -- " + poke.slot2.name);
        Debug.Log(poke.slot3.name);
        Debug.Log(poke.slot4.name);
        Debug.Log(poke.slot5.name);
        Debug.Log(poke.slot6.name);
      
        return poke;
    }
}
