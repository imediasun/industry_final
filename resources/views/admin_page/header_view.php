
<!--NAVBAR-->
<!--===================================================-->
<header id="navbar">
    <div id="navbar-container" class="boxed">

        <!--Brand logo & name-->
        <!--================================-->
        <div class="navbar-header">
            <a href="index.html" style="" class="navbar-brand">
                <div style="margin-top:25px" class="brand-title"> 
                <span class="brand-text">UKRAINIAN INDUSTRY</span> </div>
                <div class="brand-title"> <span class="brand-text">PLATFORM</span> </div>
                <div class="brand-title"> <span class="brand-text">MCV</span> </div>
                <div  class="brand-title"> <span style="font-size:19px;" class="brand-text">Українська промислова платформа</span> </div>
            </a>
        </div>
        <!--================================-->
        <!--End brand logo & name-->

        <!--Navbar Dropdown-->
        <!--================================-->
        <div class="navbar-content clearfix">
            <ul style="position:relative;left:-40px;top:25px" class="nav navbar-top-links pull-right">

                <!--Messages Dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End message dropdown-->

                <!--Notification dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End notifications dropdown-->
                <!--Messages Dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


            </ul>
            <!--Navigation logo slider-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->





            <ul style="top:150px;position:absolute;left:110px" class=" nav navbar-top-links pull-left">

                
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End message dropdown-->
                <li style="position:relative;left:23px;">
                    
                    <div  style="position:relative;margin-left:-20px;width:550px" class="brand-title"> <span style="position:relative;left:-20px;font-size:19px;display:inline-block;float:left" class="brand-text">МИ В СОЦІАЛЬНИХ МЕРЕЖАХ      </span> 
                    <a style="display:inline-block;float:left" class="btn btn-social-icon btn-twitter">
                        <span class="fa fa-twitter"></span>
                     </a>
                     <a style="display:inline-block;float:left" class="btn btn-social-icon btn-facebook">
                        <span class="fa fa-facebook"></span>
                     </a>
                     <a style="display:inline-block;float:left" class="btn btn-social-icon btn-google">
                        <span class="fa fa-google"></span>
                     </a>
                     <a style="display:inline-block;float:left" class="btn btn-social-icon btn-pinterest">
                        <span class="fa fa-pinterest"></span>
                     </a>
                     <a style="display:inline-block;float:left" class="btn btn-social-icon btn-vk">
                        <span class="fa fa-vk"></span>
                     </a>
                     <a style="display:inline-block;float:left" class="btn btn-social-icon btn-linkedin">
                        <span class="fa fa-linkedin"></span>
                     </a></div>
                </li>


            </ul>
            <!--Navigation logo slider-->
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->





















            <ul style="margin-top:40px"class="nav navbar-top-links pull-right">

                

                <!--Language selector-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
               
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End language selector-->

                <!--User dropdown-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li id="dropdown-user" style="margin-left:5px;" class=".face_btn_ btn-facebook dropdown">

                    <?php if(Auth::user()->name){
                      ?>
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                            <div style="color:#fff" class="username hidden-xs"><?php echo Auth::user()->name?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right with-arrow">

                            <!-- User dropdown menu -->
                            <ul class="head-list">
                                <li>
                                    <a href="#"> <i class="fa fa-user fa-fw fa-lg"></i> Особистий кабінет </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="fa fa-envelope fa-fw fa-lg"></i> Повідомлення </a>
                                </li>

                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Вийти
                                    </a>

                                    <form id="logout-form" action="<?php echo url('/logout') ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field() ?>
                                    </form>
                                </li>
                            </ul>
                        </div>

                      <?

                    }?>


                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End user dropdown-->

                <!--Navigation toogle button-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="tgl-menu-btn">
                    <a id="demo-toggle-aside" class="shortcut-grid" href="#"> <i class="fa fa-dedent"></i> </a>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End Navigation toogle button-->

            </ul>
        </div>
        <!--================================-->
        <!--End Navbar Dropdown-->

    </div>
</header>
<!--===================================================-->
<!--END NAVBAR-->