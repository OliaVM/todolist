<?php
class TaskController extends Controller {
	/**
	 * @var object
	 */
	public $model;

	/**
	 * @param Application
	 * @throws Exception
	 * @return void
	 */
	public function __construct($application) 
	{
		parent::__construct($application);
        $this->model = new Task();
	}


    /**
     * Show users
     *
     * @throws Exception
     * @return void
     */
    public function showTasksAction() 
    { 
        $dbConnection = $this->container->get('dbConnection');
        try {
            $this->model->checkPageNumber(); 
            $arr = $this->model->getTasks($dbConnection);
            $tasks = $arr['tasks'];
            $total = $arr['total'];
            $page = $arr['page'];
            
        } catch (Exception $e) {
            $this->render('error', [
                'error' => $e->getMessage() 
            ]);     
        }
        
        $this->render('task:showTasks', [
            'tasks' => $tasks, 
            'total' => $total, 
            'page' => $page
        ]);
    }


    /**
     * Edit status of user
     *
     * @return void
     */
    public function editStatusOfTaskAction() 
    { 
        try {
            if ((int)$_SESSION['roleId'] !== 1) {
                    throw new Exception("You do not have access");
            } 
            $dbConnection = $this->container->get('dbConnection');
            $taskId = $this->model->checkExistenceIdAndTask($dbConnection);
            $this->model->updateTaskStatus($dbConnection); 
            header("Location: /show-tasks/"); 
        } catch (Exception $e) {
            $this->render('error', [
                'error' => $e->getMessage() 
            ]); 
        }
        
    }

    /**
     * Edit user
     *
     * @return void
     */
    public function editTaskAction() 
    {
        $dbConnection = $this->container->get('dbConnection');
        try {
            if ((int)$_SESSION['roleId'] !== 1) {
                throw new Exception("You do not have access");
            } 
            $this->model->checkExistenceIdAndTask($dbConnection);
            $arr = $this->model->updateTask($dbConnection);
            $task = $arr['task'];
            $message = $arr['message'];
        } catch (Exception $e) {
            $this->render('error', [
                'error' => $e->getMessage() 
            ]);
        }

        $this->render('task:editTask', [
            'rowTask' => $task, 
            'message' => $message 
        ]);
    }

	public function createTaskAction()
    {
        $dbConnection = $this->container->get('dbConnection');
        $data = $this->model->createTask($dbConnection);

        $this->render('task:createTask', [
            'rowTask' => $task, 
            'message' => $data['message'] 
        ]);
    }

}


		