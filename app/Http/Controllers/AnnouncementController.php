<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
// use App\Http\Requests\CreateAnnouncementRequest;


class AnnouncementController extends Controller
{
    public function listAnnouncement() 
    {
        $user = Auth::user();

        $announcements = Announcement::all();

        return view('announcement.list_announcement', ['announcements' => $announcements, 'user' => $user]);
    }

    public function createAnnouncement(Request $request) 
    {
        $announcements = Announcement::all();

        return view('users.create_announcement', ['announcements' => $announcements]);
    }

    public function storeAnnouncement(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $newAnnouncement = new Announcement;
        $newAnnouncement->title = $request->title;
        $newAnnouncement->content = $request->content;
        $newAnnouncement->price = $request->price;
        $newAnnouncement->user_id = $user->id;
        $newAnnouncement->save();
        return redirect()->route('list.announcement');
    }

    public function deleteAnnouncement($id): RedirectResponse
    {
        Announcement::where('id', $id)->delete();
        return redirect()->route('list.announcement');
    }

    public function showAnnouncement($id)
    {
        $announcement = Announcement::findOrFail($id);

        $user = Auth::user();

        return view('announcement.announcement', ['announcement' => $announcement, 'user' => $user]);
    }

    public function editAnnouncement($id)
    {
        $announcement = Announcement::findOrFail($id);

        $user = Auth::user();

        return view('announcement.edit_announcement', ['announcement' => $announcement, 'user' => $user]);
    }

    
    public function updateAnnouncement(Request $request, $id)
    {
        Announcement::findOrFail($id)
        ->update(['title' => $request->title, 'content' => $request->content, 'price' => $request->price]);

        return redirect()->back();
    }
}
