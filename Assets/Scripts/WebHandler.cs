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
        test_variable = data_str.Split(',');
        Debug.Log("Data: " + data_str);
        Debug.Log("Party: " + test_variable);

        //Json
        string json_str = JsonUtility.ToJson(data_str);
        PokemonWrapper poke = new PokemonWrapper();
        
        poke = JsonUtility.FromJson<PokemonWrapper>(json_str);
        //serialized_party[0] = poke;
        Debug.Log(poke.FetchName());
        
       // Debug.Log(serialized_party[0]);
        
    }
    
}
