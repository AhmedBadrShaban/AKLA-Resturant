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
        <a href="#"  class="bt">Book A Visit</a>
    </div>
</div> 

<div id="about-section"> 
    <div class="inner-container">
        <h1>About US</h1>
        <p class="text">  
        AKLA is the definition of delicious! Founded in 2022, we like to say we are bringing joy to San Francisco, and it’s something we hope to be doing for years to come. But we offer more than just high-quality, delicious meals. We are a full-service Food retuarant that has become an important part of the local community. Come down and meet us.
        </p>
     </div>
</div>
<div id="footer">
  <div class="footer-list">
     <h2 class="footer-header">SOCIAL MEDIA</h2>
            <ul>
              <li>
                   <a class="footer-link" href="https://twitter.com/Ahmed_200190019" target="_blank">
                           <img class="contact-logo" src="../images/insta.png" alt="Instagram">
                           Instagram
                    </a>
               </li>
               <li>
                  <a class="footer-link" href="https://www.facebook.com/amr.khames.58" target="_blank">
                    <img class="contact-logo" src="../images/facebook.png" alt="Facebook">
                    Facebook
 
                  </a>
               </li>
               <li>
                 <a class="footer-link" href="https://wa.link/p5h346" target="_blank">
                 <img class="contact-logo" src="../images/whatsapp.png" alt="Whatsapp">
                 Whatsapp
                 </a>
               </li>
            </ul>
  </div>
  <div class="footer-list">
     <h2 class="footer-header">CONTACT US</h2>
            <ul>
                <li><a href="#"> <img  class="contact-logo" src="../images/location.png" alt="location"> Cairo - Downtown Street 23</a></li>
                <li><a href="#"> <img class="contact-logo" src="../images/phone.png" alt="phone">+41 61 228 90 40</a></li>
                <li><a href="#"> <img  class="contact-logo" src="../images/email.png" alt="email">info@akla.com.eg</a></li>
             </ul>
  </div>
  <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<ul>
    <li>
        <?php echo e($contacts->email); ?>

     </li>
    <li>
        <?php echo e($contacts->address); ?>

    </li>
    <li>
        <?php echo e($contacts->phone_number); ?>

    </li>
    <li>
        <?php echo e($contacts->facebook_url); ?>

    </li>
</ul>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

 </body>
</html>
<?php /**PATH E:\Internship\NajahNow Internship\restaurant-Ahmed-branch\resources\views/frontend/master.blade.php ENDPATH**/ ?>