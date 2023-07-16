<!DOCTYPE html>
<html lang="en">
<head>
    <title> AKLA </title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">    <link rel="stylesheet" type="text/css" href=" {{URL::to('css/style1.css')}}">
 <link rel="icon" href="images/akla.ico">

</head>
<body>
<div class="containerr">
  <div class ="header">
      @include('partial.header')
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
        <a href="{{url('menu')}}" class="bt">Order Now !</a>
        <!-- <a href="#"  class="bt">Book A Visit</a> -->
    </div>
</div> 
@foreach( $contacts as $contacts)
<div id="about-section"> 
    <div class="inner-container">
        <h1>About US</h1>
        <p class="text">  
          {{$contacts->about}}
         </p>
     </div>
</div>
<div id="footer">
  <div class="footer-list">
     <h2 class="footer-header">SOCIAL MEDIA</h2>
            <ul>
              <li>
                   <a class="footer-link" href="{{$contacts->insta_url}}" target="_blank">
                           <img class="contact-logo" src="../images/insta.png" alt="Instagram">
                           Instagram
                    </a>
               </li>
               <li>
                  <a class="footer-link" href="{{$contacts->facebook_url}}"  target="_blank">
                    <img class="contact-logo" src="../images/facebook.png" alt="Facebook">
                    Facebook
 
                  </a>
               </li>
               <li>
                 <a class="footer-link" href="{{$contacts->whatsapp_url}}" target="_blank">
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
                {{$contacts->address}}</a></li>
                <li><a > <img class="contact-logo" src="../images/phone.png" alt="phone">
                {{$contacts->phone_number}}</a></li>
                <li><a > <img  class="contact-logo" src="../images/email.png" alt="email">
                {{$contacts->email}}</a></li>
             </ul>
  </div>
</div>
@endforeach
 </body>
</html>
