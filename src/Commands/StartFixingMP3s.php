<?php


namespace McGo\TagFixer\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use McGo\TagFixer\Jobs\FixTagForFile;

class  StartFixingMP3s extends Command
{
    protected $signature = 'tagfixer';

    public function handle()
    {
        $files = Storage::disk('local')->allFiles();
        foreach ($files as $file) {
            $storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
            dispatch(new FixTagForFile($storagePath.$file));
        }
    }
}
