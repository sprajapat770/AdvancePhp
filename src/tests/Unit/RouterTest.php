<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    private Router $router;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->router = new Router();
    }

    /** @test */
    public function it_registers_a_route(): void
    {
        //when we call register method
        $this->router->register('get','/users',['Users','index']);

        $expected = [
            'get' => [
                '/users' => ['Users','index'],
            ]
        ];

        //then we assert route was registered
        $this->assertEquals($expected, $this->router->routes());
    }

    /** @test */
    public function it_registers_a_get_route():void
    {
        //when we call register method
        $this->router->get('/users',['Users','index']);

        $expected = [
            'get' => [
                '/users' => ['Users','index'],
            ]
        ];

        //then we assert route was registered
        $this->assertEquals($expected, $this->router->routes());
    }

    /** @test */
    public function it_registers_a_post_route():void
    {
        //when we call register method
        $this->router->post('/users',['Users','store']);

        $expected = [
            'post' => [
                '/users' => ['Users','store'],
            ]
        ];

        //then we assert route was registered
        $this->assertEquals($expected, $this->router->routes());
    }

    /** @test */
    public function there_are_no_routes_when_router_is_created(): void
    {
        $this->router = new Router();

        $this->assertEmpty($this->router->routes());

    }
}