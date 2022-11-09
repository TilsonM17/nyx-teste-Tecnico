<?php

namespace Tests\Feature;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
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
    public function test_validar_se_requisicao_retorna_uma_view()
    {
        Http::fake();
        $response = $this->post('/search', ['txt_pesquisa' => 'liga da justiça']);
        $response->assertRedirect('list');
    }

    /**
     * @test
     */
    public function test_testar_dados_enviados_para_view()
    {   //Http::fake();
        $response = $this->get('/list');
        $response->assertViewHas('movies');
    }
}
