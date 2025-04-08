<?php

declare(strict_types=1);

namespace Deg540\KataDeNota\Test;

use Deg540\KataDeNota\KataDeNota;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

final class KataDeNotaTest extends TestCase
{
    /**
     * @test
     */
    public function givenNothingReturnsEmptyString(){
        $ListaDeLaCompra = new KataDeNota();

        $convertedValue = $ListaDeLaCompra->getList('');

        assertEquals('',$convertedValue);
    }
    /**
     * @test
     */
    public function addingPanReturnsPanes(){
        $ListaDeLaCompra = new KataDeNota();
        $convertedValue = $ListaDeLaCompra->getList("añadir Pan");

        $convertedValue = $ListaDeLaCompra->getList("añadir Pan 3");

        assertEquals("pan x4",$convertedValue);
    }
    /**
     * @test
     */
    public function deletingPanReturnsListWithoutPan(){
        $ListaDeLaCompra = new KataDeNota();
        $convertedValue = $ListaDeLaCompra->getList("añadir Pan 2");

        $convertedValue = $ListaDeLaCompra->getList("eliminar Pan");

        assertEquals("",$convertedValue);
    }
    /**
     * @test
     */
    public function deletingPanFromEmptyListReturnsNotExistingErrorString(){
        $ListaDeLaCompra = new KataDeNota();

        $convertedValue = $ListaDeLaCompra->getList("eliminar Pan");

        assertEquals("El producto seleccionado no existe",$convertedValue);
    }
    /**
     * @test
     */
    public function givenStringVaciarReturnsEmptyString(){
        $ListaDeLaCompra = new KataDeNota();
        $convertedValue = $ListaDeLaCompra->getList("añadir Pan");

        $convertedValue = $ListaDeLaCompra->getList("vaciar");

        assertEquals("",$convertedValue);
    }
}
