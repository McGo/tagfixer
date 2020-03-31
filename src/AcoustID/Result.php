<?php

namespace McGo\TagFixer\AcoustID;

use McGo\TagFixer\Classes\MP3Tag;

class Result
{
    private $raw;
    public $score;
    public $recordings;

    public function __construct($data)
    {
        $this->raw = $data;
        $this->parseResult();

        dump($this);
    }

    /**
     * Returns the result as instance of MP3Tag - which could then be used to change the files meta data.
     *
     * @return MP3Tag
     */
    public function getTagInformation()
    {
        return MP3Tag::fromResult($this);
    }

    public function hasRecording()
    {
        return count($this->recordings) > 0;
    }

    private function parseResult()
    {
        $this->score = $this->raw->score ?? null;

        $this->recordings = [];
        if (isset($this->raw->recordings)) {
            foreach ($this->raw->recordings as $recording) {
                $this->recordings[] = new Recording($recording);
            }
        }
    }
}
