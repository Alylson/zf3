<?php

namespace Blog\Controller;

use Blog\Model\BlogTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
* 
*/
class BlogController extends AbstractActionController
{
	
	public function indexAction()
    {
        return new ViewModel([
            'blog' => $this->table->fetchAll(),
        ]);
    }
	public function addAction()
	{
		
	}
	public function editAction()
	{
		
	}
	public function deleteAction()
	{
		
	}
	 // Add this property:
    private $table;

    // Add this constructor:
    public function __construct(BlogTable $table)
    {
        $this->table = $table;
    }
}