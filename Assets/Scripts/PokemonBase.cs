using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PokemonBase : MonoBehaviour
{
        /** Identifiers **/
        public int dex_ID;
        public bool isPlayer;

        /** String Vars **/
        public string name;
        public string[] type;

        /** Battle Vars **/
        public int health;
        public int attack;
        public int defense;
        public int spAtk;
        public int spDef;
        public int speed;
        public GameObject[] moves;

        /** Sprite info **/
        public Sprite frontSprite;
        public Sprite backSprite;
        public Sprite partySprite;

        /** Private stats **/
        private int victories;
        private int losses;

        /** Pokemon cry **/
        public AudioClip cry;

      
    /*****Defined functions*****/

    /* Handle attacks
     * @param Use one of the gamobjects in the moves array
     * */
    public void Attack(GameObject move)
    {

    }

    /* Handle taking damage from the enemy
     * @param Enemy - pokemon doing damage
     * @param self - the pokemon taking damage
     * */
    public void TakeDamage(GameObject enemy, GameObject self)
    {

    }

    public void DealDamage(GameObject enemy, Pokemon self)
    {
        
    }



}
