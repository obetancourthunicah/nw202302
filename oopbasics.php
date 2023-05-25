<?php

class Orden {
    private Producto $bebida;
    private Producto $reposteria;

    public function __construct(Producto $bebida, Producto $reposteria) {
        $this->bebida = $bebida;
        $this->reposteria = $reposteria;
    }
    public function getTotal(){
        return $this->bebida->getPrecio() + $this->reposteria->getPrecio();
    }
}

class Producto {
    private string $sku = '';
    private float $precio = 0;
    private string $nombre = '';
    public function __construct(string $sku, float $precio, string $nombre)
    {
        $this->sku = $sku;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }
    public function getSku(){
        return $this->sku;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getPrecio(){
        return $this->precio;
    }
}


?>
