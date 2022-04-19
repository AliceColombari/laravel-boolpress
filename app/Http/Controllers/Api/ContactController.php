<?php

namespace App\Http\Controllers\Api;

use App\Lead;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    // creo funzione di store per richiesta dati

    public function store(Request $request) {
        $data = $request->all();

        // richiesto validazione campi data tramite validator
        // validiamo i dati "a mano" per poter gestire la risposta
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        if($validator->fails()) {
            // condizione valiodazione data
            return response()->json([
                'success' => false,
                // resituisce errori della validazione e li ritorna tutti
                'errors' => $validator->errors()
            ]);
        } else {
            // se validazione invece va a buon fine che succede?
            // salviamo a db i dati inseriti nel form di contatto
            $lead = new Lead();
            $lead->fill($data);
            $lead->save();

            // inviamo la mail all'admin del sito, passando il nuovo oggetto Lead
            // ora invio un'email all'amministratore - hai ricevuto un nuovo contatto
            // invio email da un controller
            // to - indirizzo email a cui vopglio mandare email
            Mail::to('support@boolpress.com')->send(new NewContact($lead));


            // se tutto ok ritorno una json con success true 
            return response()->json([
                'success' => true
            ]);
        }
           
        
    }
}