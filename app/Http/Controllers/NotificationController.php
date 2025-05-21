<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function sendNotification(Request $request) {
        // TODO

    }

    public function readNotification(Request $request) {
        $notifId = $request->input('notification_id');
        $notification = Notification::find($notifId);
        if ($notification == null) {
            return response()->json([
                'status' => 'server error',
                'product' => $notifId
            ]);
        }
        $notification->read = true;
        $notification->save();
        return response()->json([
            'status' => 'ok',
            'product' => $notifId
        ]);
    }

    public function deleteNotification(Request $request) {
        $notifId = $request->input('notification_id');
        $notification = Notification::find($notifId);
        if ($notification == null) {
            return response()->json([
                'status' => 'server error',
                'product' => $notifId
            ]);
        }
        $notification->delete();        
        return response()->json([
            'status' => 'ok',
            'product' => $notifId
        ]);
    }
}