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
    public function test_validar_requisicao_na_api_moviedb()
    {
        $this->post('/search',['txt_pesquisa' => 'liga da justiça'])
            ->assertStatus(200);
    }

    /**
     * @test
     */
    public function test_validar_se_requisicao_retorna_uma_view()
    {
        $response = $this->post('/search',['txt_pesquisa' => 'liga da justiça']);
        $response->assertViewIs('pages.list_movies');
    }
}
