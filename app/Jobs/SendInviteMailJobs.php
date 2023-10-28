<?php

namespace App\Jobs;

use App\Mail\InviteCommunity;
use App\Mail\JoinCommunityMail;
use App\Models\CommunityUser;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendInviteMailJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $invite;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($invite)
    {
        $this->invite = $invite;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = User::query()->firstWhere('email',$this->invite->email) ?? null;

        if ($user){
            Mail::to($this->invite->email)->send(new JoinCommunityMail($this->invite));
            CommunityUser::create(['community_id' => $this->invite->community_id, 'user_id' => $user->id]);
        }else{
            Mail::to($this->invite->email)->send(new InviteCommunity($this->invite));
        }
    }
}
