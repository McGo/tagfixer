<?php

namespace McGo\TagFixer\Actions;

use McGo\TagFixer\Classes\FileInformation;

class GetFileInformationForFile
{
    /**
     * @param $filename
     * @return FileInformation
     * @throws \Exception
     */
    public function execute($filename)
    {
        $result = @exec('fpcalc -json '.$filename. ' 2>&1');
        $data = json_decode($result);
        return new FileInformation($filename, $data);
    }
}
