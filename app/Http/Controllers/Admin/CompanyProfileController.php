<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanyProfileController extends Controller
{
    public function edit()
    {
        $profile = CompanyProfile::firstOrCreate([
            'id' => 1,
        ], [
            'nama_perusahaan' => 'PT Bank Central Asia Tbk',
            'tagline' => 'Senantiasa di Sisi Anda',
            'deskripsi' => 'BCA merupakan bank swasta nasional yang menyediakan layanan perbankan dan solusi finansial untuk masyarakat Indonesia.',
            'visi' => 'Menjadi bank pilihan utama andalan masyarakat.',
            'misi' => 'Membangun institusi yang unggul di bidang penyelesaian pembayaran dan solusi keuangan.\nMemahami beragam kebutuhan nasabah.\nMeningkatkan nilai bagi stakeholder.',
            'alamat' => 'Menara BCA, Grand Indonesia, Jakarta',
            'telepon' => '1500888',
            'email' => 'halobca@bca.co.id',
        ]);

        return view('admin.company.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = CompanyProfile::firstOrNew(['id' => 1]);

        $validated = $request->validate([
            'nama_perusahaan' => ['required', 'string', 'max:180'],
            'tagline' => ['nullable', 'string', 'max:180'],
            'deskripsi' => ['required', 'string'],
            'visi' => ['nullable', 'string'],
            'misi' => ['nullable', 'string'],
            'alamat' => ['nullable', 'string'],
            'telepon' => ['nullable', 'string', 'max:50'],
            'email' => ['nullable', 'email', 'max:180'],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
        ]);

        if ($request->hasFile('logo')) {
            $this->deletePublicFile($profile->logo);
            $validated['logo'] = $this->uploadImage($request, 'logo', 'uploads/company');
        }

        $profile->update($validated);

        return redirect()->route('admin.company.edit')->with('success', 'Profil perusahaan berhasil diperbarui.');
    }

    private function uploadImage(Request $request, string $field, string $folder): ?string
    {
        $file = $request->file($field);
        $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($folder), $filename);

        return $folder . '/' . $filename;
    }

    private function deletePublicFile(?string $path): void
    {
        if ($path && File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
