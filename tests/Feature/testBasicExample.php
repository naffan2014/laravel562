<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;

class testBasicExample extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testBasicExample()
    {
        Cache::shouldReceive('get')
            ->with('key')
            ->andReturn('value');

        $this->get('/cache')
            ->assertSee('value');
    }

}
