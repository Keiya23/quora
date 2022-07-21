<?php

namespace App\Service;

use Symfony\Component\Filesystem\Filesystem;

class UploaderPicture {

    public function __construct(
        private Filesystem $fs,
        private $profileFolder,
        private $profileFolderPublic
        )
    {
        
    }

    public function uploadProfileImage($image, $oldImage = null) {
        $folder = $this->profileFolder;

        $extension = $image->guessExtension() ?? 'bin';
        $filename = bin2hex(random_bytes(10)) . '.' . $extension;
        $image->move($folder, $filename);

        if ($oldImage) {
            $this->fs->remove($folder . '/' . pathinfo($oldImage, PATHINFO_BASENAME));
        }

        return $this->profileFolderPublic . '/' . $filename;
    }
}