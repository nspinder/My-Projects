<!DOCTYPE html>
   <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Contact Us</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
        
        <style>
            body{
    font-family: Arvo, serif;    
    background-size: cover; 
}

.jumbotron{
    background-color:transparent;
    text-align: center;
    margin-top:20px;
    letter-spacing:2.5px;
    padding-top:100px;
}

.featured a{
    background: rgba(0, 0, 0, .5);
}

.nav li{
    color: #fff;
    font-size:17px;
    margin-right: 35px;
    padding: 10px 0;    
}

.nav li:hover{
    border-bottom:3px solid #00FFB8;
    padding-bottom:7px;
    cursor:pointer;
}

#companyLogo{
    background: #00FFB8;
    color:white;
    margin-top:10px;
    margin-right:35px;
}

.featured{
    text-align:center;
}
}

.bodyimage{
    height:100px;
}
.col-md-4{
    text-align:center;
    color:white;
}
.icons p{
    font-size:15px;
}

.container{
    max-width:1000px;
}
.contactForm{
    border: 1px solid black;
    margin-top: 100px;
    padding-top:50px;
    border-radius:15px;
}
.footer{
    background-color:rgba(0, 0, 0, 0.5);
    color:grey;
    font-size:15px;
    padding:10px 0;
    margin-top:290px;
}

#aboutUsButton, #productsButton, #contactUsButton{
    background-color:transparent;
    color:white;
    border:none;
}
#aboutUsButton:hover, #productsButton:hover, #contactUsButton:hover{
    color:#00FFB8;
}

@media (max-width:768px){
    .bodyimage{
        height:70px;
    }
}
        </style>
    </head>
    <body>
       <div class="container-fluid">
            <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
               <div class="navbar-header">
                   <a id="companyLogo" class="navbar-brand navbar-left" href="index.html">SS</a>
                   <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                      <span class="sr-only">Toggle navigation</span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                   </button>
               </div>
               <div class="navbar-collapse collapse" id="navbarCollapse">
                   <ul class="nav navbar-nav">
                       <li class="active"><a href="index.html">Home</a></li>
                       <li class="active"><a href="products.html">Products</a></li>
                       <li class="active"><a href="aboutUs.html">About Us</a></li>
                       <li class="active"><a href="contactUs.php">Contact Us</a></li>
                       <li class="active"><a href="ourGuarantee.html">Our Guarantee</a></li>
                   </ul>
                    
               </div> 
           </nav>
           
           <div class="row">
               <div class="col-sm-offset-1 col-sm-10 contactForm">
                   <h1>Contact Us:</h1>
                        <?php
                        //get user input
                        $name = $_POST["name"];
                        $email = $_POST["email"];
                        $message = $_POST["message"];
                        //error messages
                        $missingName = '<p><strong>Please enter your name.</strong></p>';
                        $missingEmail = '<p><strong>Please enter your Email Address.</strong></p>';
                        $invalidEmail = '<p><strong>Please enter a valid Email Address.</strong></p>';
                        $missingMessage = '<p><strong>Please enter a message.</strong></p>';
                    
                    
                            //if user has submitted form
                            if($_POST["send"]){
                                //check for any errors
                                if(!$name){
                                    $errors .= $missingName;
                                }else{
                                    $name = filter_var($name, FILTER_SANITIZE_STRING);
                                }
                                if(!$email){
                                    $errors .= $missingEmail;
                                }else{
                                    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                        $errors .= $invalidEmail;
                                    };
                                }
                                if(!$message){
                                    $errors .= $missingMessage;
                                }else{
                                    $message = filter_var($message, FILTER_SANITIZE_STRING);
                                }
                                    //if there are errors
                                    if($errors){
                                        //print error message
                                        $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
                                        //if no errors
                                    }else{
                                        //send email
                                        $to = "sulsealvedacoes@live.com";
                                        $subject = "Contact";
                                        $message = "
                                        <p>Name: $name.</p>
                                        <p>Email: $email.</p>
                                        <p>Message:</p>
                                        <p><strong>$message</strong></p>";
                                        $headers = "Content-type: text/html";
                                        //if successful
                                        if(mail($to, $subject, $message, $headers)){
                                            //redirect user to thank you page
                                            header("Location: thanks.html");
                                        }else{
                                            //if not successful
                                                //print warning message
                                            $resultMessage = '<div class="alert alert-warning">Unable to send email. Please try again later.</div>';
                                        }
                                    }
                                                
                            //print result message
                            echo $resultMessage;
                            }
                        ?>
                   <?php
                   ob_flush();
                   ?>
                   <form action="contactUs.php" method="post">
                       <div class="form-group">
                          <label for="name">Name:</label>
                           <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="<?php echo $_POST["name"]; ?>">
                       </div>
                       <div class="form-group">
                          <label for="email">Email:</label>
                           <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="<?php echo $_POST["email"]; ?>">
                       </div>
                       <div class="form-group">
                          <label for="message">Message:</label>
                           <textarea name="message" id="message" class="form-control" rows="5"><?php echo $_POST["message"]; ?></textarea>
                       </div>
                       <input style ="margin-bottom: 10px" type="submit" name="send" class="btn btn-success btn-lg" value="Send Message" href="thankyoumessage.php">
                   </form>
               </div>
           </div>
       </div>
       
    </body>
</html>