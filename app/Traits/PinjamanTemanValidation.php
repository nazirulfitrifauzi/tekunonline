<?php

namespace App\Traits;

trait PinjamanTemanValidation
{
    public $team_mbr_name1;
    public $team_mbr_icno1;
    public $team_mbr_name2;
    public $team_mbr_icno2;
    public $team_mbr_name3;
    public $team_mbr_icno3;
    public $team_mbr_name4;
    public $team_mbr_icno4;
    public $duration_intro_team;
    public $discussion_date;
    public $supported_fin_amount;
    public $grp_leader_name;
    public $group_leader_addr1;
    public $group_leader_addr2;
    public $group_leader_addr3;
    public $group_leader_phone;

    protected function rules()
    {
        return [
            'team_mbr_name1' => 'required|string|max:255',
            'team_mbr_icno1' => 'required|string|size:12',
            'team_mbr_name2' => 'required|string|max:255',
            'team_mbr_icno2' => 'required|string|size:12',
            'team_mbr_name3' => 'required|string|max:255',
            'team_mbr_icno3' => 'required|string|size:12',
            'team_mbr_name4' => 'required|string|max:255',
            'team_mbr_icno4' => 'required|string|size:12',
            'duration_intro_team' => 'required',
            'discussion_date' => 'required|date',
            'supported_fin_amount' => 'nullable|numeric',
            'grp_leader_name' => 'nullable|string|max:255',
            'group_leader_addr1' => 'nullable|string|max:255',
            'group_leader_addr2' => 'nullable|string|max:255',
            'group_leader_addr3' => 'nullable|string|max:255',
            'group_leader_phone' => 'nullable|string|max:11',
        ];
    }

    protected function messages()
    {
        return [
            'team_mbr_name1.required' => 'Sila masukkan nama ahli kumpulan 1',
            'team_mbr_icno1.required' => 'Sila masukkan no KP ahli kumpulan 1',
            'team_mbr_icno1.size' => 'No KP ahli kumpulan 1 mestilah 12 digit',
            
            'team_mbr_name2.required' => 'Sila masukkan nama ahli kumpulan 2',
            'team_mbr_icno2.required' => 'Sila masukkan no KP ahli kumpulan 2',
            'team_mbr_icno2.size' => 'No KP ahli kumpulan 2 mestilah 12 digit',
            
            'team_mbr_name3.required' => 'Sila masukkan nama ahli kumpulan 3',
            'team_mbr_icno3.required' => 'Sila masukkan no KP ahli kumpulan 3',
            'team_mbr_icno3.size' => 'No KP ahli kumpulan 3 mestilah 12 digit',
            
            'team_mbr_name4.required' => 'Sila masukkan nama ahli kumpulan 4',
            'team_mbr_icno4.required' => 'Sila masukkan no KP ahli kumpulan 4',
            'team_mbr_icno4.size' => 'No KP ahli kumpulan 4 mestilah 12 digit',
            
            'duration_intro_team.required' => 'Sila pilih tempoh perkenalan',
            'discussion_date.required' => 'Sila pilih tarikh perbincangan',
            'discussion_date.date' => 'Tarikh perbincangan tidak sah',
            'supported_fin_amount.numeric' => 'Jumlah pembiayaan mestilah dalam bentuk nombor',
            'group_leader_phone.max' => 'No telefon tidak boleh melebihi 11 digit',
        ];
    }
}