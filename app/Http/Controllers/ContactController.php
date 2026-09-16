<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Vercel's filesystem is read-only (except /tmp, which is wiped between
        // invocations), so a SQLite write here would fail in production if no
        // external database is configured. We swallow the error so a missing/
        // unreachable DB never breaks the contact form for the visitor.
        try {
            ContactMessage::create($validated);
        } catch (\Throwable $e) {
            Log::warning('No se pudo guardar el mensaje de contacto en la base de datos.', [
                'error' => $e->getMessage(),
            ]);
        }

        // Primary delivery channel: email. With MAIL_MAILER=log (the default),
        // this just writes to the log instead of failing, so the form still
        // "works" even before you configure a real mail provider.
        try {
            Mail::raw(
                "Nombre: {$validated['name']}\nEmail: {$validated['email']}\n\nMensaje:\n{$validated['message']}",
                function ($message) use ($validated) {
                    $message->to(config('mail.admin_address'))
                        ->subject('Nuevo mensaje de contacto - TechGrowth')
                        ->replyTo($validated['email'], $validated['name']);
                }
            );
        } catch (\Throwable $e) {
            Log::error('No se pudo enviar el email de contacto.', [
                'error' => $e->getMessage(),
            ]);
        }

        return Redirect::to('/')->with('success', 'Tu mensaje ha sido enviado correctamente.');
    }
}
