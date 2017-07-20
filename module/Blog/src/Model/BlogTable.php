<?php

namespace Blog\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class BlogTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getBlog($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
    }

    public function saveBlog(Blog $blog)
    {
        $data = [
            'content' => $blog->content,
            'title'  => $blog->title,
        ];

        $id = (int) $blog->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->getblog($id)) {
            throw new RuntimeException(sprintf(
                'Cannot update blog with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deleteBlog($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}
