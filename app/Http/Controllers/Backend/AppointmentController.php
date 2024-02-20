<?php

namespace App\Http\Controllers\Backend;

use App\Models\Appointment;
use Illuminate\Http\Request;

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
            'animal_id' => 'required|exists:animals,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Appointment::create($request->all());

        return redirect()->route('backend.appointments.index')->with('success', 'Agendamento criado com sucesso.');
    }

    public function getAppointmentsJson()
    {
        $appointments = Appointment::all();
        $events = [];

        foreach ($appointments as $appointment) {
            $events[] = [
                'title' => $appointment->type,
                'start' => $appointment->date->format('Y-m-d\TH:i:s'),
                'end' => $appointment->date->format('Y-m-d\TH:i:s'),
                // Outros campos do evento, se necessário
            ];
        }

        return response()->json($events);
    }
}
