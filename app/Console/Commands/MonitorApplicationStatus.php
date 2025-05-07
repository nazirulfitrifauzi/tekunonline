<?php

namespace App\Console\Commands;

use App\Mail\EmelTerima;
use App\Mail\EmelTolak;
use App\Models\ApplnStatus;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MonitorApplicationStatus extends Command
{
    protected $signature = 'app:monitor-status';
    protected $description = 'Monitor application status and send notifications';

    public function handle()
    {
        $applications = ApplnStatus::whereIn('appln_status_fas', ['10', '20']) // Hanya ambil status 10 & 20
            ->whereNull('email_sent') // Pastikan hanya yang belum dihantar
            ->with('user')
            ->get();

        foreach ($applications as $application) {
            try {
                DB::beginTransaction();

                if ($application->appln_status_fas == '10') {
                    // Data untuk e-mel berjaya
                    $data = [
                        'cust_name' => $application->cust_name,
                        'cust_icno' => $application->cust_icno,
                        'appln_ref_no' => $application->appln_ref_no,
                    ];

                    Mail::to($application->user->email)
                        ->send(new EmelTerima($data));

                } elseif ($application->appln_status_fas == '20') {
                    // Data untuk e-mel gagal (dengan tambahan 'reason')
                    $data = [
                        'cust_name' => $application->cust_name,
                        'cust_icno' => $application->cust_icno,
                        'appln_ref_no' => $application->appln_ref_no,
                        'appln_result1_rem' => $application->appln_result1_rem,
                    ];

                    Mail::to($application->user->email)
                        ->send(new EmelTolak($data));
                }

                // Update status email_sent selepas berjaya hantar e-mel
                $application->update(['email_sent' => '1']);

                DB::commit();
                $this->info("Notification sent and status updated for application ID: {$application->id}");
            } catch (\Exception $e) {
                DB::rollBack();
                $this->error("Error processing application ID {$application->id}: {$e->getMessage()}");
            }
        }
    }
}
