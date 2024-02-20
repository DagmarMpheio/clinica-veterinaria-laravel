<?php

namespace App\Http\Controllers\Backend;

use App\Mail\AlertAppointmentEmail;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends AdminController
{
    public function index()
    {
        $appointments = Appointment::simplePaginate(5);
        $appointmentsCount = Appointment::count();

        return view('backend.appointments.index', compact('appointments', 'appointmentsCount'));
    }

    public function create()
    {
        $appointment = new Appointment();
        return view('backend.appointments.create', compact('appointment'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'animal_id' => 'required|exists:animals,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $appointment = Appointment::create($request->all());

        //Enviar email com os dados so agendamento
        Mail::to(Auth::user()->email)->send(new AlertAppointmentEmail($appointment));

        return redirect()->route('backend.appointments.index')->with('success', 'Agendamento criado com sucesso.');
    }

    public function getAppointmentsJson()
    {
        $appointments = Appointment::all();
        $events = [];

        foreach ($appointments as $appointment) {
            $endDateTime = $appointment->date->copy()->endOfDay();

            $events[] = [
                'title' => $appointment->type,
                'start' => $appointment->date->format('Y-m-d\TH:i:s'),
                'end' => $endDateTime->format('Y-m-d\TH:i:s'),
                // Outros campos do evento, se necessário
            ];
        }

        return response()->json($events);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {

        //apagar o agendamento
        $appointment->delete();

        return redirect("/backend/appointments")->with("message", "Agendamento foi excluído com succeso!");
    }
}
