<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

# php artisan test --filter=UsuarioControllerTest
class UsuarioControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    # php artisan test --filter=UsuarioControllerTest::test_principal
    public function test_principal()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
    }

    # php artisan test --filter=UsuarioControllerTest::test_cadastrar
    public function test_cadastrar() {
        $response = $this->get('/cadastro');
        $response->assertStatus(200);
    }

    # php artisan test --filter=UsuarioControllerTest::test_logar
    public function test_logar() {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }
}
