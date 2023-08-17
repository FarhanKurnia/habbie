<?php

namespace App\Services;
use App\Models\Reseller;
use Carbon\Carbon;

class MembershipService {

    protected $resellerData;
    
    public function __construct($data)
    {
        $this->resellerData = $data;
    }

    protected function insertMembershipData($data)
    {

        $reseller = Reseller::create([
            'reseller_id' => $data['reseller_id'], 
            'name' => $data['name'], 
            'email'=> $data['email'], 
            'gender'=> $data['gender'], 
            'phone'=> $data['phone'], 
            'birth_date'=> Carbon::parse($data['birth_date']), 
            'identity_card'=> $data['identity_card'], 
            'status'=> 'request', 
            'address'=> $data['address'], 
            'province'=> $data['province'], 
            'city'=> $data['city'],
            'subdistrict'=> $data['subdistrict'],
            'postal_code'=> $data['postal_code'],
        ]);

        return $reseller;
    }

    public function create()
    {
        $this->insertMembershipData($this->resellerData);
    }
}