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
    public function test_validar_se_a_homepage_contentem_algum_conteudo()
    {
        $response = $this->get('/')
            ->assertSeeText("Alugue um Filme ou Serie");
    }

     /**
     * @test
     */
    public function test_validar_se_rota_de_pesquisa_funciona()
    {
        $response = $this->post('/search')
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_validar_se_rota_de_pesquisa_retorna_valor_desejado()
    {
        $this->post('/search')
            ->assertStatus(200)
            ->assertJson([
                'txt' => 'ola',
            ]);
    }
}
