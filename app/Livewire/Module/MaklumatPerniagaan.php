<?php

namespace App\Livewire\Module;

use App\Models\ApplnStatus;
use Livewire\Component;
use App\Models\Negeri;
use Illuminate\Support\Facades\Auth;
use App\Models\JenisAktivitiBaru;
use App\Models\JenisPerniagaan;
use App\Models\MaklumatPerniagaan as ModelsMaklumatPerniagaan;
use App\Traits\MaklumatPerniagaanValidation;
use WireUi\Traits\WireUiActions;
use Livewire\Attributes\On; 

class MaklumatPerniagaan extends Component
{
    use MaklumatPerniagaanValidation, WireUiActions;

    public $sektorSelection = []; // Pastikan ia sentiasa array
    public $aktivitiSelection = [];
    public $negeriSelection = [];
    public $appln_id;

    protected $queryString = ['appln_id'];


    public function mount()
    {
        //dd($this->appln_id);
        // Load existing data if any

        $existingData = null; // Initialize to avoid undefined variable issues

        $applnStatus = ApplnStatus::where('id', $this->appln_id)->first();
        if ($applnStatus) {
            $existingData = ModelsMaklumatPerniagaan::where('appln_id', $applnStatus->id)->first();
        }        
    
        if ($existingData) {
            foreach ($existingData->toArray() as $key => $value) {
                if (property_exists($this, $key)) {
                    $this->$key = $value;
                }
            }
        }
    }

    protected function isMuslim()
    {
        $maklumatPeribadi = MaklumatPeribadi::where('appln_id', Auth::id())->first();
        return $maklumatPeribadi && $maklumatPeribadi->religion === 'ISLAM';
    }

    public function loadSektorSelection()
    {
        // Base query for all sectors
        $query = JenisPerniagaan::select(['idPerniagaan', 'jenisPerniagaan']);
        
        // If business_syariah is "0" (TIDAK), only show specific sectors
        if ($this->business_syariah == '0') {
            $query->where(function($q) {
                $q->where('sektor', 'Peruncitan')
                  ->orWhere('sektor', 'Perkhidmatan')
                  ->orWhere('sektor', 'Tani'); // This corresponds to PERTANIAN DAN PERUSAHAAN ASAS TANI
            });
        } else {
            // For "YA" (1) or not selected yet, show all sectors
            $query->where(function($q) {
                $q->where('lain', '1')
                  ->orWhere('sektor', 'Peruncitan')
                  ->orWhere('sektor', 'Perkhidmatan')
                  ->orWhere('sektor', 'Pembuatan')
                  ->orWhere('sektor', 'Kontraktor Kecil')
                  ->orWhere('sektor', 'Tani');
            });
        }
        
        $this->sektorSelection = $query->get();
        
        // Reset business_sector if it's not in the filtered list
        if ($this->business_sector && !collect($this->sektorSelection)->pluck('idPerniagaan')->contains($this->business_sector)) {
            $this->business_sector = '';
        }
    }

        // untuk campurkan dua variable jadi satu dan debug
    //yang last tu kena related dngn nama function
    public function updatedBusinessClosed()
    {
        $this->business_time = $this->business_open . ' hingga ' . $this->business_closed;
    }

    protected $listeners = ['run-validation' => 'validateSelf'];

    public function validateSelf()
    {
        $this->validate();
    }


    // #[On('tab-mp')]
    #[On('run-validation2')] 
    public function submit()
    {
        try {
                $this->validateSelf();
                //add if error on validate

                $formData = collect($this->all())
                    ->except(['sektorSelection', 'aktivitiSelection', 'negeriSelection'])
                    ->toArray();

                $formData['appln_id'] = $this->appln_id;

        
            $business_asset_value_num = floatval(str_replace(',', '', $this->business_asset_value));
            ModelsMaklumatPerniagaan::where('appln_id',$this->appln_id)->updateOrCreate(
                ['appln_id' => $this->appln_id],
                //$formData
                [
                    'business_syariah'           => $this->business_syariah,
                    'business_name'              => $this->business_name,
                    'license_type'               => $this->license_type,
                    'business_no'                => $this->business_no,
                    'business_sector'            => $this->business_sector,
                    'business_activity'          => $this->business_activity,
                    'sub_business_activity'      => $this->sub_business_activity,
                    'business_duration'          => $this->business_duration,
                    'business_duration_year'     => $this->business_duration_year,
                    'business_duration_month'    => $this->business_duration_month,
                    'business_address1'          => $this->business_address1,
                    'business_address2'          => $this->business_address2,
                    'business_postcode'          => $this->business_postcode,
                    'business_city'              => $this->business_city,
                    'business_state'             => $this->business_state,
                    'business_income'            => $this->business_income,
                    'business_phone'             => $this->business_phone,
                    'business_phone_hp'          => $this->business_phone_hp,
                    'business_premise'           => $this->business_premise,
                    'business_other_premise'     => $this->business_other_premise,
                    'business_ownership'         => $this->business_ownership,
                    'shareholder'                => $this->shareholder,
                    'business_modal'             => $this->business_modal,
                    'premise_loc_code'           => $this->premise_loc_code,
                    'buss_other_loc_premise'     => $this->buss_other_loc_premise,
                    'total_employees'            => $this->total_employees,
                    'register_date'              => $this->register_date,
                    'license_expired_date'       => $this->license_expired_date,
                    'membership_status'          => $this->membership_status,
                    'membership_assoc'           => $this->membership_assoc,
                    'business_open'              => $this->business_open,
                    'business_closed'            => $this->business_closed,
                    // New column added: business_time is a concatenation of business_open and business_closed
                    'business_time'              => $this->business_open . ' hingga ' . $this->business_closed,
                    'cert_recognition_flag'      => $this->cert_recognition_flag,
                    'cert_recognition_myipo_flag'=> $this->cert_recognition_myipo_flag,
                    'cert_recognition_gmp_flag'  => $this->cert_recognition_gmp_flag,
                    'cert_recognition_mesti_flag'=> $this->cert_recognition_mesti_flag,
                    'cert_recognition_haccp_flag'=> $this->cert_recognition_haccp_flag,
                    'cert_recognition_halal_flag'=> $this->cert_recognition_halal_flag,
                    'cert_recognition_iso_flag'  => $this->cert_recognition_iso_flag,
                    'business_asset_value'       => $business_asset_value_num,
                    'business_start_resources'   => $this->business_start_resources,
                    'course_name_attend'         => $this->course_name_attend,
                    'agency_name'                => $this->agency_name,
                    'course_name_attend2'        => $this->course_name_attend2,
                    'course_name_attend3'        => $this->course_name_attend3,
                    'previous_business'          => $this->previous_business,
                    'tot_partner'                => $this->tot_partner,
                    'partner_name'               => $this->partner_name,
                    'partner_ic'                 => $this->partner_ic,
                    'partner_address1'           => $this->partner_address1,
                    'partner_address2'           => $this->partner_address2,
                    'partner_postcode'           => $this->partner_postcode,
                    'partner_city'               => $this->partner_city,
                    'partner_state'              => $this->partner_state,
                    'partner_phone'              => $this->partner_phone,
                    'partner_phone_hp'           => $this->partner_phone_hp,
                    'partner_total_shares'       => $this->partner_total_shares,
                    'partner_roles'              => $this->partner_roles,
                    'partner2_name'              => $this->partner2_name,
                    'partner2_ic'                => $this->partner2_ic,
                    'partner2_address1'          => $this->partner2_address1,
                    'partner2_address2'          => $this->partner2_address2,
                    'partner2_postcode'          => $this->partner2_postcode,
                    'partner2_city'              => $this->partner2_city,
                    'partner2_state'             => $this->partner2_state,
                    'partner2_phone'             => $this->partner2_phone,
                    'partner2_phone_hp'          => $this->partner2_phone_hp,
                    'partner2_total_shares'      => $this->partner2_total_shares,
                    'partner2_roles'             => $this->partner2_roles,
                    'partner3_name'              => $this->partner3_name,
                    'partner3_ic'                => $this->partner3_ic,
                    'partner3_address1'          => $this->partner3_address1,
                    'partner3_address2'          => $this->partner3_address2,
                    'partner3_postcode'          => $this->partner3_postcode,
                    'partner3_city'              => $this->partner3_city,
                    'partner3_state'             => $this->partner3_state,
                    'partner3_phone'             => $this->partner3_phone,
                    'partner3_phone_hp'          => $this->partner3_phone_hp,
                    'partner3_total_shares'      => $this->partner3_total_shares,
                    'partner3_roles'             => $this->partner3_roles,
                    'partner4_name'              => $this->partner4_name,
                    'partner4_ic'                => $this->partner4_ic,
                    'partner4_address1'          => $this->partner4_address1,
                    'partner4_address2'          => $this->partner4_address2,
                    'partner4_postcode'          => $this->partner4_postcode,
                    'partner4_city'              => $this->partner4_city,
                    'partner4_state'             => $this->partner4_state,
                    'partner4_phone'             => $this->partner4_phone,
                    'partner4_phone_hp'          => $this->partner4_phone_hp,
                    'partner4_total_shares'      => $this->partner4_total_shares,
                    'partner4_roles'             => $this->partner4_roles,
                    'partner5_name'              => $this->partner5_name,
                    'partner5_ic'                => $this->partner5_ic,
                    'partner5_address1'          => $this->partner5_address1,
                    'partner5_address2'          => $this->partner5_address2,
                    'partner5_postcode'          => $this->partner5_postcode,
                    'partner5_city'              => $this->partner5_city,
                    'partner5_state'             => $this->partner5_state,
                    'partner5_phone'             => $this->partner5_phone,
                    'partner5_phone_hp'          => $this->partner5_phone_hp,
                    'partner5_total_shares'      => $this->partner5_total_shares,
                    'partner5_roles'             => $this->partner5_roles,
                    // If you have additional columns for branches and finance, add them similarly:
                    // 'buss_branch_tot'          => $this->buss_branch_tot,
                    // 'buss1_branch_loc'         => $this->buss1_branch_loc,
                    // ... (continue for all remaining columns)
                    'updated_at'                 => now(),
                    'created_at'                 => now(),
                ]
            );

        // Tambah logik untuk ssm/pbt
        $data['ssm_pbt'] = ($this->license_type === 'NO. SSM') ? 1 : 0;

        ApplnStatus::where('id', $this->appln_id)->update($data);
        

                //session()->flash('message', 'Maklumat perniagaan berjaya disimpan.');
                $this->dialog()->show([
                    'icon' => 'success',
                    'title' => 'Berjaya!',
                    'description' => 'Maklumat berjaya disimpan.',
                ]);

                $this->dispatch('saved');

                ApplnStatus::where('id', $this->appln_id)->update([
                    'tab2_maklumat_perniagaan' => 1,
                    'tab3_maklumat_perniagaan_2' => 0,
                ]);

                //return redirect()->route('home', ['appln_id' => $this->appln_id]);
                //return redirect()->refresh();
                //$this->dispatch('redirectToTab', 2);

                $this->dispatch('enableTab', 3)->to('home');
                $this->dispatch('redirectToTab', 3)->to('home');
                return redirect()->route('home', [
                    'appln_id' => $this->appln_id,
                    'activeTab' => 3,
                ]);
                
                
            } catch (\Illuminate\Validation\ValidationException $e) {
                $this->dialog()->show([
                    'icon' => 'error',
                    'title' => 'Sila Lengkapkan Dokumen!',
                    'description' => collect($e->validator->errors()->all())
                                    ->map(fn($msg, $i) => ($i + 1) . '. ' . $msg)
                                    ->implode("<br>"),
                ]);

                $this->validateSelf();
            }
    }
    
    protected function getFormData($applnId)
    {
        return array_merge(
            ['appln_id' => $applnId],
            collect($this->all())
                ->except(['sektorSelection', 'aktivitiSelection', 'negeriSelection'])
                ->toArray()
        );
    }
    
    public function render()
    {
        // Ambil senarai negeri
        $this->negeriSelection = Negeri::select(['kodnegeri', 'namanegeri'])
        ->where('kod', '!=', '1')
        ->orderBy('namanegeri', 'ASC')
        ->get();
    
        $this->sektorSelection = JenisPerniagaan:: select (['idPerniagaan', 'jenisPerniagaan'])
            ->where(function ($q) {
            $q->where('lain', '1')
            ->orWhere('sektor', 'Peruncitan')
            ->orWhere('sektor', 'Perkhidmatan')
            ->orWhere('sektor', 'Pembuatan')
            ->orWhere('sektor', 'Kontraktor Kecil')
            ->orWhere('sektor', 'Tani');
        })->get();


        $this->aktivitiSelection = JenisAktivitiBaru::where('idsektor', $this->business_sector)
        ->where('status', '=', '1')
        ->orderBy('Aktiviti', 'ASC')
        ->get();


        return view('livewire.module.maklumat-perniagaan');
    }
}
