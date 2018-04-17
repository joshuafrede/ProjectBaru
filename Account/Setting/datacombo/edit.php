<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include(APPPATH . "/views/head.php") ?>
    </head>

    <body>
        <!-- Preloader -->
        <div id="preloader">
            <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
        </div>

        <section>           

            <?php include(APPPATH . "/views/heading.php") ?>            
            <div class="contentpanel">

                <div class="row">                                       
                    <div class="col-sm-12">

                        <?php
                        if (isset($status)) {
                            if ($status == "Success") {
                                ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong>Update Success</strong> Please continue</a>.
                                </div>
                                <?php
                            } else if ($status == "Failed") {
                                ?>
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong>Update Failed</strong> Please re-type your input or contact the administrator</a>.
                                </div>
                                <?php
                            }
                        }
                        ?>                        
                        <div class="panel panel-dark">
                            <div class="panel-heading">
                                <!--                                <div class="panel-btns">
                                                                    <a href="" class="panel-close">×</a>
                                                                    <a href="" class="minimize">−</a>
                                                                </div> panel-btns -->
                                <a class="btn btn-info pull-left btn-xs" href='<?php echo $link ?>' style='margin-right: 5px'><i class='fa fa-arrow-left'></i></a>
                                <h3 class="panel-title pull-left" style='margin-top: 5px'>Edit <?php echo $modulename ?></h3>
<!--                                <a class="btn btn-info pull-right btn-xs"  data-toggle="modal" data-target="#bs-example-modal-lg"><i class='fa fa-plus'></i></a>                                -->
                                <div class='clearfix'></div>
                            </div>
                            <div class="panel-body">
                                <form id="basicForm" action="Edit/<?php echo nospace($nav) ?>/<?php echo nospace($nav_sub) ?>" class="form-horizontal" novalidate="novalidate" method='post'>
                                    <?php
                                    $query = mysql_query("select * from admin where id='$id' and tenant != 0");
                                    $result = mysql_fetch_array($query);
                                    if (mysql_num_rows($query) > 0) {
                                        ?>
                                        <div class="panel panel-default">                                                        
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Name <span class="asterisk">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="name" value="<?php echo $result['name']; ?>" class="form-control" placeholder=". . ." required="" autocomplete='off'>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Title <span class="asterisk">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="title" value="<?php echo $result['title']; ?>" class="form-control" placeholder=". . ." required="" autocomplete='off'>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Username <span class="asterisk">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="username" value="<?php echo $result['username']; ?>" class="form-control" placeholder=". . ." required="" autocomplete='off'>
                                                    </div>
                                                </div>                                                            
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Password <span class="asterisk">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="password" value="<?php echo $result['password']; ?>" class="form-control" placeholder=". . ." required="" autocomplete='off'>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Tenant <span class="asterisk">*</span></label>
                                                    <div class="col-sm-9">                                                                    
                                                        <select class="select2 form-control btn-block" name='tenant' required style="border-left: 1px solid #ccc;border-radius: 3px">
                                                            <?php
                                                            $query = mysql_query("select * from tenant order by name");
                                                            while ($row = mysql_fetch_array($query)) {
                                                                if ($row['id'] == $result['tenant']) {
                                                                    echo "<option value='" . $row['id'] . "' selected>" . $row['name'] . "</option>";
                                                                } else {
                                                                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group" style='margin-bottom: 0'>
                                                    <label class="col-sm-3 control-label">Access <span class="asterisk">*</span></label>
                                                    <div class="col-sm-9" style='padding:0'>
                                                        <div class="input-group mb15" style='padding-left: 10px'>
                                                            <?php
                                                            $query = mysql_query("select * from z_module where parent=''");
                                                            while ($row = mysql_fetch_array($query)) {
                                                                ?>
                                                                <label style="margin:0px !important;font-weight: bold"><?php echo $row['title'] ?></label>
                                                                <?php
                                                                $querydalem = mysql_query("select * from z_module where parent='" . $row['title'] . "'  and master=0");
                                                                while ($rowdalem = mysql_fetch_array($querydalem)) {
                                                                    $checked = "";
                                                                    foreach (explode("~", $result['access']) as $a) {
                                                                        if ($a == $rowdalem['id']) {
                                                                            $checked = "checked";
                                                                        }
                                                                    }
                                                                    ?>
                                                                    <div class="checkbox block"><label><input type="checkbox" name='access[]' value='<?php echo $rowdalem['id'] ?>' <?php echo $checked ?>> <?php echo $rowdalem['subtitle'] ?></label></div>   
                                                                    <?php
                                                                }
                                                                if (mysql_num_rows($querydalem) == 0) {
                                                                    $checked = "";
                                                                    foreach (explode("~", $result['access']) as $a) {
                                                                        if ($a == $row['id']) {
                                                                            $checked = "checked";
                                                                        }
                                                                    }
                                                                    ?>
                                                                    <div class="checkbox block"><label><input type="checkbox" name='access[]' value='<?php echo $row['id'] ?>' <?php echo $checked ?>> <?php echo $row['title'] ?></label></div>   
                                                                    <?php
                                                                }
                                                            }
                                                            if (mysql_num_rows($query) == 0) {
                                                                ?>
                                                                <input type='hidden' name='access[]' value=''>
                                                                <div class="checkbox block"><label><input type="checkbox" checked disabled>All</label></div>
                                                                <?php
                                                            }
                                                            ?>                                                                        
                                                        </div>                    
                                                    </div>                    
                                                </div>                                       
                                            </div><!-- panel-body -->
                                            <div class="panel-footer">
                                                <div class="row">
                                                    <div class="col-sm-9 col-sm-offset-3">
                                                        <input type='hidden' name='id' value='<?php echo $id ?>'>
                                                        <input type='hidden' name='url' value='<?php echo $link ?>/Edit/<?php echo $id ?>/Success'>
                                                        <input type='hidden' name='url2' value='<?php echo $link ?>/Edit/<?php echo $id ?>/Failed'>
                                                        <button class="btn btn-primary">Submit</button>
                                                        <button type="reset" class="btn btn-default">Reset</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div><!-- panel -->
                                        <?php
                                    } else {
                                        echo "Please Dont do that :D";
                                    }
                                    ?>
                                </form>
                            </div><!-- panel -->
                        </div>
                    </div><!-- contentpanel -->

                </div><!-- mainpanel -->


                <?php include(APPPATH . "/views/rightpanel.php") ?>

        </section>

        <?php include(APPPATH . "/views/scriptmodule.php") ?>

    </body>
</html>
