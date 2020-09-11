<?php

namespace Runroom\GildedRose;

class Item {

    public string $name;
    public int $sell_in;
    public int $quality;

    function __construct($name, $sell_in, $quality) {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString() : string {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

}
