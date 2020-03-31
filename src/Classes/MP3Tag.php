<?php

namespace McGo\TagFixer\Classes;

use McGo\TagFixer\AcoustID\Result;

class MP3Tag
{
    public $title = null;
    public $artist = null;
    public $album = null;
    public $year = null;
    public $genre = null;
    public $comment = null;
    public $track = null;

    public static function fromResult(Result $result)
    {
        $tag = new MP3Tag();

        $recording = $result->hasRecording() ? $result->recordings[0] : null;


        return $tag;
    }

    public function toArray()
    {
        $return = [];

        if (! is_null($this->title)) {
            $return['title'] = $this->title;
        }
        if (! is_null($this->artist)) {
            $return['artist'] = $this->artist;
        }
        if (! is_null($this->album)) {
            $return['album'] = $this->album;
        }
        if (! is_null($this->year)) {
            $return['year'] = $this->year;
        }
        if (! is_null($this->genre)) {
            $return['genre'] = $this->genre;
        }
        if (! is_null($this->track)) {
            $return['track'] = $this->track;
        }
        if (! is_null($this->track)) {
            $return['track'] = $this->track;
        }

        return $return;
    }
}
