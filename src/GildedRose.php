<?php

namespace Runroom\GildedRose;

class GildedRose {

    private array $items = [];

    function __construct($items) {
        $this->items = $items;
    }

    function updateQuality() : void {
        foreach ($this->items as $item) {
            if ($item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->quality > 0) {
                    if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                        $item->quality = $this->setQuality(false,$item->quality,1);

                    }
                }
            } else {
                if ($item->quality < 50) {
                    $item->quality = $item->quality + 1;
                    if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->sell_in < 11) {
                            if ($item->quality < 50) {
                                $item->quality = $this->setQuality(true,$item->quality,1);
                            }
                        }
                        if ($item->sell_in < 6) {
                            if ($item->quality < 50) {
                                $item->quality = $this->setQuality(true,$item->quality,1);
                            }
                        }
                    }
                }
            }

            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                $item->sell_in = $item->sell_in - 1;
            }

            if ($item->sell_in < 0) {
                if ($item->name != 'Aged Brie') {
                    if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->quality > 0) {
                            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                                $item->quality = $this->setQuality(false,$item->quality,1);
                            }
                        }
                    } else {
                        $item->quality = $this->setQuality(false,$item->quality,$item->quality);
                    }
                } else {
                    if ($item->quality < 50) {
                        $item->quality = $this->setQuality(true,$item->quality,1);
                    }
                }
            }
        }
    }

    private function setQuality(bool $operation,int $op1,int $op2) : int {
        return $operation ? $op1 + $op2 : $op1 - $op2;
    }
}
