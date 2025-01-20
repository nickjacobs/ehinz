<?php

use SilverStripe\Dev\BuildTask;
use SilverStripe\Assets\File;
use SilverStripe\ORM\DB;

class UpdateUploadFolderTask extends BuildTask
{
    protected $title = 'Update UploadFolder for DownloadFile Records';
    protected $description = 'Loops through all DownloadFile records, finds the associated file, and updates the UploadFolder field.';

    public function run($request)
    {

        //return false;


        // Fetch all DownloadFile records
        $records = DownloadFile::get()->filter('UploadFolder', 0);
        $count = $records->count();

        if ($count === 0) {
            echo "No DownloadFile records found." . PHP_EOL;
            return;
        }

        echo "Processing {$count} DownloadFile records..." . PHP_EOL;

        $updatedCount = 0;
        foreach ($records as $record) {
            // Ensure the record has an associated file
            if ($file = $record->File()) {
                if ($file->exists() && $file->ParentID) {
                    // Update the UploadFolder field with the file's ParentID
                    $record->UploadFolder = $file->ParentID;
                    $record->write();
                    $record->PublishRecursive();

                    echo "Updated record ID {$record->ID}: UploadFolder set to {$file->ParentID}." . PHP_EOL;
                    $updatedCount++;
                } else {
                    echo "Skipped record ID {$record->ID}: File does not exist or has no ParentID." . PHP_EOL;
                }
            } else {
                echo "Skipped record ID {$record->ID}: No associated file." . PHP_EOL;
            }
        }

        echo "Task complete. Updated {$updatedCount} out of {$count} records." . PHP_EOL;
    }
}
