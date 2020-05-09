using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;


public class UIHandler : MonoBehaviour
{

    public PokemonWrapper userParty;
    public GameObject WebHandler;
    private WebHandler _webhandler;
    public GameObject[] UI_slots;
    public string partydata_str;

    //* Slot 1 debugging *//
    /*
    public Image s1_spr1;
    public Image s1_spr2;
    public Image s1_spr3;
    public Text s1_name;
    public Text s1_health;
    public Text s1_move;
    */

    // Start is called before the first frame update
    void Start()
    {
        for(int i = 0; i < UI_slots.Length; i++)
        {
            GameObject temp = UI_slots[i];
            Image f_temp = temp.transform.Find("aSprite").gameObject.GetComponent<Image>();
            Image b_temp = temp.transform.Find("bSprite").gameObject.GetComponent<Image>();
            Image p_temp = temp.transform.Find("PartySprite").gameObject.GetComponent<Image>();
            Sprite unknown = Resources.Load<Sprite>("Sprites/Pokemon/unknown.png");
            f_temp.sprite = unknown;
            b_temp.sprite = unknown;
            p_temp.sprite = unknown;

        }
        _webhandler = WebHandler.GetComponent<WebHandler>();     
    }

    // Update is called once per frame
    void Update()
    {
        //** Load sprites **/
        SpriteLoad(userParty.FetchName(userParty.slot1), UI_slots[0]);
        SpriteLoad(userParty.FetchName(userParty.slot2), UI_slots[1]);
        SpriteLoad(userParty.FetchName(userParty.slot3), UI_slots[2]);
        SpriteLoad(userParty.FetchName(userParty.slot4), UI_slots[3]);
        SpriteLoad(userParty.FetchName(userParty.slot5), UI_slots[4]);
        SpriteLoad(userParty.FetchName(userParty.slot6), UI_slots[5]);

        //** Update names **//
        NameUpdate(userParty.FetchName(userParty.slot1), UI_slots[0]);
        NameUpdate(userParty.FetchName(userParty.slot2), UI_slots[1]);
        NameUpdate(userParty.FetchName(userParty.slot3), UI_slots[2]);
        NameUpdate(userParty.FetchName(userParty.slot4), UI_slots[3]);
        NameUpdate(userParty.FetchName(userParty.slot5), UI_slots[4]);
        NameUpdate(userParty.FetchName(userParty.slot6), UI_slots[5]);

        //** Update health **//
        HealthUpdate(userParty.FetchHealth(userParty.slot1), UI_slots[0]);
        Debug.Log("SLOT1 HEALTH: " + userParty.FetchHealth(userParty.slot1));

        //** Update moves **//
        //MoveUpdate(userParty.FetchMoves(userParty.slot1), UI_slots[0]);

        Debug.Log("UIHANDLER: SLOT1.name == " + userParty.slot1.name);
    }
    
    public void _FetchPartyInfo()
    {
        userParty = _webhandler.poke;
        //Debug.Log("UIHANDLER DEBUG: " + userParty.FetchName(userParty.slot1)); 
    }
    
    //fetch sprites from resources and set them to the UI image objects
    public void SpriteLoad(string name, GameObject slot)
    {

        //Get image children in slot
        GameObject ago = slot.transform.Find("aSprite").gameObject;
        GameObject bgo = slot.transform.Find("bSprite").gameObject;
        GameObject pgo = slot.transform.Find("PartySprite").gameObject;
        //load sprites from resources
        Sprite fspr = Resources.Load<Sprite>("Sprites/Pokemon/Front/" + name);
        Sprite bspr = Resources.Load<Sprite>("Sprites/Pokemon/Back/" + name);
        Sprite pspr = Resources.Load<Sprite>("Sprites/Pokemon/PartyIcons/" + name);
        Sprite unknown = Resources.Load<Sprite>("Sprites/Pokemon/unknown.png");

        //** in case sprites come up empty **//
        if(fspr == null)
        {
            fspr = unknown;
        }

        else if (bspr == null)
        {
            bspr = unknown;
        }

        else if (pspr == null)
        {
            pspr = unknown;
        }

        //set images to loaded sprites
        ago.GetComponent<Image>().sprite = fspr;
        bgo.GetComponent<Image>().sprite = bspr;
        pgo.GetComponent<Image>().sprite = pspr;
        
    }

    public void NameUpdate(string name, GameObject slot)
    {
        GameObject text = slot.transform.Find("Name").gameObject;
        Text _text = text.GetComponent<Text>();
        _text.text = "NAME: " + name;     

    }

    public void HealthUpdate(string health, GameObject slot)
    {
        GameObject text = slot.transform.Find("Health").gameObject;
        Text _text = text.GetComponent<Text>();
        _text.text = "HEALTH: " + health;
    }

    public void MoveUpdate(string[] moves, GameObject slot)
    {
        GameObject text = slot.transform.Find("Moves").gameObject;
        Text _text = slot.GetComponent<Text>();
        
    }

    public void FetchPokemonCry(string name, GameObject slot) { }

    
}
