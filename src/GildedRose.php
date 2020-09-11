<?php

namespace Runroom\GildedRose;

class GildedRose
{
    private array $items = [];

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(int $index) : void
    {
        /** @var object $item */
        $item = $this->items[$index];

        if ($item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert') {
            if ($item->quality > 0) {
                if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                    $item->quality = $this->setOperation(false, intval($item->quality), 1);
                }
            }
        } else {
            if ($item->quality < 50) {
                $item->quality = $this->setOperation(true, intval($item->quality), 1);
                if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($item->sell_in < 11) {
                        if ($item->quality < 50) {
                            $item->quality = $this->setOperation(true, intval($item->quality), 1);
                        }
                    }
                    if ($item->sell_in < 6) {
                        if ($item->quality < 50) {
                            $item->quality = $this->setOperation(true, intval($item->quality), 1);
                        }
                    }
                }
            }
        }

        if ($item->name != 'Sulfuras, Hand of Ragnaros') {
            $item->sell_in = $this->setOperation(false, intval($item->sell_in), 1);
        }

        if ($item->sell_in < 0) {
            if ($item->name != 'Aged Brie') {
                if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($item->quality > 0) {
                        if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                            $item->quality = $this->setOperation(false, intval($item->quality), 1);
                        }
                    }
                } else {
                    $item->quality = $this->setOperation(false, intval($item->quality), intval($item->quality));
                }
            } else {
                if ($item->quality < 50) {
                    $item->quality = $this->setOperation(true, intval($item->quality), 1);
                }
            }
        }

    }

    private function setOperation(bool $operation, int $op1, int $op2) : int
    {
        return $operation ? $op1 + $op2 : $op1 - $op2;
    }
}
