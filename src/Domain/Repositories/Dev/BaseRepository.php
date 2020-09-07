<?php

namespace PhpBundle\Notify\Domain\Repositories\Dev;

use PhpLab\Core\Domain\Helpers\EntityHelper;
use PhpLab\Core\Libs\Store\StoreFile;

abstract class BaseRepository
{

    //const DIRECTORY = null;

    protected $directory;

    //abstract protected function directory() : string;

    protected function directory(): string
    {
        if ($this->directory) {
            return $this->directory;
        }
        $this->directory = __DIR__ . '/../../../../../../../' . $_ENV['NOTIFY_DEV_DIR'];
        return $this->directory;
    }

    public function __construct(string $directory = null)
    {
        $this->directory = $directory;
    }

    protected function saveToFile(array $emailEntity)
    {
        $fileName = $this->getFileName();
        $data = EntityHelper::toArray($emailEntity);
        $store = new StoreFile($fileName);
        $store->save($data);
    }

    protected function getFileName(): string
    {
        $dir = $this->directory();
        $time = new \DateTime('NOW');
        $timeString = $time->format('Ymd_His_u');
        $fileName = $dir . '/' . $timeString . '.json';
        return $fileName;
    }

}
