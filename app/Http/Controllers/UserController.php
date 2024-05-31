<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $users = User::where('role_id', 3)->latest();
            return DataTables::of($users)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="wrapper-action">
                        <a href="' . route('adminisrator.users.show', $item->id) . '">
                            Detail
                        </a>
                        <a href="' . route('adminisrator.users.edit', $item->id) . '">
                            Edit
                        </a>
                        <div>
                            <form action="' . route('adminisrator.users.destroy', $item->id) . '" method="post">
                            ' . method_field('delete') . csrf_field() . '
                            <button type="submit">Hapus</button>
                            </form>
                        </div>
                    </div>
                ';
                })
                ->make();
        }

        return view('components.pages.dashboard.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $divisions = Division::all();
        return view('components.pages.dashboard.users.create', compact('roles', 'divisions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_id' => ['required'],
            'division_id' => ['nullable'],
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:100', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:255'],
            'nik' => ['string', 'max:16', 'min:16', 'regex:/^[0-9]+$/']
        ]);

        $user = User::create([
            'role_id' => $request->role_id,
            'division_id' => $request->division_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'nik' => $request->nik
        ]);

        Alert::toast('Anda berhasil menambah petugas', 'success');
        return redirect()->route('adminisrator.users.officer.getDataOfficer');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('role')->where('id', $id)->firstOrFail();

        return view('components.pages.dashboard.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('components.pages.dashboard.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:100'],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:255'],
            'nik' => ['string', 'max:16', 'min:16', 'regex:/^[0-9]+$/']
        ]);

        try {

            DB::beginTransaction();

            $user = User::find($id);
            $user->update($request->all());

            DB::commit();

            Alert::toast('Sukses ubah data pelapor', 'success');
            return redirect()->route('adminisrator.users.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal mengubah data pelapor: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        Alert::toast('Berhasil menghapus data pelapor', 'success');
        return redirect()->route('adminisrator.users.index');
    }

    public function getDataOfficer()
    {
        if (request()->ajax()) {
            $users = User::with(['role'])->whereIn('role_id', [1, 2])->latest();
            return DataTables::of($users)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="wrapper-action">
                        <a href="' . route('adminisrator.users.officer.showOfficer', $item->id) . '">
                            Detail
                        </a>
                        <a href="' . route('adminisrator.users.officer.editOfficer', $item->id) . '">
                            Edit
                        </a>
                        <div>
                            <form action="' . route('adminisrator.users.destroy', $item->id) . '" method="post">
                            ' . method_field('delete') . csrf_field() . '
                            <button type="submit">Hapus</button>
                            </form>
                        </div>
                    </div>
                ';
                })
                ->make();
        }

        return view('components.pages.dashboard.users.officer-index');
    }

    public function showOfficer(string $id)
    {
        $user = User::with(['role', 'division'])->where('id', $id)->firstOrFail();

        return view('components.pages.dashboard.users.officer-show', compact('user'));
    }

    public function editOfficer(User $user)
    {
        $roles = Role::all();
        $divisions = Division::all();
        return view('components.pages.dashboard.users.officer-edit', compact('user', 'roles', 'divisions'));
    }

    public function updateOfficer(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'role_id' => ['required'],
            'division_id' => ['nullable'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:100'],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string', 'max:255'],
            'nik' => ['string', 'max:16', 'min:16', 'regex:/^[0-9]+$/']
        ]);

        try {
            DB::beginTransaction();

            $user = User::find($id);
            $user->update($request->all());

            DB::commit();

            Alert::toast('Sukses ubah data petugas', 'success');
            return redirect()->route('adminisrator.users.officer.getDataOfficer');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal mengubah data petugas: ' . $e->getMessage()]);
        }
    }
}
