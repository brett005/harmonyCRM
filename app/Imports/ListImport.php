<?php

namespace App\Imports;

use App\Models\VicdialList;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ListImport implements ToModel, WithBatchInserts, WithChunkReading, WithStartRow
{
    public $list_id = '';
    public $phone_code = '33';

    public $CODE_PRINCIPAL_DU_VENDEUR_INDEX = '';
    public $ID_SOURCE_INDEX = '';
    public $TITRE_INDEX = '';
    public $PRENOM_INDEX = '';
    public $INITIALE_INDEX = '';
    public $NOM_DE_FAMILLE_INDEX = '';
    public $ADRESSE_1_INDEX = '';
    public $ADRESSE_2_INDEX = '';
    public $ADRESSE_3_INDEX = '';
    public $VILLE_INDEX = '';
    public $ETAT_INDEX = '';
    public $PROVINCE_INDEX = '';
    public $CODE_POSTAL_INDEX = '';
    public $CODE_PAYS_INDEX = '';
    public $LE_GENRE_INDEX = '';
    public $DATE_DE_NAISSANCE_INDEX = '';
    public $E_MAIL_INDEX = '';
    public $MENTION_DE_SECURITE_INDEX = '';
    public $COMMENTAIRES_INDEX = '';
    public $RANG_INDEX = '';
    public $PROPRIETAIRE_INDEX = '';
    public $CHAMPSTEST_INDEX = '';
    public $NUMERO_DE_TELEPHONE_INDEX = '';
    public $TELEPHONE_SUPPLEMENTAIRE_INDEX = '';

    public function __construct($list_id, $phone_code, $CODE_PRINCIPAL_DU_VENDEUR_INDEX,
                                $ID_SOURCE_INDEX, $TITRE_INDEX, $PRENOM_INDEX, $INITIALE_INDEX,
                                $NOM_DE_FAMILLE_INDEX, $ADRESSE_1_INDEX, $ADRESSE_2_INDEX,  $ADRESSE_3_INDEX, $VILLE_INDEX, $ETAT_INDEX,
                                $PROVINCE_INDEX, $CODE_POSTAL_INDEX, $CODE_PAYS_INDEX, $LE_GENRE_INDEX, $DATE_DE_NAISSANCE_INDEX,
                                $E_MAIL_INDEX, $MENTION_DE_SECURITE_INDEX, $COMMENTAIRES_INDEX, $RANG_INDEX, $PROPRIETAIRE_INDEX,
                                $CHAMPSTEST_INDEX, $NUMERO_DE_TELEPHONE_INDEX, $TELEPHONE_SUPPLEMENTAIRE_INDEX )
    {
        $this->list_id = $list_id;
        $this->phone_code = $phone_code;
        $this->CODE_PRINCIPAL_DU_VENDEUR_INDEX = $CODE_PRINCIPAL_DU_VENDEUR_INDEX;
        $this->ID_SOURCE_INDEX = $ID_SOURCE_INDEX;
        $this->TITRE_INDEX = $TITRE_INDEX;
        $this->PRENOM_INDEX = $PRENOM_INDEX;
        $this->INITIALE_INDEX = $INITIALE_INDEX;
        $this->NOM_DE_FAMILLE_INDEX = $NOM_DE_FAMILLE_INDEX;
        $this->ADRESSE_1_INDEX = $ADRESSE_1_INDEX;
        $this->ADRESSE_2_INDEX = $ADRESSE_2_INDEX;
        $this->ADRESSE_3_INDEX = $ADRESSE_3_INDEX;
        $this->VILLE_INDEX = $VILLE_INDEX;
        $this->ETAT_INDEX = $ETAT_INDEX;
        $this->PROVINCE_INDEX = $PROVINCE_INDEX;
        $this->CODE_POSTAL_INDEX = $CODE_POSTAL_INDEX;
        $this->CODE_PAYS_INDEX = $CODE_PAYS_INDEX;
        $this->LE_GENRE_INDEX = $LE_GENRE_INDEX;
        $this->DATE_DE_NAISSANCE_INDEX = $DATE_DE_NAISSANCE_INDEX;
        $this->E_MAIL_INDEX = $E_MAIL_INDEX;
        $this->MENTION_DE_SECURITE_INDEX = $MENTION_DE_SECURITE_INDEX;
        $this->COMMENTAIRES_INDEX = $COMMENTAIRES_INDEX;
        $this->RANG_INDEX = $RANG_INDEX;
        $this->PROPRIETAIRE_INDEX = $PROPRIETAIRE_INDEX;
        $this->CHAMPSTEST_INDEX = $CHAMPSTEST_INDEX;
        $this->NUMERO_DE_TELEPHONE_INDEX = $NUMERO_DE_TELEPHONE_INDEX;
        $this->TELEPHONE_SUPPLEMENTAIRE_INDEX = $TELEPHONE_SUPPLEMENTAIRE_INDEX;
    }

    /**
     * @param array $row
     *
     *
     */
    public function model(array $row)
    {
        ##return \Illuminate\Database\Eloquent\Model|null
        $first_name = '';
        $second_name = '';
        $address1 = '';
        $address2 = '';
        $address3 = '';


        $get_list_id = '';
        $get_phone_code = '';
        $get_CODE_PRINCIPAL_DU_VENDEUR = '';
        $get_ID_SOURCE = '';
        $get_TITRE = '';
        $get_PRENOM = '';
        $get_INITIALE = '';
        $get_NOM_DE_FAMILLE = '';
        $get_ADRESSE_1 = '';
        $get_ADRESSE_2 = '';
        $get_ADRESSE_3 = '';
        $get_VILLE = '';
        $get_ETAT = '';
        $get_PROVINCE = '';
        $get_CODE_POSTAL = '';
        $get_CODE_PAYS = '';
        $get_LE_GENRE = '';
        $get_DATE_DE_NAISSANCE = '';
        $get_E_MAIL_INDEX = '';
        $get_MENTION_DE_SECURITE = '';
        $get_COMMENTAIRES = '';
        $get_RANG = '';
        $get_PROPRIETAIRE = '';
        $get_CHAMPSTEST = '';
        $get_NUMERO_DE_TELEPHONE = '';
        $get_TELEPHONE_SUPPLEMENTAIRE = '';

        /** LIST ID */
        /*if ($this->list_id != ''){
            $get_list_id = $row[intval($this->list_id)];
        } */

        /** PRENOM */
        if ($this->PRENOM_INDEX != 'null'){
            $first_name = $row[intval($this->PRENOM_INDEX)];
            if (strlen($first_name) > 30){
                $first_name = substr($first_name, 0, 30);
            }
        }

        /** NOM DE FAMILLE */
        if ($this->NOM_DE_FAMILLE_INDEX != 'null'){
            $second_name = $row[intval($this->NOM_DE_FAMILLE_INDEX)];
            if (strlen($second_name) > 30){
                $second_name = substr($second_name, 0, 30);
            }
        }

        /** CODE PRINCIPALE DU VENDEUR */
        if ($this->CODE_PRINCIPAL_DU_VENDEUR_INDEX != 'null'){
            $get_CODE_PRINCIPAL_DU_VENDEUR = $row[intval($this->CODE_PRINCIPAL_DU_VENDEUR_INDEX)];
        }

        /** ID SOURCE */
        if ($this->ID_SOURCE_INDEX != "null"){
            $get_ID_SOURCE = $row[intval($this->ID_SOURCE_INDEX)];
        }

        /** TITRE */
        if ($this->TITRE_INDEX != 'null'){
            $get_TITRE = $row[intval($this->TITRE_INDEX)];
        }

        /** INITTTIALE */
        if ($this->INITIALE_INDEX != 'null'){
            $get_INITIALE = $row[intval($this->INITIALE_INDEX)];
        }

        /** VILLE */
        if ($this->VILLE_INDEX != 'null'){
            $get_VILLE = $row[intval($this->VILLE_INDEX)];
            if (strlen($get_VILLE) > 50){
                $get_VILLE = substr($get_VILLE, 0, 50);
            }
        }

        /** ETAT */
        if ($this->ETAT_INDEX != 'null'){
            $get_ETAT = $row[intval($this->ETAT_INDEX)];
        }

        /** PROVINCE */
        if ($this->PROVINCE_INDEX != 'null'){
            $get_PROVINCE = $row[intval($this->PROVINCE_INDEX)];
        }

        /** CODE POSTALE */
        if ($this->CODE_POSTAL_INDEX != 'null'){
            $get_CODE_POSTAL = $row[intval($this->CODE_POSTAL_INDEX)];
            if (strlen($get_CODE_POSTAL) > 10){
                $get_CODE_POSTAL = substr($get_CODE_POSTAL, 0, 10);
            }
        }

        /** CODE PAYS */
        if ($this->CODE_PAYS_INDEX != 'null'){
            $get_CODE_PAYS = $row[intval($this->CODE_PAYS_INDEX)];
        }

        /** LE GENRE */
        if ($this->LE_GENRE_INDEX != 'null'){
            $get_LE_GENRE = $row[intval($this->LE_GENRE_INDEX)];
        }

        /** DATE DE NAISSANCE */
        if ($this->DATE_DE_NAISSANCE_INDEX != 'null'){
            $get_DATE_DE_NAISSANCE = $row[intval($this->DATE_DE_NAISSANCE_INDEX)];
        }

        /** E-MAIL */
        if ($this->E_MAIL_INDEX != 'null'){
            $get_E_MAIL = $row[intval($this->E_MAIL_INDEX)];
        }

        /** MENTION DE SECURITE */
        if ($this->MENTION_DE_SECURITE_INDEX != 'null'){
            $get_MENTION_DE_SECURITE = $row[intval($this->MENTION_DE_SECURITE_INDEX)];
        }

        /** COMMENTAIRES */
        if ($this->COMMENTAIRES_INDEX != 'null'){
            $get_COMMENTAIRES = $row[intval($this->COMMENTAIRES_INDEX)];
        }

        /** RANG */
        if ($this->RANG_INDEX != 'null'){
            $get_RANG = $row[intval($this->RANG_INDEX)];
        }

        /** PROPRIETAIRE */
        if ($this->PROPRIETAIRE_INDEX != 'null'){
            $get_PROPRIETAIRE = $row[intval($this->PROPRIETAIRE_INDEX)];
        }

        /** CHAMPSTEST */
        if ($this->CHAMPSTEST_INDEX != 'null'){
            $get_CHAMPSTEST = $row[intval($this->CHAMPSTEST_INDEX)];
        }

        /** NUMERO DE TELEPHONE */
        if ($this->NUMERO_DE_TELEPHONE_INDEX != 'null'){
            $get_NUMERO_DE_TELEPHONE = $row[intval($this->NUMERO_DE_TELEPHONE_INDEX)];
            if ($get_NUMERO_DE_TELEPHONE > 18){
                $get_NUMERO_DE_TELEPHONE = substr($get_NUMERO_DE_TELEPHONE, 0, 18);
            }
        }

        /** ADDRESSE 1 */
        if ($this->ADRESSE_1_INDEX != 'null'){
            $get_ADRESSE_1 = $row[intval($this->ADRESSE_1_INDEX)];
            if (strlen($get_ADRESSE_1) > 100){
                $get_ADRESSE_1 = substr($get_ADRESSE_1, 0, 100);
            }
        }

        /** ADDRESSE 2 */
        if ($this->ADRESSE_2_INDEX != 'null'){
            $get_ADRESSE_2 = $row[intval($this->ADRESSE_2_INDEX)];
            if (strlen($get_ADRESSE_2) > 100){
                $get_ADRESSE_2 = substr($get_ADRESSE_2, 0, 100);
            }
        }

        /** ADDRESSE 3 */
        if ($this->ADRESSE_3_INDEX != 'null'){
            $get_ADRESSE_3 = $row[intval($this->ADRESSE_3_INDEX)];
            if (strlen($get_ADRESSE_3) > 100){
                $get_ADRESSE_3 = substr($get_ADRESSE_3, 0, 100);
            }
        }

        /** TELEPHONE SUPPLEMENTAIRE */
        if ($this->TELEPHONE_SUPPLEMENTAIRE_INDEX != 'null'){
            $get_TELEPHONE_SUPPLEMENTAIRE = $row[intval($this->TELEPHONE_SUPPLEMENTAIRE_INDEX)];
            if (strlen($get_TELEPHONE_SUPPLEMENTAIRE) > 18){
                $get_TELEPHONE_SUPPLEMENTAIRE = substr($get_TELEPHONE_SUPPLEMENTAIRE, 0, 100);
            }
        }


        return new VicdialList([

             //`lead_id` => 'DEFAULT',
             'entry_date' =>  date("Y-m-d H:i:s", time()),
             'modify_date' => date("Y-m-d H:i:s", time()),
             'status' => 'NEW',
             'user' => '',
             'vendor_lead_code' => '',
             'source_id' => '',
             'list_id' => intval($this->list_id) ,
             'gmt_offset_now' => 1.00,
             'called_since_last_reset' => 'N',
             'phone_code'  => intval($this->phone_code) ,
             'phone_number'  => strval($get_NUMERO_DE_TELEPHONE) ,
             'title' => '',
             'first_name' => strval($first_name) ,
             'middle_initial' => '',
             'last_name' => strval($second_name),
             'address1' => strval($get_ADRESSE_1),
             'address2' => strval($get_ADRESSE_2),
             'address3' => strval($get_ADRESSE_3),
             'city'  => strval($get_VILLE),
             'state' => '',
             'province' => '',
             'postal_code'  => strval($get_CODE_POSTAL) ,
             'country_code' => '',
             'gender' => 'M',
             'date_of_birth' =>  date("Y-m-d H:i:s", 0),
             'alt_phone' => strval($get_TELEPHONE_SUPPLEMENTAIRE),
             'email' => '',
             'security_phrase' => '',
             'comments' => '',
             'called_count' => 1,
             'last_local_call_time' => date("Y-m-d H:i:s", 0),
             'rank' => 0,
             'owner' => '',
             'entry_list_id' => intval($this->list_id),
         ]);

    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function startRow(): int
    {
        // TODO: Implement startRow() method.
        return 2;
    }
}
