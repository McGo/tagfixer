<?php

namespace McGo\TagFixer\AcoustID;

class Recording
{
    private $raw;
    public $artists;
    public $duration;
    public $id;
    public $releases;

    public function __construct($data)
    {
        $this->raw = $data;
        $this->parseData();
    }

    private function parseData()
    {
        $this->id = $this->raw->id ?? null;
        $this->duration = $this->raw->duration ?? null;

        $this->artists = [];
        if (isset($this->raw->artists)) {
            foreach ($this->raw->artists as $artist) {
                $this->artists[] = new Artist($artist);
            }
        }

        $this->releases = [];
        if (isset($this->raw->releases)) {
            foreach ($this->raw->releases as $release) {
                $this->releases[] = new Release($release);
            }
        }
    }
}
