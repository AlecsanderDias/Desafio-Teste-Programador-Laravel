<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Attributes\Depends;
use Tests\TestCase;

// php artisan test --filter=UsuarioControllerTest
class UsuarioControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // php artisan test --filter=UsuarioControllerTest::test_principal
    public function test_principal()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
    }

    // php artisan test --filter=UsuarioControllerTest::test_cadastro
    public function test_cadastro() {
        $response = $this->get('/cadastro');
        $response->assertStatus(200);
    }

    // php artisan test --filter=UsuarioControllerTest::test_cadastrar
    public function test_cadastrar() {
        $formData = [
            'name' => 'testando',
            'email' => 'test@test.test',
            'password' => '12345',
            'password_confirmation' => '12345'];
        $response = $this->post('/cadastrar', $formData);
        $response->assertStatus(201);
    }

    // php artisan test --filter=UsuarioControllerTest::test_login
    public function test_login() {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    // php artisan test --filter=UsuarioControllerTest::test_logar_success
    public function test_logar_success() {
        $formData = ['email' => 'teste@teste.teste', 'password' => '12345'];
        $response = $this->post('/logar', $formData);
        $response->assertRedirect('/usuario');
    }

    // php artisan test --filter=UsuarioControllerTest::test_logar_fail
    public function test_logar_fail() {
        $formData = ['email' => 'test@test.test', 'password' => '12345678'];
        $response = $this->post('/logar', $formData);
        $response->assertStatus(200);
    }

    // php artisan test --filter=UsuarioControllerTest::test_usuario_index
    public function test_usuario_index_not_admin() {
        $response = $this->get('/usuario');
        $response->assertStatus(302);
    }
}
