<?php

namespace McGo\TagFixer\Classes;

use McGo\TagFixer\AcoustID\Result;

class FileInformation
{
    public $path;
    public $duration;
    public $fingerprint;
    public $trackid = null;
    public $result = null;

    /**
     * FileInformation constructor.
     *
     * @param $path
     * @param $json_object
     * @throws \Exception
     */
    public function __construct($path, $json_object)
    {
        $this->path = $path;
        if (! isset($json_object->duration) || ! isset($json_object->fingerprint)) {
            throw new \Exception('FileInformation could not be created from missing information in json object.');
        }
        $this->fingerprint = $json_object->fingerprint;
        $this->duration = (int) $json_object->duration;
    }

    /**
     * Set the AcoustIDs track id.
     *
     * @param $trackid
     */
    public function setTrackID($trackid)
    {
        $this->trackid = $trackid;
    }

    /**
     * Checks if the trackis was set.
     *
     * @return bool
     */
    public function hasTrackId()
    {
        return $this->trackid !== null;
    }

    /**
     * Parse the data from AcoustID
     *
     * @param $data
     * @throws \Exception
     */
    public function parseAcoustIDData($data)
    {
        // Check the data
        if (! is_object($data) || ! isset($data->results) || count($data->results) < 1) {
            throw new \Exception('Could not parse AcoustIDs response.');
        }

        // Currently we only parse the first (best) result.
        $result = $data->results[0];
        $this->result = new Result($result);
    }
}
