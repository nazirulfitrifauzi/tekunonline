<?php

namespace App\Livewire;

use App\Models\ApplnStatus;
use App\Models\MaklumatPeribadi as ModelsMaklumatPeribadi;
use App\Models\MaklumatPinjaman as ModelsMaklumatPinjaman;
use App\Models\MaklumatPerniagaan as ModelsMaklumatPerniagaan;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Traits\MaklumatPeribadiValidation;
use Carbon\Carbon;
use DateTime;
use WireUi\Traits\WireUiActions;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;
    use MaklumatPeribadiValidation, WireUiActions;

    public $disableButton = false;
    public $user;

    public function mount()
    {
        //dd($this->tekun_branch,$this->tekun_state);
        $this->user = Auth::user();        
       
        // Semak jika terdapat permohonan dengan appln_status_fas = 1 atau NULL
        $this->disableButton = ApplnStatus::where('user_id', $this->user->id)
                            ->whereIn('appln_status',array('S','P'))
                            ->where(function ($query) {
                                $query->where('appln_status_fas',1)
                                      ->orWhereNull('appln_status_fas');
                            })
                            ->first();
        //dd($this->disableButton);
    }

    function calculateAge($birthdate) {
        // Create DateTime objects for current date and birthdate
        $today = new DateTime('now');
        $birthdateObj = new DateTime($birthdate);
        
        // Calculate the difference between dates
        $age = $today->diff($birthdateObj);
        
        // Return the years as an integer
        return (int)$age->y;
    }

    // public function save(){
        
    //     //1)Insert appln_status
    //     $applnStatus = ApplnStatus::where('appln_status','<>','P')->updateOrCreate(
    //         ['user_id' => Auth::id(),
    //         'appln_status' => 'P',
    //         'cust_icno' => $this->user->ic_no,
    //         'cust_name' => $this->user->name,
    //         'created_at' => now(),
    //         'updated_at' => now(),
    //         ]
    //     );

    //     // Extract year, month, and day from IC number
    //     $year = substr($this->user->ic_no, 0, 2);
    //     $month = substr($this->user->ic_no, 2, 2);
    //     $day = substr($this->user->ic_no, 4, 2);

    //     // Determine full year (handle generations)
    //     $today = new DateTime('now');
    //     $currentYear = now()->format('y');
    //     $fullYear = $year > $currentYear ? "19$year" : "20$year";

    //     // Determine gender based on last digit
    //     $genderDigit = intval(substr($this->user->ic_no, -1));
    //     $gender = $genderDigit % 2 === 1 ? 'LELAKI' : 'PEREMPUAN';

    //     // Create birthdate
    //     $birthdate = Carbon::createFromFormat('d-m-Y', "$day-$month-$fullYear");
    //     $formattedBirthdate = $birthdate->format('Y-m-d');
        
    //    // Calculate the difference between dates
    //    $age = $this->calculateAge($formattedBirthdate);

    //     // Update or create personal information record
    //     return ModelsMaklumatPeribadi::updateOrCreate(
    //         ['appln_id' => $applnStatus->id],
    //         [
    //             'ic_no' => $this->user->ic_no,
    //             'gender' => $gender,
    //             'birthdate' => $formattedBirthdate,
    //             'age' => $age,
    //         ]
    //     );

    //     //3) $maklumatPinjaman
    //     $maklumatPinjaman = ModelsMaklumatPinjaman::updateOrCreate(
    //         ['appln_id' => $applnStatus->id]
    //     );

    //     //4) $maklumatPerniagaan
    //     $maklumatPerniagaan = ModelsMaklumatPerniagaan::updateOrCreate(
    //         ['appln_id' => $applnStatus->id]
    //     );

    //     return redirect()->route('home', ['appln_id' => $applnStatus->id]);

    // }

    public function save(){
        //1)Insert appln_status
        $applnStatus = ApplnStatus::where('appln_status','<>','P')->updateOrCreate(
            ['user_id' => Auth::id(),
            'appln_status' => 'P',
            'cust_icno' => $this->user->ic_no,
            'cust_name' => $this->user->name,
            'created_at' => now(),
            'updated_at' => now(),
            ]
        );
    
        // Extract year, month, and day from IC number
        $year = substr($this->user->ic_no, 0, 2);
        $month = substr($this->user->ic_no, 2, 2);
        $day = substr($this->user->ic_no, 4, 2);
    
        // Determine full year (handle generations)
        $today = new DateTime('now');
        $currentYear = now()->format('y');
        $fullYear = $year > $currentYear ? "19$year" : "20$year";
    
        // Determine gender based on last digit
        $genderDigit = intval(substr($this->user->ic_no, -1));
        $gender = $genderDigit % 2 === 1 ? 'LELAKI' : 'PEREMPUAN';
    
        // Create birthdate
        $birthdate = Carbon::createFromFormat('d-m-Y', "$day-$month-$fullYear");
        $formattedBirthdate = $birthdate->format('Y-m-d');
        
        // Calculate the difference between dates
        $age = $this->calculateAge($formattedBirthdate);
    
        // Update or create personal information record
        $maklumatPeribadi = ModelsMaklumatPeribadi::updateOrCreate(
            ['appln_id' => $applnStatus->id],
            [
                'ic_no' => $this->user->ic_no,
                'gender' => $gender,
                'birthdate' => $formattedBirthdate,
                'age' => $age,
            ]
        );
    
        //3) $maklumatPinjaman
        $maklumatPinjaman = ModelsMaklumatPinjaman::updateOrCreate(
            ['appln_id' => $applnStatus->id],
            [] // Add any default values if needed
        );
    
        //4) $maklumatPerniagaan
        $maklumatPerniagaan = ModelsMaklumatPerniagaan::updateOrCreate(
            ['appln_id' => $applnStatus->id],
            [] // Add any default values if needed
        );
    
        return redirect()->route('home', ['appln_id' => $applnStatus->id]);
    }

    public function render()
    {
        $user = Auth::user();
        $applnStatuses = ApplnStatus::where('user_id', $user->id)->orderBy('id','desc')->paginate(5);
        if ($applnStatuses == null) {
            $applnStatuses = new ApplnStatus;
        }

        return view('livewire.dashboard', [
            'user' => $user,
            'applnStatuses' => $applnStatuses,
            'disableButton' => $this->disableButton,
        ])->layout('layouts.app');
    }
}
