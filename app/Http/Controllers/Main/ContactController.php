<?php

namespace App\Http\Controllers\Main;

use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\User\ContactMail;
use App\Http\Requests\Main\ContactRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function sendMail(ContactRequest $request, $id)
    {
        try {
            $data = $request->validated();

            $user = User::findOrFail($id);
            Mail::to($user->email)->send(new ContactMail($data));

            // Устанавливаем флеш-сообщение об успешной отправке
            Session::flash('success', 'Nachricht gesendet!');

            return redirect()->back();
        } catch (\Exception $e) {
            Log::error('Error sending mail: ' . $e->getMessage());
            Log::error('Submitted data: ', $request->all());

            // Устанавливаем флеш-сообщение об ошибке отправки
            Session::flash('error', 'Fehler beim Senden der Nachricht.');

            return redirect()->back()->withErrors(['msg' => 'Fehler beim Senden der Nachricht.']);
        }
    }
}
