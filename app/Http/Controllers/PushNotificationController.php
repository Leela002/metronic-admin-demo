<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\PushNotification;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PushNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $notification = PushNotification::latest()->first();
        return view('pages.setting.push_notification.index', compact('notification'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'firebase_cloud_messaging_key' => 'required',
            'firebase_api_key' => 'required',
        ]);

        // Create a new push notification setting
        $notification = new PushNotification();
        $notification->firebase_cloud_messaging_key = $validatedData['firebase_cloud_messaging_key'];
        $notification->firebase_api_key = $validatedData['firebase_api_key'];
        $notification->save();

        // Redirect to the index page with a success message
        return redirect()->route('push_notification.index')->with('success', 'Push notification data save successfully!');
    }


}
