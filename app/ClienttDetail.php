<?php

namespace App;



class ClienttDetail
{
    //
    public $name = null;
    public $phone=null;
    public $email = null;

    //Address Info
    public $block=null;
    public $street=null;
    public $avanue=null;
    public $building=null;
    public $floor=null;
    public $officeno=null;
    public $specialdir=null;
    public $type=null;
    public $house=null;
    public $mapaddress=null;
    public function __construct($oldcart)
    {
        if($oldcart){

            $this->name=$oldcart->name;
            $this->phone=$oldcart->phone;
            $this->email=$oldcart->email;

            //Address Details
            $this->block=$oldcart->block;
            $this->street=$oldcart->street;
            $this->avanue=$oldcart->avanue;
            $this->building=$oldcart->building;
            $this->officeno=$oldcart->officeno;
            $this->specialdir=$oldcart->specialdir;
            $this->type=$oldcart->type;
            $this->house=$oldcart->house;
            $this->specialdir=$oldcart->specialdir;
            $this->mapaddress=$oldcart->mapaddress;





               }
    }

    public function updateNameAndPhone($name,$phone,$email){
        $this->name=$name;
        $this->phone=$phone;
        $this->email=$email;
    }
    public function addressinfo($block='',$street='',$avanue='',$building='',$officeno,$floor,$specialdir='',$type='House',$house='House'){

        $this->house=$house;
        $this->block=$block;
        $this->street=$street;
        $this->avanue=$avanue;
        $this->building=$building;
        $this->officeno=$officeno;
        $this->specialdir=$specialdir;
        $this->type=$type;
        $this->floor=$floor;
    }
    public function mapAddress($address){
        $this->mapaddress=$address;
    }


}
