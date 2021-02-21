<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design/index_style.css">
    <link rel="stylesheet" href="design/register_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="script/request.js"></script>
    
</head>
<body>
    
    <img class="pup" src="image/pup1.jpg">
    <div class="container">
        <div class="img">
            <img src="image/booking.svg">
        </div>
        <div class="login-container">
            <form id="log_form">
                <img class="pro" src="image/profile.svg">
                <h2>Welcome PUPian!</h2>
                <div class="input-div one ">
                    <div class="i">
                        <i class="fas fa-user">
                        </i>
                    </div>
                    <div>
                        <h5>Username</h5>
                        <input class="input" type="text" name="Username">
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-lock">
                        </i>
                    </div>
                    <div>
                        <h5>Password</h5>
                        <input class="input" type="password" name="Password" >
                    </div>
                </div>
                    <a class="forgetpass">forget password?</a>
                    <select class="select2" name="AccountType" id="log_acctype">
                        <option value=""disabled selected>USERTYPE</option>
                        <option value="faculty">FACULTY</option>
                        <option value="student">STUDENT</option>
                    </select>
                    <button id="login" class="btn" > login </button> <br>                    
                    <a href="#" class="btn" id="modalBtn"> Register</a>   
            </form>
            
                 
              
        </div> 
    </div>
    <div class="modal" id="simplePrompt">
        <div class="modal-content">
            <div class="modal-header">
                <h5>CHANGE PASSWORD:</h5>
            </div>
            <div class="modal-body">
                <form id="changepass_form">
                    
                    <h5>Enter Email:</h5>
                    <input name="Email" type="email" id="emailAdd">
                    <h5>Enter Username:</h5>
                    <input name="UserID" type="text" id="userID">
                    <select name="AccountType" class="select" id="changepass_acctype">
                            <option value="" disabled selected>USERTYPE</option>
                            <option value="faculty">FACULTY</option>
                            <option value="student">STUDENT</option>
                    </select>
                    
                </form>
                <button class="buttonreg" id="changepass">Send</button>
            </div>
        
        </div>
    </div>

<!-- Code for register ui -->
    <div id="simpleModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
            <span class="closeBtn">&times;</span>
            <h2>Create Account</h2>
           </div>
           <div class="modal-body">
                <form id="reg_form">  
                        <select name="AccountType" class="select" id="reg_acctype">
                            <option value="" disabled selected>USERTYPE</option>
                            <option value="faculty">FACULTY</option>
                            <option value="student">STUDENT</option>
                        </select>
                        <div>
                            <h5>Email Address:</h5>
                           <input name="EmailAddress" type="email" class="username"> 
                        </div>
                       <div>
                           <h5>Username:</h5>
                           <input name="Username" type="text" class="username">
                       </div>
                       <div>
                           <h5>Last Name:</h5>
                           <input name="Lastname" type="text" class="lastname">
                       </div>
                       <div>
                           <h5>First Name:</h5>
                           <input name="Firstname" type="text" class="firstname">
                       </div>
                       <div>
                           <h5>Middle Name:</h5>
                           <input name="Middlename" type="text" class="middlename">
                       </div>
                       <div>
                           <h5>Password:</h5>
                           <input name="Password" type="password" class="pass">
                       </div>
                        <div>
                            <select name="Course" class="select">
                            
                            </select>
                        </div>
                        <div>
                                <h5>YEAR:</h5>
                                <select name="Year" class="select">

                                </select>
                        </div>
                       <div>

                           <h5>Birthday:</h5>
                           <input type="date" id="birthday" name="Birthday">
                       </div>
                       <div>
                        
                       </div>
                                    <div class="modal-footer">
                            <button id="submit" class="btnSubmit"> SUBMIT  </button>
                            <input type="reset" value="RESET" class="reset">
                        </div>
                        
                       </form>
                       <label id="reg_errormsg"></label> 
           </div>
              
        </div>
       </div>
       <script type="text/javascript" src="script/index.js"></script>
        <script type="text/javascript"  src="script/register_modal.js"></script>
    
      
</body>
</html>