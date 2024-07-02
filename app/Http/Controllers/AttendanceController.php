<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Event;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::orderBy('id')->get();
        return view('attendance.index', ['attendances' => $attendances]);
    }

    public function create()
    {
        $events = Event::list(); 
        $students = Student::list(); 
        return view('attendance.create', compact('events', 'students'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|numeric',
            'student_id' => 'required|numeric',
            'status' => 'required|string',
        ]);

        Attendance::create($request->only('event_id', 'student_id', 'status'));

        return redirect('/attendance')->with('message', 'A new attendance has been added');
    }

    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $events = Event::list();
        $students = Student::list();

        return view('attendance.edit', compact('attendance', 'events', 'students'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'event_id' => 'required|numeric',
            'student_id' => 'required|numeric',
            'status' => 'required',
        ]);

        $attendance->update($request->all());
        return redirect('/attendance')->with('message', $attendance->student->full_name . " has been updated successfully");
    }

    public function delete(Attendance $attendance)
    {
        $attendance->delete();
        return redirect('/attendance')->with('message', $attendance->student->full_name . " has been deleted successfully");
    }



    public function exportCsv()
    {
        $attendances = Attendance::all();
        $filename = 'attendances.csv';
        $handle = fopen($filename, 'w+');
        fputcsv($handle, ['ID', 'Event Title', 'Student Full Name', 'Status']);
    
        foreach ($attendances as $attendance) {
            fputcsv($handle, [
                $attendance->id,
                $attendance->event->title,
                $attendance->student->full_name,
                $attendance->status
            ]);
        }
    
        fclose($handle);
    
        $headers = [
            'Content-Type' => 'text/csv',
        ];
    
        return response()->download($filename, $filename, $headers)->deleteFileAfterSend(true);
    }
    
    public function importCsvForm()
    {
        // Return a view with a form to upload a CSV file
        return view('attendance.import');
    }

    public function importCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);
    
        $file = $request->file('csv_file');
    
        if ($file) {
            $csvData = file_get_contents($file);
            $rows = array_map('str_getcsv', explode("\n", $csvData));
            $header = array_shift($rows);
    
            foreach ($rows as $row) {
                if (count($row) == count($header)) {
                    $row = array_combine($header, $row);
    
                    // Assuming Event and Student models exist and relationships are set up
                    $event = Event::firstOrCreate([
                        'title' => $row['Event Title']
                    ]);
    
                    // Assuming full_name is a single string and not split into parts
                    $student = Student::firstOrCreate([
                        'full_name' => $row['Student Full Name'],
                    ]);
    
                    Attendance::create([
                        'event_id' => $event->id,
                        'student_id' => $student->id,
                        'status' => $row['Status'],
                    ]);
                }
            }
        }
    
        return redirect('/attendance')->with('message', 'Attendances imported successfully.');
    }
    
}
