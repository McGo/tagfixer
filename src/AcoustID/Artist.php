<?php

namespace McGo\TagFixer\AcoustID;

class Artist
{
    private $raw;
    public $id;
    public $name;

    public function __construct($data)
    {
        $this->raw = $data;
        $this->parseData();
    }

    private function parseData() {
        $this->id = $this->raw->id ?? null;
        $this->name = $this->raw->name ?? null;
    }
}
