<?php
namespace Music\V1\Rest\Album;

use Zend\Db\Sql\Select;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Paginator\Adapter\DbSelect;

class AlbumMapper
{
    protected $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function fetchAll()
    {
        $select = new Select('album');
        $paginatorAdapter = new DbSelect(
            $select,
            $this->adapter
        );

        $collection = new AlbumCollection($paginatorAdapter);
        return $collection;
    }

    public function fetchOne($albumId)
    {
        $sql = 'SELECT * FROM album WHERE album_id = ?';
        $resultset = $this->adapter->query($sql, array($albumId));
        $data = $resultset->toArray();

        if (!$data) {
            return false;
        }

        $entity = new AlbumEntity();
        $entity->album_id = $data[0]['album_id'];
        $entity->artist  = $data[0]['artist'];
        $entity->title   = $data[0]['title'];

        return $entity;
    }
}
