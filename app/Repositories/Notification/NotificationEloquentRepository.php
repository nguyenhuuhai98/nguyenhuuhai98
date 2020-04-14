<?php
namespace App\Repositories\Notification;

use App\Repositories\EloquentRepository;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class NotificationEloquentRepository extends EloquentRepository implements NotificationRepositoryInterface
{

    public function getModel()
    {
        return Notification::class;
    }

    public function readAt($id)
    {
        $noti = $this->find($id);
        $noti->read_at = Carbon::now();
    }

    public function unRead($id)
    {
        $noti = $this->find($id);
        $noti->read_at = '';
    }
}
