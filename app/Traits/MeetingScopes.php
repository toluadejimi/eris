<?php
namespace App\Traits;

use App\Models\Meeting;
use App\Models\MeetingSetting;
use Illuminate\Support\Arr;

trait MeetingScopes{
    public function getMeetingSetting()
    {
        $data['meeting_setting'] = MeetingSetting::Active()->get();
        if(isset($data['meeting_setting']) && $data['meeting_setting']->count() > 0){
            $d = json_decode($data['meeting_setting'],true);
            $manageSetting = Arr::pluck($d, 'config', 'identity');
            return $manageSetting;
        }
    }


}