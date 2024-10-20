<?php

namespace Tests\Feature;

use App\Models\Departamento;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DepartamentoControllerTest extends TestCase
{
    //use RefreshDatabase; // Restaura la base de datos entre pruebas

    /** @test */
    public function it_can_create_a_departamento()
    {
        $response = $this->postJson('/api/departamentos', [
            'nombre' => 'Nuevo Departamento',
            'pais_id' => 1,
        ]);

        $response->assertStatus(201)
                ->assertJsonStructure(['data' => ['id', 'nombre']]);

        $this->assertDatabaseHas('departamentos', ['nombre' => 'Nuevo Departamento']);
    }

    /** @test */
    public function it_can_update_a_departamento()
    {
        $departamento = Departamento::create(['nombre' => 'Departamento Original', 'pais_id' => 1]);

        $response = $this->putJson('/api/departamentos/' . $departamento->id, [
            'nombre' => 'Departamento Actualizado',
        ]);

        $response->assertStatus(200)
                ->assertJson(['data' => ['nombre' => 'Departamento Actualizado']]);
    }

    /** @test */
    public function it_can_delete_a_departamento()
    {
        $departamento = Departamento::create(['nombre' => 'Departamento a Borrar', 'pais_id' => 1]);

        $response = $this->deleteJson('/api/departamentos/' . $departamento->id);

        $response->assertStatus(204);
        $this->assertDatabaseMissing('departamentos', ['id' => $departamento->id]);
    }
}
