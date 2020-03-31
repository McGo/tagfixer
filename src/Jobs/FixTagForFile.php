<?php

namespace McGo\TagFixer\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use McGo\TagFixer\Actions\AskAcoustIDAboutFingerprint;
use McGo\TagFixer\Actions\GetFileInformationForFile;

class FixTagForFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function handle(GetFileInformationForFile $fingerprintForFile, AskAcoustIDAboutFingerprint $askAcoustIDAboutFingerprint)
    {
        try {
            $fileInformation = $fingerprintForFile->execute($this->filename);
            $fileInformation = $askAcoustIDAboutFingerprint->execute($fileInformation);
        } catch (\Exception $e) {
            // Do nothing.
        }
    }

}
