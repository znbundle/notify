<?php

namespace ZnBundle\Notify\Domain\Repositories\Dev;

use Illuminate\Support\Collection;
use ZnBundle\Notify\Domain\Entities\TestEntity;
use ZnBundle\Notify\Domain\Interfaces\Repositories\TestRepositoryInterface;
use ZnCore\Base\Domain\Helpers\EntityHelper;
use ZnCore\Base\Domain\Interfaces\Entity\EntityIdInterface;
use ZnCore\Base\Domain\Libs\Query;
use ZnCore\Base\Helpers\TimeHelper;
use ZnCore\Base\Libs\Store\StoreFile;

class TestRepository extends BaseRepository implements TestRepositoryInterface
{

    protected $directory;
    private $collection;
    private $store;
    private $limit = 40;

    public function __construct(string $directory = null)
    {
        $this->directory = $directory;
        $this->initStorage();
        $this->loadCollection();
    }

    private function initStorage()
    {
        $fileName = $this->getFileName();
        $this->store = new StoreFile($fileName);
    }

    private function saveCollection()
    {
        $this->store->save($this->collection);
    }

    private function loadCollection()
    {
        $this->collection = $this->store->load();
    }

    /*public function tableName(): string
    {
        return '';
    }*/

    public function getEntityClass(): string
    {
        return TestEntity::class;
    }

    protected function getDirectory(): string
    {
        if ($this->directory) {
            return $this->directory;
        }
        $this->directory = realpath(__DIR__ . '/../../../../../../..') . '/' . $_ENV['NOTIFY_DEV_DIR'];
        return $this->directory;
    }

    protected function getFileName(): string
    {
        $dir = $this->getDirectory();
        return $dir . '/messages.json';
    }

    public function create(EntityIdInterface $testEntity)
    {
        $this->collection[] = EntityHelper::toArray($testEntity);
        $this->saveCollection();
    }

    public function update(EntityIdInterface $entity)
    {
        // TODO: Implement update() method.
    }

    public function deleteById($id)
    {
        // TODO: Implement deleteById() method.
    }

    public function deleteByCondition(array $condition)
    {
        // TODO: Implement deleteByCondition() method.
    }

    public function all(Query $query = null)
    {
        $query = Query::forge($query);
        $array = $this->indexArray($this->collection);
        krsort($array);
        $array = array_values($array);
        $array = $this->sliceArray($array);
        $offset = $query->getParam(Query::OFFSET);
        $limit = $query->getParam(Query::LIMIT);
        if($offset || $limit) {
            $array = array_slice($array, $offset, $limit);
        }
        return $this->arrayToCollection($array);
    }

    private function sliceArray(array $array): array
    {
        if (count($array) > $this->limit) {
            $array = array_slice($array, 0, $this->limit);
            $this->collection = $array;
            $this->saveCollection();
        }
        return $array;
    }

    private function indexArray(array $inputArray): array
    {
        $array = [];
        foreach ($inputArray as $data) {
            $createdAt = TimeHelper::unserializeFromArray($data['createdAt']);
            $uniqueId = $createdAt->format('Ymd_His_u');
            $array[$uniqueId] = $data;
        }
        return $array;
    }

    private function arrayToCollection(array $array): Collection
    {
        foreach ($array as &$data) {
            $data['createdAt'] = TimeHelper::unserializeFromArray($data['createdAt']);
        }

        $collection = EntityHelper::createEntityCollection($this->getEntityClass(), $array);
        return $collection;
    }

    public function count(Query $query = null): int
    {
        return $this->all($query)->count();
    }

    public function oneById($id, Query $query = null): EntityIdInterface
    {
        // TODO: Implement oneById() method.
    }

    public function relations()
    {
        // TODO: Implement relations() method.
    }
}

