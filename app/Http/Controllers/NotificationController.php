<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function getNotifications() {
        $notifications = Notification::where('user_id', Auth::id())->get();
        return response()->json($notifications);
    }

    public function sendNotification(Request $request) {
        $title = $request->input('title');
        $text = $request->input('text');
        Notification::create([
            'user_id' => Auth::id(),
            'title' => $title,
            'text' => $text,
        ]);
        return response()->json(['message' => 'Notification sent']);
    }

    public function sendNotificationTo($title, $text, $user) {
        Notification::query()->create([
            'user_id' => $user,
            'title' => $title,
            'text' => $text,
            'read' => false
        ]);

//        Notification::create([
//            'user_id' => $user->id,
//            'title' => 'Welcome to our platform',
//            'text' => 'Thank you for joining our platform. We hope you enjoy your experience.',
//
//        ]);

        return response()->json(['message' => 'Notification sent']);
    }

    public function toggleReadNotification(Request $request) {
        $notifId = $request->input('notification_id');
        $notification = Notification::find($notifId);
        if ($notification == null) {
            return response()->json([
                'status' => 'server error',
                'product' => $notifId
            ]);
        }
        $notification->read = !$notification->read;
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
