<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class BeehiveCallAnswer implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $CallFrom;
    public $CallTo;
    public $AnswerSDP;
    public $Avatar;
    public function __construct(Request $request)
    {
        $this->CallFrom = $request->CallFrom;
        $this->CallTo = $request->CallTo;
        $this->AnswerSDP = $request->AnswerSDP;
        $this->Avatar = $request->Avatar;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('BeehiveCallAnswer'.$this->CallTo);
    }
}
