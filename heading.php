test pemasukan code baru
test pemasukan code baru
test pemasukan code baru
test pemasukan code baru
test pemasukan code baru
<style>
    .nav > li > a {
        padding: 7px 10px;
    }
</style>
<div class="leftpanel">

    <div class="logopanel">
        <h1><span>[</span> IManage <span>]</span></h1>
    </div><!-- logopanel -->

    <div class="leftpanelinner">    

        <!-- This is only visible to small devices -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">   
            <div class="media userlogged">
                <img alt="" src="images/photos/loggeduser.png" class="media-object">
                <div class="media-body">
                    <h4>John Doe</h4>
                    <span>"Life is so..."</span>
                </div>
            </div>

            <h5 class="sidebartitle actitle">Account</h5>
            <ul class="nav nav-pills nav-stacked nav-bracket mb30">
                <li><a href="profile.html"><i class="fa fa-user"></i> <span>Profile</span></a></li>
                <li><a href=""><i class="fa fa-cog"></i> <span>Account Settings</span></a></li>
                <li><a href=""><i class="fa fa-question-circle"></i> <span>Help</span></a></li>
                <li><a href="signout.html"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
            </ul>
        </div>

        <h5 class="sidebartitle">Navigation</h5>
        <ul class="nav nav-pills nav-stacked nav-bracket">
            <?php
            $homeactive = "";
            if (!isset($nav) && !isset($nav_sub)) {
                $nav = "";
                $nav_sub = "";
            }
            if ($nav == "Dashboard") {
                $homeactive = "active";
            }
            ?>
            <li class="<?php echo $homeactive; ?>"><a href="<?php echo base_url(); ?>Account"><i class="fa fa-dashboard" style='margin-top:-3px'></i> <span>Dashboard</span></a></li>
            <?php
            $query = mysql_query("select * from z_module where parent=''");
            while ($row = mysql_fetch_array($query)) {
                if ($_SESSION['level'] == 2)
                    $querydalem = mysql_query("select * from z_module where parent='" . $row['title'] . "'");
                else
                    $querydalem = mysql_query("select * from z_module where parent='" . $row['title'] . "' and master=0");
                if (mysql_num_rows($querydalem) > 0) {
                    $valid = false;
                    while ($rowdalem = mysql_fetch_array($querydalem)) {
                        foreach (explode("~", $_SESSION['access']) as $a) {
                            if ($a == $rowdalem['id']) {
                                $valid = true;
                            }
                        }
                    }
                    if ($_SESSION['level'] == 2) {
                        $valid = true;
                    }
                    if ($valid == true) {
                        $classnavactive = "";
                        $classactive = "";
                        $classblock = "";
                        if ($nav == $row['title']) {
                            $classnavactive = "nav-active";
                            $classactive = "active";
                            $classblock = "display:block";
                        }
                        ?>
                        <li class="nav-parent <?php echo $classnavactive . " " . $classactive; ?>"><a href=""><i class="<?php echo $row['title_icon'] ?>" style='margin-top:-3px'></i> <span><?php echo $row['title'] ?></span></a>
                            <ul class="children" style='<?php echo $classblock ?>'>
                                <?php
                                if ($_SESSION['level'] == 2)
                                    $querydalem = mysql_query("select * from z_module where parent='" . $row['title'] . "'");
                                else
                                    $querydalem = mysql_query("select * from z_module where parent='" . $row['title'] . "' and master=0");

                                while ($rowdalem = mysql_fetch_array($querydalem)) {
                                    $valid = false;
                                    foreach (explode("~", $_SESSION['access']) as $a) {
                                        if ($a == $rowdalem['id']) {
                                            $valid = true;
                                        }
                                    }
                                    if ($_SESSION['level'] == 2) {
                                        $valid = true;
                                    }
                                    if ($valid == true) {
                                        $classactive = "";
                                        if ($nav == $row['title'] && $nav_sub == $rowdalem['subtitle']) {
                                            $classactive = "active";
                                        }
                                        ?>
                                        <li class='<?php echo $classactive ?>'><a href="<?php echo $rowdalem['link'] ?>"><i class="fa fa-caret-right"></i> <?php echo $rowdalem['subtitle'] ?></a></li>
                                        <?php
                                    }
                                }
                                ?>                                                        
                            </ul>
                        </li>
                        <?php
                    }
                } else {
                    $valid = false;
                    foreach (explode("~", $_SESSION['access']) as $a) {
                        if ($a == $row['id']) {
                            $valid = true;
                        }
                    }
                    if ($_SESSION['level'] == 2) {
                        $valid = true;
                    }
                    if ($valid == true) {
                        $classactive = "";
                        if ($nav == $row['title']) {
                            $classactive = "active";
                        }
                        ?>
                        <li class='<?php echo $classactive ?>'><a href="<?php echo $row['link'] ?>"><i class="<?php echo $row['title_icon'] ?>" style='margin-top:-3px'></i> <span><?php echo $row['title'] ?></span></a></li>
                        <?php
                    }
                }
            }
            $modulename = $nav . " " . $nav_sub
            ?>
        </ul>

        <!--        <div class="infosummary">
                    <h5 class="sidebartitle">Information Summary</h5>    
                    <ul>
                        <li>
                            <div class="datainfo">
                                <span class="text-muted">Daily Traffic</span>
                                <h4>630, 201</h4>
                            </div>
                            <div id="sidebar-chart" class="chart"></div>   
                        </li>
                        <li>
                            <div class="datainfo">
                                <span class="text-muted">Average Users</span>
                                <h4>1, 332, 801</h4>
                            </div>
                            <div id="sidebar-chart2" class="chart"></div>   
                        </li>
                        <li>
                            <div class="datainfo">
                                <span class="text-muted">Disk Usage</span>
                                <h4>82.2%</h4>
                            </div>
                            <div id="sidebar-chart3" class="chart"></div>   
                        </li>
                        <li>
                            <div class="datainfo">
                                <span class="text-muted">CPU Usage</span>
                                <h4>140.05 - 32</h4>
                            </div>
                            <div id="sidebar-chart4" class="chart"></div>   
                        </li>
                        <li>
                            <div class="datainfo">
                                <span class="text-muted">Memory Usage</span>
                                <h4>32.2%</h4>
                            </div>
                            <div id="sidebar-chart5" class="chart"></div>   
                        </li>
                    </ul>
                </div> infosummary -->

    </div><!-- leftpanelinner -->
</div><!-- leftpanel -->
<div class="mainpanel">

    <div class="headerbar">

        <a class="menutoggle"><i class="fa fa-bars"></i></a>

        <!--        <form class="searchform" action="index.html" method="post">
                    <input type="text" class="form-control" name="keyword" placeholder="Search here..." />
                </form>-->

        <div class="header-right">
            <ul class="headermenu">
                <!--                <li>
                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
                                            <i class="glyphicon glyphicon-user"></i>
                                            <span class="badge">2</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-head pull-right">
                                            <h5 class="title">2 Newly Registered Users</h5>
                                            <ul class="dropdown-list user-list">
                                                <li class="new">
                                                    <div class="thumb"><a href=""><img src="images/photos/user1.png" alt="" /></a></div>
                                                    <div class="desc">
                                                        <h5><a href="">Draniem Daamul (@draniem)</a> <span class="badge badge-success">new</span></h5>
                                                    </div>
                                                </li>
                                                <li class="new">
                                                    <div class="thumb"><a href=""><img src="images/photos/user2.png" alt="" /></a></div>
                                                    <div class="desc">
                                                        <h5><a href="">Zaham Sindilmaca (@zaham)</a> <span class="badge badge-success">new</span></h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="thumb"><a href=""><img src="images/photos/user3.png" alt="" /></a></div>
                                                    <div class="desc">
                                                        <h5><a href="">Weno Carasbong (@wenocar)</a></h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="thumb"><a href=""><img src="images/photos/user4.png" alt="" /></a></div>
                                                    <div class="desc">
                                                        <h5><a href="">Nusja Nawancali (@nusja)</a></h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="thumb"><a href=""><img src="images/photos/user5.png" alt="" /></a></div>
                                                    <div class="desc">
                                                        <h5><a href="">Lane Kitmari (@lane_kitmare)</a></h5>
                                                    </div>
                                                </li>
                                                <li class="new"><a href="">See All Users</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
                                            <i class="glyphicon glyphicon-envelope"></i>
                                            <span class="badge">1</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-head pull-right">
                                            <h5 class="title">You Have 1 New Message</h5>
                                            <ul class="dropdown-list gen-list">
                                                <li class="new">
                                                    <a href="">
                                                        <span class="thumb"><img src="images/photos/user1.png" alt="" /></span>
                                                        <span class="desc">
                                                            <span class="name">Draniem Daamul <span class="badge badge-success">new</span></span>
                                                            <span class="msg">Lorem ipsum dolor sit amet...</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <span class="thumb"><img src="images/photos/user2.png" alt="" /></span>
                                                        <span class="desc">
                                                            <span class="name">Nusja Nawancali</span>
                                                            <span class="msg">Lorem ipsum dolor sit amet...</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <span class="thumb"><img src="images/photos/user3.png" alt="" /></span>
                                                        <span class="desc">
                                                            <span class="name">Weno Carasbong</span>
                                                            <span class="msg">Lorem ipsum dolor sit amet...</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <span class="thumb"><img src="images/photos/user4.png" alt="" /></span>
                                                        <span class="desc">
                                                            <span class="name">Zaham Sindilmaca</span>
                                                            <span class="msg">Lorem ipsum dolor sit amet...</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <span class="thumb"><img src="images/photos/user5.png" alt="" /></span>
                                                        <span class="desc">
                                                            <span class="name">Veno Leongal</span>
                                                            <span class="msg">Lorem ipsum dolor sit amet...</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="new"><a href="">Read All Messages</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="btn-group">
                                        <button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
                                            <i class="glyphicon glyphicon-globe"></i>
                                            <span class="badge">5</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-head pull-right">
                                            <h5 class="title">You Have 5 New Notifications</h5>
                                            <ul class="dropdown-list gen-list">
                                                <li class="new">
                                                    <a href="">
                                                        <span class="thumb"><img src="images/photos/user4.png" alt="" /></span>
                                                        <span class="desc">
                                                            <span class="name">Zaham Sindilmaca <span class="badge badge-success">new</span></span>
                                                            <span class="msg">is now following you</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="new">
                                                    <a href="">
                                                        <span class="thumb"><img src="images/photos/user5.png" alt="" /></span>
                                                        <span class="desc">
                                                            <span class="name">Weno Carasbong <span class="badge badge-success">new</span></span>
                                                            <span class="msg">is now following you</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="new">
                                                    <a href="">
                                                        <span class="thumb"><img src="images/photos/user3.png" alt="" /></span>
                                                        <span class="desc">
                                                            <span class="name">Veno Leongal <span class="badge badge-success">new</span></span>
                                                            <span class="msg">likes your recent status</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="new">
                                                    <a href="">
                                                        <span class="thumb"><img src="images/photos/user3.png" alt="" /></span>
                                                        <span class="desc">
                                                            <span class="name">Nusja Nawancali <span class="badge badge-success">new</span></span>
                                                            <span class="msg">downloaded your work</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="new">
                                                    <a href="">
                                                        <span class="thumb"><img src="images/photos/user3.png" alt="" /></span>
                                                        <span class="desc">
                                                            <span class="name">Nusja Nawancali <span class="badge badge-success">new</span></span>
                                                            <span class="msg">send you 2 messages</span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="new"><a href="">See All Notifications</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>-->
                <li>
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="height:50px">
<!--                            <img src="images/photos/loggeduser.png" alt="" />-->
                            <?php
                            $querybranch = mysql_query("select * from tenant where id='" . $_SESSION['tenant'] . "'");
                            $resultbranch = mysql_fetch_array($querybranch);
                            echo $_SESSION['name'] . " - " . $resultbranch['name'];
                            ?>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
<!--                            <li><a href="profile.html"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>-->
                            <?php
                            if ($_SESSION['level'] == 2) {
                                $querybranch = mysql_query("select * from tenant order by name");
                                while ($rowbranch = mysql_fetch_array($querybranch)) {
                                    ?>
                                    <li>
                                        <a style="padding: 0">
                                            <form method='post' action='Fungsi/changesession' style="display: block">
                                                <input type='hidden' name='url' value='<?php echo current_url() ?>'>
                                                <input type='hidden' name='session' value='<?php echo "tenant" ?>'>
                                                <input type='hidden' name='value' value='<?php echo $rowbranch['id'] ?>'>                                        
                                                <button style="background: none;border: none;display: block;width: 100%;text-align: left;padding: 7px 10px;">
                                                    <i class="glyphicon glyphicon-home"></i> <?php echo $rowbranch['name'] ?>
                                                </button>
                                            </form>
                                        </a>
                                    </li>

                                    <?php
                                }
                                ?>                                
                            <?php } ?>
<!--                            <li>
                                <a style="padding: 0">
                                    <form method='post' action='Fungsi/changesession' style="display: block">
                                        <input type='hidden' name='url' value='<?php echo current_url() ?>'>
                                        <input type='hidden' name='session' value='<?php echo "level" ?>'>
                                        <input type='hidden' name='value' value='2'>                                        
                                        <button style="background: none;border: none;display: block;width: 100%;text-align: left;padding: 7px 10px;">
                                            <i class="glyphicon glyphicon-user"></i> Admin
                                        </button>
                                    </form>
                                </a>
                            </li>
                            <li>
                                <a style="padding: 0">
                                    <form method='post' action='Fungsi/changesession' style="display: block">
                                        <input type='hidden' name='url' value='<?php echo current_url() ?>'>
                                        <input type='hidden' name='session' value='<?php echo "level" ?>'>
                                        <input type='hidden' name='value' value='1'>                                        
                                        <button style="background: none;border: none;display: block;width: 100%;text-align: left;padding: 7px 10px;">
                                            <i class="glyphicon glyphicon-user"></i> User
                                        </button>
                                    </form>
                                </a>
                            </li>-->
<!--                            <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
<li><a href="#"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>-->
                            <li><a href="Logout"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                        </ul>
                    </div>
                </li>
                <!--                <li>
                                    <button id="chatview" class="btn btn-default tp-icon chat-icon">
                                        <i class="glyphicon glyphicon-comment"></i>
                                    </button>
                                </li>-->
            </ul>
        </div><!-- header-right -->

    </div><!-- headerbar -->

    <div class="pageheader">        
        <h2><i class="<?php echo $nav_icon ?>"></i> <?php echo $modulename ?> <span> <?php echo $nav_sub_desc ?></span></h2>
        <div class="breadcrumb-wrapper">
            <span class="label">You are here:</span>
            <ol class="breadcrumb">
                <li><a href="<?php echo $link ?>"><?php echo $nav ?></a></li>
                <li class="active"><?php echo $nav_sub ?></li>
            </ol>
        </div>
    </div>