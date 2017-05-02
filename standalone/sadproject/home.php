<?php
session_start();

             if(isset($_SESSION['id'])){
              $username=($_SESSION['username']);
              $userId=($_SESSION['id']);
            }
            else{
              header("Location:login.php");
            }

 $pagetitle="Home Page";
 include "includes/header.php";
      include "includes/slider.php";
      ?>
        <div class="templatemo-welcome" id="templatemo-welcome">
            <div class="container">
                <div class="templatemo-slogan text-center">
                    <span class="txt_darkgrey">Welcome to </span><span class="txt_orange">Home Page</span>
                    <p class="txt_slogan">
                </div>	
            </div>
        </div>   
        

    <div id="templatemo-blog">
            <div class="container">
                <div class="row">
                 <?php include "includes/sidebar.php";?>
                <div class="blog_box">
                    <div class="col-sm-5 col-md-6 blog_post">
                        <ul class="list-inline">
                        <li>    
                        <div class="clearfix"> </div>
                        <p class="blog_text">
                            The college was established in year 1967 for providing technical manpower initially in the fields of Civil Engineering, Mechanical Engineering and Electrical Engineering. Since then the college has continuously evolved to meet the changes in the field of Engineering. Undergraduate Courses in Electronics and Telecommunication Engineering, Computer Engineering, Information Technology and Mining Engineering besides Five postgraduate courses in the fields of Foundation Engineering, Industrial Engineering, Electronics Communication & Instrumentation Engineering, Microelectronics Engineering, and Power & Energy Engineering Introduced. The College is offering full time as well as part-time post graduate courses. The college is approved by All India Council for Technical Education (AICTE) and is funded by Government of Goa. All the courses offered by the college presently affiliated to Goa University. 

                            The college has revised and updated the course contents and Laboratory equipments from time to time to keep pace with the changes in technology and in meeting the growing needs of the industry. In this regard various schemes have been in operation over the years, the requisite funding has been obtained from both state and central government agencies.</p>
                            </li>
                        </ul>
                    </div> <!-- /.blog_post 1 --> 
                </div>
              </div>
           </div>
    </div>
