<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\PusherBroadcast;
use App\Models\Chat;
use App\Models\User;

class chatController extends Controller
{
    public function index() {
        $users = User::all();
        return view('chat', compact('users'));
    }
    
    // public function sendMessage(Request $request)
    // {
    //     // Simpan pesan dalam database
    //     $message = Chat::create([
    //         'sender_id' => auth()->user()->id,
    //         'receiver_id' => $request->receiver_id,
    //         'message' => $request->message,
    //     ]);
    //     //event(new PusherBroadcast($request->get('message')))->toOthers();
    //     //broadcast(new PusherBroadcast($message));
    //     broadcast(new PusherBroadcast($request->get('message')))->toOthers();
    //     return response()->json(['status' => 'Message sent successfully']);
    // }

    public function sendMessage(Request $request, $userId) {
        $message = new Chat([
            // 'sender_id' => auth()->user()->id,
            // 'receiver_id' => $request->$otherUserId,
            // 'message' => $request->input('chatForm')
            'sender_id' => auth::user()->id,
            'receiver_id' => $userId,
            'message' => $request->input('message')
        ]);
        $message->save();
        return redirect()->route('chat.history', ['userId'=>$userId])->with('success', 'Message sent successfully.');
    }

    public function sendOfferMessage(Request $request, $userId) {
        $pesan = $request->input('typeNumber');
        $message = new Chat([
            'sender_id' => auth::user()->id,
            'receiver_id' => $userId,
            'message' => 'Apakah produk ' . $request->product . ' bisa ditawar dengan harga Rp. ' . number_format( $pesan , 0, ",", ".") . '?'
        ]);
        $message->save();
        return redirect()->route('chat.history', ['userId'=>$userId])->with('success', 'Message sent successfully.');
    }

    public function showChatHistory($otherUserId)
    { 
        $users = User::all();
        $seller = User::find($otherUserId);
        $chats = Chat::where(function ($query) use ($otherUserId) {
            $query->where('sender_id', Auth::id())->where('receiver_id', $otherUserId);
        })->orWhere(function ($query) use ($otherUserId) {
            $query->where('sender_id', $otherUserId)->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();
        $allChat = Chat::all();
        return view('chat.history', compact('chats', 'otherUserId', 'users', 'seller', 'allChat'));
    }
}
