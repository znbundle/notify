<?php

namespace PhpBundle\Notify\Domain\Repositories\Dev;

use Illuminate\Support\Collection;
use PhpBundle\Notify\Domain\Entities\TestEntity;
use PhpBundle\Notify\Domain\Interfaces\Repositories\TestRepositoryInterface;
use PhpLab\Core\Domain\Exceptions\UnprocessibleEntityException;
use PhpLab\Core\Domain\Interfaces\Entity\EntityIdInterface;
use PhpLab\Core\Domain\Libs\Query;
use PhpLab\Core\Exceptions\NotFoundException;
use PhpLab\Core\Legacy\Yii\Helpers\FileHelper;
use PhpLab\Core\Libs\Store\StoreFile;

class TestRepository extends BaseRepository implements TestRepositoryInterface
{

    public function tableName() : string
    {
        return '';
    }

    public function getEntityClass() : string
    {
        return TestEntity::class;
    }


    public function create(EntityIdInterface $entity)
    {
        // TODO: Implement create() method.
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
        $files = FileHelper::findFilesWithPath($this->directory());
        $array = [];
        foreach ($files as $file) {

            list($type, $fileName) = explode('/', $file);
            $name = str_replace('.json', '', $fileName);

            $filePath = realpath($this->directory() . '/' . $file);
            $store = new StoreFile($filePath);
            $data = $store->load();

            $testEntity = new TestEntity;
            $testEntity->setAddress($data['address']);
            $testEntity->setCreatedAt($name);
            $testEntity->setMessage($data['message']);
            $testEntity->setType($type);
            $array[$name . $type] = $testEntity;
        }
        krsort($array);
        $array = array_values($array);
        $needCount = 20;
        if(count($array) > $needCount) {
            /**
             * @var int $index
             * @var TestEntity $value
             */
            foreach ($array as $index => $value) {
                if($index >= $needCount) {
                    $filePath = realpath($this->directory() . '/' . $value->getType() . '/' . $value->getCreatedAt() . '.json');
                    FileHelper::remove($filePath);
                }
            }
        }
        $collection = new Collection($array);
        return $collection;
    }

    public function count(Query $query = null): int
    {
        return $this->all()->count();
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

