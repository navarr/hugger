<?php

namespace Navarr\Hugger;

use Psr\Hug\Huggable;

trait GroupHuggableTrait
{
    /** @var true[] A hashmap of SPL Object Hashes that we are hugging */
    private array $currentlyHuggingMap = [];

    public function groupHug(iterable $huggables): void
    {
        foreach ($huggables as $huggable) {
            $this->hug($huggable);
        }
    }

    public function hug(Huggable $h): void
    {
        $id = spl_object_hash($h);
        if (isset($this->currentlyHuggingMap[$id])) {
            return; // Already hugging
        }

        $this->currentlyHuggingMap[$id] = true;
        $h->hug($this);
        unset($this->currentlyHuggingMap[$id]);
    }
}
