<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>tasks</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   <style>
      .todo-item {
         display: flex;
         margin: 8px 0;
         border-radius: 30px;
         background-color: #f7f7f7;
      }

      .todo-item.completed div {
         text-decoration: line-through;
         text-decoration-color: darkred;
         text-decoration-style: wavy;
      }

      .input-group>.form-control:focus {
         border-color: green !important;
      }

      .todo-item-remove {
         visibility: hidden;
      }

      .todo-item:hover .todo-item-remove {
         visibility: visible;
      }

      .bi {
         color: green;

      }

      a {
         text-decoration: none;
         color: #fff;
         font-weight: bolder;
      }

      .num-tasks {
         background-color: green;
         padding: 5px 10px;
         border-radius: 30px;
         margin-right: 10px;
      }

      .num-tasks:hover {
         color: #fff !important;
      }


      .text-tasks:hover {
         cursor: pointer;
      }
   </style>
</head>

<body>
   <div class="container">
      <div class="row">
         <div class="col-md-8 mx-auto">

            <!-- CARD -->
            <div class="card mt-3">
               <!-- header -->
               <div class="card-header p-3">
                  <form action="task/create" method="post">
                     <div class="input-group">
                        <input type="text" name="description" class="form-control" placeholder="مهمة جديدة..." required />
                        <button type="submit" class="btn btn-success fw-bold">حفظ<i class="bi bi-play"></i></button>
                     </div>
                  </form>
               </div>
               <!-- body -->
               <div class="card-body p-3">
                  <ul class="nav nav-pills justify-content-center mb-3">
                     <li class="nav-item"><a href="http://localhost/php-basics" class="nav-link">الكل</a></li>
                     <li class="nav-item"><a href="?completed=0" class="nav-link">قيد التنفيذ</a></li>
                     <li class="nav-item"><a href="?completed=1" class="nav-link">مكتملة</a></li>
                  </ul>
                  <?php foreach ($tasks as $task) : ?>
                     <div class="todo-item  p-2 <?= !$task->completed ?: 'completed' ?>">
                        <div class="p-1">
                           <a href="task/update?id=<?= $task->id ?>&completed=<?= $task->completed ? '0' : '1' ?>">
                              <i class="bi fs-5 <?= $task->completed ? 'bi-check-square' : 'bi bi-hourglass-split text-success' ?>"></i>
                           </a>
                        </div>
                        <div class="flex-fill m-auto p-2">
                           <?= $task->description ?>
                        </div>
                        <div class="mb-2">
                           <a href="task/delete?id=<?= $task->id ?>" class="todo-item-remove">
                              <i class="bi bi-trash text-danger fs-4"></i>
                           </a>
                        </div>
                     </div>
                  <?php endforeach; ?>

                  
                  <div class="mt-5 d-flex align-items-center justify-content-center">
                     <span class="text-tasks">عدد مهامك هو </span>
                     <a class="num-tasks"> <?= count($tasks) ?> </a>

                  </div>
               </div>

            </div>
         </div>
      </div>
   </div>
</body>

</html>