<?php
use App\Core\router;
use App\Core\request;
use App\controllers\TaskControllers;


require '_init.php';

router::make()
->get('', [TaskControllers::class, 'index'])
->post('task/create', [TaskControllers::class, 'create'])
->get('task/delete', [TaskControllers::class, 'delete'])
->get('task/update', [TaskControllers::class, 'update'])
->resolve(request::uri(), request::method());
