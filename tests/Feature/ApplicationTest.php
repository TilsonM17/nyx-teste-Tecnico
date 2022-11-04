<?php

namespace Tests\Feature;


use Tests\TestCase;

class ApplicationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_if_homepage_is_load()
    {
        $response = $this->get('/')
            ->assertSeeText("wonderful");
    }
}
