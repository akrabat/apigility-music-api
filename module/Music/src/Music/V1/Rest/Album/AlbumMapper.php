<?php
namespace Music\V1\Rest\Album;

use Zend\Db\Sql\Select;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Db\ResultSet\HydratingResultSet;

class AlbumMapper
{
    protected $adapter;

    public function __construct(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    public function fetchAll($filter)
    {
        $select = new Select('album');
        if (isset($filter['title'])) {
            $select->where(array('title LIKE ?' => '%'.$filter['title'].'%'));
        }
     
        $resultset = new HydratingResultSet;
        $resultset->setObjectPrototype(new AlbumEntity);

        $paginatorAdapter = new DbSelect(
            $select,
            $this->adapter,
            $resultset
        );

        $collection = new AlbumCollection($paginatorAdapter);
        return $collection;
    }

    public function fetchOne($albumId)
    {
        $sql = 'SELECT * FROM album WHERE id = ?';
        $resultset = $this->adapter->query($sql, array($albumId));
        $data = $resultset->toArray();

        if (!$data) {
            return false;
        }

        $entity = new AlbumEntity();
        $entity->populate($data[0]);

        return $entity;
    }

    public function save($data, $id = 0)
    {
        $data = (array)$data;
        if ($id > 0) {
            $data['id'] = $id;
        }
        
        if (isset($data['id'])) {
            $sql = 'UPDATE album SET title = :title, artist = :artist WHERE id = :id';
            $result = $this->adapter->query($sql, $data);
        } else {
            $sql = 'INSERT INTO album (title, artist) VALUES(:title, :artist)';
            $result = $this->adapter->query($sql, $data);

            $data['id']= $this->adapter->getDriver()->getLastGeneratedValue();
            
        }
        $entity = new AlbumEntity();
        $entity->populate($data);
        return $entity;
    }
}
