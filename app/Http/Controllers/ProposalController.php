<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    // Menampilkan form untuk membuat proposal
    public function create()
    {
        return view('proposals.create');
    }

    // Menyimpan proposal baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Menyimpan proposal dengan status draft
        $proposal = new Proposal();
        $proposal->user_id = auth()->id();
        $proposal->title = $request->title;
        $proposal->description = $request->description;
        $proposal->status = 'draft';
        $proposal->save();

        return redirect()->route('proposals.index')->with('success', 'Proposal created successfully!');
    }

    // Menampilkan daftar proposal
    public function index()
    {
        $proposals = Proposal::where('user_id', auth()->id())->get();
        return view('proposals.index', compact('proposals'));
    }

    // Menampilkan status proposal
    public function show($id)
    {
        $proposal = Proposal::findOrFail($id);
        return view('proposals.show', compact('proposal'));
    }

    // Mengajukan proposal
    public function submit($id)
    {
        $proposal = Proposal::findOrFail($id);
        
        // Cek apakah proposal sudah diajukan
        if ($proposal->status != 'draft') {
            return redirect()->route('proposals.index')->with('error', 'Proposal sudah diajukan atau tidak dapat diajukan lagi.');
        }

        $proposal->status = 'submitted';
        $proposal->save();

        return redirect()->route('proposals.index')->with('success', 'Proposal submitted successfully!');
    }

    // Method lainnya seperti edit, update, destroy, dll.
    // Menampilkan form untuk mengedit proposal
    public function edit($id)
    {
        $proposal = Proposal::findOrFail($id);
        return view('proposals.edit', compact('proposal'));
    }

    // Mengupdate proposal setelah diedit
    public function update(Request $request, $id)
    {
        $proposal = Proposal::findOrFail($id);

        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Update proposal
        $proposal->title = $request->title;
        $proposal->description = $request->description;
        $proposal->save();

        return redirect()->route('proposals.index')->with('success', 'Proposal updated successfully!');
    }

    // Menghapus proposal
    public function destroy($id)
    {
        $proposal = Proposal::findOrFail($id);
        
        // Menghapus proposal
        $proposal->delete();

        return redirect()->route('proposals.index')->with('success', 'Proposal deleted successfully!');
    }


}
