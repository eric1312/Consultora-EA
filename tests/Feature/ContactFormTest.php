<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_can_be_submitted_and_saved(): void
    {
        $response = $this->post('/contact', [
            'name' => 'Ana López',
            'email' => 'ana@example.com',
            'message' => 'Quiero una web para mi negocio.',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('success', 'Tu mensaje ha sido enviado correctamente.');
        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Ana López',
            'email' => 'ana@example.com',
            'message' => 'Quiero una web para mi negocio.',
        ]);
    }
}
