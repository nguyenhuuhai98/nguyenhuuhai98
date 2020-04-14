<?php
namespace App\Repositories\Notification;

interface NotificationRepositoryInterface
{
    public function getModel();

    public function readAt($id);

    public function unRead($id);
}
