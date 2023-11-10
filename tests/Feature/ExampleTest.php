<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    protected $preserveGlobalState = false;
    protected $runTestInSeparateProcess = true;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_home_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_checkout_flow()
    {
        $response = $this->get('/add-to-cart/2');

        $response->assertStatus(302);
        $response->assertRedirect('/order-details');

        $this->followRedirects($response)
            ->assertStatus(200)
            ->assertSee('Cart Details');
    }

    /**
     * @test
     * @dataProvider productRoutesProvider
     */
    public function test_all_course_detail_pages($route)
    {
        $response = $this->get($route);

        $response->assertStatus(200);
    }

    public function productRoutesProvider()
    {
        return [
            ["/osha-10-hour-construction"],
            ["/osha-30-hour-construction"],
            ["/osha-10-hour-general-industry"],
            ["/new-york-osha-10-hour-construction"],
            ["/new-york-osha-30-hour-construction"],
            ["/osha-10-construction-spanish"],
            ["/new-york-osha-10-hour-general"],
            ["/new-york-osha-10-hour-construction-spanish"],
            ["/osha-30-hour-construction-spanish"],
            ["/new-york-osha-30-hour-construction-spanish"],
            ["/osha-10-hour-general-industry-spanish"],
            ["/ny-osha-10-hour-general-industry-spanish"],
            ["/osha-30-hour-general-industry"],
            ["/osha-30-hour-general-industry-spanish"],
            ["/ny-osha-30-hour-general-industry"],
            ["/osha-10-and-30-hour-construction"],
        ];
    }
}
