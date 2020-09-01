<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskApiTest extends TestCase
{
    public function testTaskNameRequiredWhenCreating()
    {
        $response = $this->postJson('/api/tasks', []);
        $response->assertStatus(422);
    }

    public function testIdRequiredWhenDeleting()
    {
        $response = $this->delete('/api/tasks/900');
        $response->assertStatus(500);
    }
}
