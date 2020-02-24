using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class PokemonBase : MonoBehaviour
{

    struct Pokemon {

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

        /** Functions **/
        public void Attack() { }
        public void TakeDamage() { }
        public void DealDamage() { }
        public void IsDead() { }
        public void StatsRecorder() { }
        

    }

}
