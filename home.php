// Code By PuneetK
<?php
session_start();

?>
<html class="gr__w3schools_com"><head><title>Camera App</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
</head><body class="w3-theme-l5" data-gr-c-s-loaded="true">

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="#" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>Logo</a>
  <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-padding-large w3-hover-white" title="My Account">
    Logout
  </a>
 </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium w3-large"> 
  <a href="#" class="w3-bar-item w3-button w3-padding-large">My Profile</a>
  <a href="logout.php" class="w3-bar-item w3-button w3-padding-large">Logout</a>
</div>

<input type="hidden" id="username" value="<?php echo $_SESSION['Username'] ?>" >
<input type="hidden" id="uclass" value="<?php echo $_SESSION['Class'] ?>" >    

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row" id="mobile">
    <div class="w3-col m2">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <p class="w3-center"><img src="https://www.w3schools.com/w3images/avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>Name: <?php echo $_SESSION['Username'] ?> </p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> Class: <?php echo $_SESSION['Class'] ?> </p>
<!--         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p>-->
        </div>
      </div>
      
    </div>
      <div class="w3-col m1">
          <br>
      </div>
    <div class="w3-col m9">
          
      <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
        <input type="file" id="fileid" name="image" accept="image/*" capture="environment">
      </div>
      <br>
      
      <div id="mydiv" class="w3-card w3-round w3-white w3-padding-32 w3-center" style="padding: 10px! important;">
        <canvas id="mycanvas" style="display: block; width: 100%"></canvas>
      </div>
     <br>
      <button class="w3-button w3-block w3-round-xxlarge w3-green w3-ripple" id="send" name="send" onclick="sendbtn()" style="margin-bottom: 10px;">Send</button> 
        
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <div class="w3-row" id="pc">
    <div class="w3-col m2">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <p class="w3-center"><img src="https://www.w3schools.com/w3images/avatar3.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i>Name: <?php echo $_SESSION['Username'] ?> </p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> Class: <?php echo $_SESSION['Class'] ?> </p>
<!--         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p>-->
        </div>
      </div>
    </div>
      <div class="w3-col m1">
          <br>
      </div>
    <div class="w3-col m9">
      <div id="videodiv" class="w3-card w3-round w3-white w3-padding-32 w3-center" style="height: 85%; padding: 10px! important;">
          <video id="v" style="display: block; width: 100%; height: 85%"></video>
          <button class="w3-button w3-round-xxlarge w3-green w3-ripple" id="take" style="margin-top:10px;">Take a photo</button>
      </div>
      <br>
      <div id="piccanvas" class="w3-card w3-round w3-white w3-padding-32 w3-center" style=" height: 85%; padding: 10px! important; display: none;">
        <button class="w3-button w3-round-xxlarge w3-green w3-ripple" id="retake" style="margin-bottom: 10px;">Retake</button>
        <canvas id="imgtaken" style="display: block; margin: auto; height: 85%"></canvas>
       <br>
        <button class="w3-button w3-block w3-round-xxlarge w3-green w3-ripple" id="send" name="send" onclick="sendbtn()" style="margin-bottom: 10px;">Send</button> 
        
      </div>    
<!--
<div id="succesfile" class="w3-modal" style="display:none;">
	<div class="w3-modal-content">
      <div class="w3-container" style="text-align:center;">
        <span onclick="document.getElementById('succesfile').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <p><img src="img/Success.png"></p>
        <p id="successmsg">File Uploaded Successfully.</p>
      </div>
    </div>
  </div> 
-->
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
<div class="w3-light-grey w3-round-xlarge">
					<div id="myBar" class="w3-container w3-blue w3-round-xlarge" style="width:0%; display:block;">0%</div>
</div>
<div id="succesfile" class="w3-modal" style="display:none;">
	<div class="w3-modal-content">
      <div class="w3-container" style="text-align:center;">
        <span onclick="document.getElementById('succesfile').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <p><img src="img/Success.png"></p>
        <p id="successmsg">File Uploaded Successfully.</p>
      </div>
    </div>
  </div> 
<!-- End Page Container -->
</div>
<br>

<!-- Footer 
<footer class="w3-container w3-theme-d3 w3-padding-16">
  <h5>Footer</h5>
</footer>

<footer class="w3-container w3-theme-d5">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>
   --> 
 <script>
    var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};
     if(isMobile.any()) {
   //some code...
         document.getElementById('mobile').style.display='block';
         document.getElementById('pc').style.display='none';
        // alert("mobile version");
//          document.getElementById('mobile').style.display='none';
//         document.getElementById('pc').style.display='block';
     }
     else
     {
        document.getElementById('mobile').style.display='none';
         document.getElementById('pc').style.display='block';
         //alert("pc version");
      }
     
     
     function sendtoserver(mphoto,addedby,cls)
     {
         var time = new Date();
         var today = new Date();
         var hh = time.getHours();
         var mm = time.getMinutes();
         var ss = time.getSeconds();
         var dd = today.getDate();
	     var mm = today.getMonth()+1; //January is 0!

	       var yyyy = today.getFullYear();
	 if(dd<10){
		dd='0'+dd;
	 } 
	 if(mm<10){
		mm='0'+mm;
	 } 
	 var today = dd+mm+yyyy;
     var addedon = dd+mm+yyyy;     
         var fname = today+"-"+hh+"-"+mm+"-"+ss;
        
     var formdata = new FormData();
	 formdata.append("fileToUpload",mphoto);
	 formdata.append("name",fname);
     formdata.append("class",cls);
     formdata.append("addedon",addedon);  
     formdata.append("addedby",addedby);  
         
        console.log(fname+" "+cls+" "+addedon+" "+addedby);
       // " "+$addedby+" "+$addedon
//      $.ajax({
//        method: 'POST',
//        url: 'photo_upload.php',
//          data: {
//            photo: mphoto,
//            name:fname    
//            }
//        });   
     var ajax = new XMLHttpRequest();
	 ajax.upload.addEventListener("progress", progressHandler, false);
	 ajax.addEventListener("load", completeHandler, false);
	 //ajax.addEventListener("error", errorHandler, false);
	 //ajax.addEventListener("abort", abortHandler, false);
	 ajax.open("POST","photo_upload.php");
	 ajax.send(formdata);
     }
     
     function progressHandler(event)
 {
	 var elem = document.getElementById("myBar");
	 var prog = (event.loaded / event.total)*100;
	 elem.style.width = Math.round(prog) + '%'; 
     elem.innerHTML = Math.round(prog) * 1  + '%';
 }
 function completeHandler(event)
 {
	 alert(event.target.responseText);
	 var prog = 0;
	  var elem = document.getElementById("myBar");
	 elem.style.width = Math.round(prog) + '%'; 
     elem.innerHTML = Math.round(prog) * 1  + '%';
	 $("#id01").hide();
	 $("#succesfile").show();
	 $("#successmsg").html(event.target.responseText);
	 
 }
     
</script>
<script>
        var input = document.querySelector('input[type=file]'); // see Example 4
        input.onchange = function () {
            var file = input.files[0];
           // alert("Recieved");
            drawOnCanvas(file); 
            update();
        }
    
</script>    
<script>
 function sendbtn()
     {
         console.log("clicked btn");
         //alert("clicked btn");
      if(isMobile.any())
       {
           var canvas = document.getElementById('mycanvas');
            var photo = canvas.toDataURL('image/jpeg', 1.0);
             var addedby = document.getElementById('username').value;;
            var cls = document.getElementById('uclass').value;;
            console.log("inside canvas conversion");
            console.log(cls+" "+addedby);
            sendtoserver(photo,addedby,cls);
      }
    else
     {
            var canvas = document.getElementById('imgtaken');
            var photo = canvas.toDataURL('image/jpeg', 1.0);
             var addedby = document.getElementById('username').value;;
            var cls = document.getElementById('uclass').value;;
            console.log("inside canvas conversion");
            console.log(cls+" "+addedby);
            sendtoserver(photo,addedby,cls);
         }
     }
</script>    
<script>
    function update() {
    var canvasNode = document.getElementById('mycanvas');
    var div = document.getElementById('mydiv');
    //canvas.style.width = '100%';
    //canvasNode.height = div.clientHeight;
}
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
    
function drawOnCanvas(file) {
  var reader = new FileReader();

  reader.onload = function (e) {
    var dataURL = e.target.result,
        c = document.querySelector('canvas'), // see Example 4
        ctx = c.getContext('2d'),
        img = new Image();

    img.onload = function() {
      c.width = img.width;
      c.height = img.height;
      ctx.drawImage(img, 0, 0);
    };

    img.src = dataURL;
  };

  reader.readAsDataURL(file);
}

</script>
<script>
    ;(function(){
        if(!isMobile.any())
            {
        function userMedia(){
            return navigator.getUserMedia = navigator.getUserMedia ||
            navigator.webkitGetUserMedia ||
            navigator.mozGetUserMedia ||
            navigator.msGetUserMedia || null;

        }
            }
                
        // Now we can use it
        if( userMedia() ){
            var videoPlaying = false;
            var constraints = {
                video: true,
                audio:false
            };
            var video = document.getElementById('v');

            var media = navigator.getUserMedia(constraints, function(stream){

                // URL Object is different in WebKit
                var url = window.URL || window.webkitURL;

                // create the url and set the source of the video element
                video.src = url ? url.createObjectURL(stream) : stream;

                // Start the video
                video.play();
                videoPlaying  = true;
            }, function(error){
                console.log("ERROR");
                console.log(error);
                document.getElementById('take').innerHTML= error;
                
            });


            // Listen for user click on the "take a photo" button
            document.getElementById('take').addEventListener('click', function(){
                if (videoPlaying){
                    var canvas = document.getElementById('imgtaken');
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    canvas.getContext('2d').drawImage(video, 0, 0);
                    var data = canvas.toDataURL('image/jpeg');
                    //document.getElementById('photo').setAttribute('src', data);
                   // drawOnCanvas(data);
                  //  document.getElementById('take').innerHTML="Retake Photo";
                    document.getElementById('videodiv').style.display='none';
                    document.getElementById('piccanvas').style.display='block';
                }
            }, false);

            document.getElementById('retake').addEventListener('click',function(){
                document.getElementById('videodiv').style.display='block';
                document.getElementById('piccanvas').style.display='none';
            });

        } else {
            console.log("KO");
        }
    })();
</script>
</body>
</html>	