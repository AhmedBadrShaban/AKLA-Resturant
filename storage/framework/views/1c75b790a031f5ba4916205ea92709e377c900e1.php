<!DOCTYPE html>
<html lang="en">
<head>
    <title> AKLA </title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">    <link rel="stylesheet" type="text/css" href=" <?php echo e(URL::to('css/style1.css')); ?>">
 <link rel="icon" href="images/akla.ico">

</head>
<body>
<div class="containerr">
  <div class ="header">
      <?php echo $__env->make('partial.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </div>
</div>
<div id="landing">
     <div class="title">
        <h1>
          <!-- <img class="akla" src="../images/akla.png" alt=""> -->
          A K L A restaurant
         </h1>
        <h2 data-text="We’re the best restaurant in City ">
            We’re the best restaurant in City .
        </h2>
    </div>

    <div class="button">
        <a href="<?php echo e(url('menu')); ?>" class="bt">Order Now !</a>
        <!-- <a href="#"  class="bt">Book A Visit</a> -->
    </div>
</div> 
<?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div id="about-section"> 
    <div class="inner-container">
        <h1>About US</h1>
        <p class="text">  
          <?php echo e($contacts->about); ?>

         </p>
     </div>
</div>
<div id="footer">
  <div class="footer-list">
     <h2 class="footer-header">SOCIAL MEDIA</h2>
            <ul>
              <li>
                   <a class="footer-link" href="<?php echo e($contacts->insta_url); ?>" target="_blank">
                           <img class="contact-logo" src="../images/insta.png" alt="Instagram">
                           Instagram
                    </a>
               </li>
               <li>
                  <a class="footer-link" href="<?php echo e($contacts->facebook_url); ?>"  target="_blank">
                    <img class="contact-logo" src="../images/facebook.png" alt="Facebook">
                    Facebook
 
                  </a>
               </li>
               <li>
                 <a class="footer-link" href="<?php echo e($contacts->whatsapp_url); ?>" target="_blank">
                 <img class="contact-logo" src="../images/whatsapp.png" alt="Whatsapp">
                 Whatsapp
                 </a>
               </li>
            </ul>
  </div>
  <div class="footer-list">
     <h2 class="footer-header">CONTACT US</h2>
            <ul>
                <li><a > <img  class="contact-logo" src="../images/location.png" alt="location">
                <?php echo e($contacts->address); ?></a></li>
                <li><a > <img class="contact-logo" src="../images/phone.png" alt="phone">
                <?php echo e($contacts->phone_number); ?></a></li>
                <li><a > <img  class="contact-logo" src="../images/email.png" alt="email">
                <?php echo e($contacts->email); ?></a></li>
             </ul>
  </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 </body>
</html>
<?php /**PATH E:\Final Code\restaurant\resources\views/frontend/home.blade.php ENDPATH**/ ?>