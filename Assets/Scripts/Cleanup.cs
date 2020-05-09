using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class Cleanup : MonoBehaviour
{
    public GameObject[] UI_slots;

    // Start is called before the first frame update
    void Start()
    {
        SpriteStart();
    }

    public void SpriteStart()
    {
        for (int i = 0; i < UI_slots.Length; i++)
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
    }
}
