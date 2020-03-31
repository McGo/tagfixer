<?php

namespace McGo\TagFixer\AcoustID;

class Release
{
    private $raw;
    public $id;
    public $title;
    public $track_count;
    public $medium_count;
    public $artists;

    public function __construct($data)
    {
        $this->raw = $data;
        $this->parseData();
    }

    private function parseData()
    {
        $this->id = $this->raw->id ?? null;
        $this->title = $this->raw->title ?? null;
        $this->track_count = $this->raw->track_count ?? null;
        $this->medium_count = $this->raw->medium_count ?? null;

        $this->artists = [];
        if (isset($this->raw->artists)) {
            foreach ($this->raw->artists as $artist) {
                if ($artist !== '') {
                    $this->artists[] = new Artist($artist);
                }
            }
        }
    }
}
