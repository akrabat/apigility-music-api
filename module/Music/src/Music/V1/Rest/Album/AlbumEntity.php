<?php
namespace Music\V1\Rest\Album;

class AlbumEntity
{
    protected $id;
    protected $artist;
    protected $title;

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    public function populate($data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }
}
