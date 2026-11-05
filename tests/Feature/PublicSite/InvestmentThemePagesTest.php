<?php

namespace Tests\Feature\PublicSite;

use Tests\TestCase;

class InvestmentThemePagesTest extends TestCase
{
    public function test_research_catalogue_shows_all_fifteen_areas_and_status(): void
    {
        $response = $this->get(route('themes.index'));

        $response->assertOk()
            ->assertSee('Bitcoin (BTC)')
            ->assertSee('Tesla')
            ->assertSee('Scrub Daddy')
            ->assertSee('Red Bull')
            ->assertSee('NFL merchandise')
            ->assertSee('Marvel Studios')
            ->assertSee('Logistics businesses')
            ->assertSee('Rental properties')
            ->assertSee('Farmland')
            ->assertSee('Storage facilities')
            ->assertSee('Commercial property')
            ->assertSee('Ethereum (ETH)')
            ->assertSee('Laundromats')
            ->assertSee('Car washes')
            ->assertSee('Vending machines')
            ->assertSee('Commonwealth is not currently offering related investments');
    }

    public function test_each_research_area_has_a_detail_page_and_no_buy_flow(): void
    {
        $this->get(route('themes.show', 'bitcoin'))
            ->assertOk()
            ->assertSee('Bitcoin (BTC)')
            ->assertSee('No related investment is currently offered')
            ->assertSee('Questions to answer before any offer')
            ->assertDontSee('Buy now');
    }

    public function test_unknown_research_area_returns_not_found(): void
    {
        $this->get('/investment-themes/not-a-real-area')->assertNotFound();
    }
}
