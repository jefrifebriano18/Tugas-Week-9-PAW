<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleAccessTest extends TestCase
{
    use RefreshDatabase;

    private function akun(string $role): User
    {
        $u = new User(['name' => $role, 'email' => "$role@test.id", 'password' => 'password']);
        $u->forceFill(['role' => $role])->save();
        return $u;
    }

    public function test_admin_boleh_admin_dan_kelola_materi(): void
    {
        $a = $this->akun('admin');
        $this->actingAs($a)->get('/admin')->assertOk();
        $this->actingAs($a)->get('/kelola-materi')->assertOk();
    }

    public function test_dosen_boleh_dosen_tapi_ditolak_admin(): void
    {
        $d = $this->akun('dosen');
        $this->actingAs($d)->get('/dosen')->assertOk();
        $this->actingAs($d)->get('/admin')->assertStatus(403);
    }

    public function test_mahasiswa_boleh_mahasiswa_tapi_ditolak_kelola_materi(): void
    {
        $m = $this->akun('mahasiswa');
        $this->actingAs($m)->get('/mahasiswa')->assertOk();
        $this->actingAs($m)->get('/kelola-materi')->assertStatus(403);
    }

    public function test_guest_dialihkan_ke_login(): void
    {
        $this->get('/admin')->assertRedirect('/login');
    }

    public function test_nilai_pribadi_admin_dan_mahasiswa_boleh_dosen_ditolak(): void
    {
        $this->actingAs($this->akun('admin'))->get('/nilai-saya')->assertOk();
        $this->actingAs($this->akun('mahasiswa'))->get('/nilai-saya')->assertOk();
        $this->actingAs($this->akun('dosen'))->get('/nilai-saya')->assertStatus(403);
    }

    public function test_dosen_boleh_kelola_nilai_mahasiswa_ditolak(): void
    {
        $this->actingAs($this->akun('dosen'))->get('/kelola-nilai')->assertOk();
        $this->actingAs($this->akun('mahasiswa'))->get('/kelola-nilai')->assertStatus(403);
    }
}