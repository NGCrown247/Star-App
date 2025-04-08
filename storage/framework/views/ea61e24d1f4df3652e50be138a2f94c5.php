<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Notification</title>

  
</head>
<body>

  <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="my-container" x-data="pagesApp">
  <div class="my-dash-row p-4">

    <div class="notification-content w-100 border rounded align-items-center  justify-content-center">

      <h4 class="notification-head w-100">Notifications</h4>


      <ul class="notification-ul d-flex flex-column w-100 align-items-center ">
        <li class="notification-item w-100 " @click="readNotification()">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, velit?
          <i class='bx bx-chevron-right'></i>
        </li>
        <div class="divider"></div>

        <li class="notification-item w-100"  @click="readNotification()">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, velit?
          <i class='bx bx-chevron-right'></i>

        </li>
        <div class="divider"></div>
        <li class="notification-item w-100"  @click="readNotification()">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, velit?
          <i class='bx bx-chevron-right'></i>

        </li>
        <div class="divider"></div>
        <li class="notification-item w-100"  @click="readNotification()">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, velit?
          <i class='bx bx-chevron-right'></i>

        </li>
        <div class="divider"></div>
        <li class="notification-item w-100"  @click="readNotification()">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure, velit?
          <i class='bx bx-chevron-right'></i>

        </li>
      </ul>
    </div>



  </div>







  <div class="modal fade" id="notificationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-body p-5">
          <h4 class="notificationModal-head">Lorem Announcement</h4>
          <p  class="notificationModal-p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat eius quo deleniti tempore velit! Accusantium iste sit magnam aut labore ducimus quasi officiis, facere, omnis amet similique voluptatum ex quibusdam dicta nesciunt voluptates illum porro? Distinctio dolores, velit natus, similique ex voluptas incidunt porro culpa dolorum rerum tenetur sapiente aperiam laborum suscipit repellendus pariatur excepturi reprehenderit ullam quis! Temporibus ratione dolorum earum adipisci ipsam ut fuga at rem pariatur! Laboriosam, mollitia molestias pariatur magni fuga beatae illum, nobis, dolores cupiditate error fugit recusandae quasi neque praesentium similique velit excepturi unde laudantium ipsa minima accusantium! Animi eos aut maiores dolores asperiores?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>







  </div>


</body>
</html>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crown/Desktop/star/resources/views/users/notification.blade.php ENDPATH**/ ?>