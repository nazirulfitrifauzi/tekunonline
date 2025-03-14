<?php

namespace App\Console\Commands;

use App\Mail\TestEmail;
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
        $applications = ApplnStatus::where('appln_status', 'F')
            ->with('user')
            ->get();

        foreach ($applications as $application) {
            try {
                DB::beginTransaction();

                // Send email notification
                Mail::to($application->user->email)
                    ->send(new TestEmail());

                // Update status to 'D' after successful email sending
                $application->update(['appln_status' => 'D']);

                DB::commit();
                $this->info("Notification sent and status updated for application ID: {$application->id}");
            } catch (\Exception $e) {
                DB::rollBack();
                $this->error("Error processing application ID {$application->id}: {$e->getMessage()}");
            }
        }
    }
}