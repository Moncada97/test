<?php

namespace Tests\Unit;
use App\Http\Controllers\ProductoController;
use Tests\TestCase;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductoTest extends TestCase
{
    /**
     * Test de los casos de prueba para guardar un producto
     *
     * @return void
     */
    public function testProductoStoreC1()
    {
        $cdp1 = new Request();
        $cdp1->imagen = 'pechuga.jpg';
        $cdp1->nombre = 'Pechuga';
        $cdp1->precioventakilo = 1876;
        $cdp1->cantidad = 10;
        $cdp1->gramos = 10000;
        $cdp1->activo = 1;
        $this->assertTrue(ProductoController::store($cdp1));
    }

    public function testProductoStoreC2()
    {
        $cdp2 = new Request();
        $cdp2->imagen = 'pernil.jpg';
        $cdp2->nombre = 'Pernil';
        $cdp2->precioventakilo = 1298;
        $cdp2->cantidad = 10;
        $cdp2->gramos = 10000;
        $cdp2->activo = 1;
        $this->assertFalse(ProductoController::store($cdp2));
    }
    public function testProductoStoreC3()
    {
        $cdp3 = new Request();
        $cdp3->imagen = 'Visceras.jpg';
        $cdp3->nombre = 'Vísceras';
        $cdp3->precioventakilo = -3;
        $cdp3->cantidad = 10;
        $cdp3->gramos = 10000;
        $cdp3->activo = 1;
        $this->assertFalse(ProductoController::store($cdp3));
    }
    public function testProductoStoreC4()
    {
        $cdp4 = new Request();
        $cdp4->imagen = 'Alas.jpg';
        $cdp4->nombre = 'Alas';
        $cdp4->precioventakilo = 1121;
        $cdp4->cantidad = -2;
        $cdp4->gramos = 2000;
        $cdp4->activo = 1;
        $this->assertFalse(ProductoController::store($cdp4));
    }
    public function testProductoStoreC5()
    {
        $cdp5 = new Request();
        $cdp5->imagen = 'Pollo entero.jpg';
        $cdp5->nombre = 'Pollo entero';
        $cdp5->precioventakilo = 3331;
        $cdp5->cantidad = 20;
        $cdp5->gramos = -8;
        $cdp5->activo = 1;
        $this->assertFalse(ProductoController::store($cdp5));
    }
}
