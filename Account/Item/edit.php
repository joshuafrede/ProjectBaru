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
                                    <strong>Update Failed</strong> Item already exist</a>.
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
                                    $query = mysql_query("select * from product where id='$id'");
                                    $result = mysql_fetch_array($query);
                                    ?>
                                    <div class="panel panel-default">                                                        
                                        <div class="panel-body">         
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Where<span class="asterisk">*</span></label>
                                                <div class="col-sm-9">                                                                    
                                                    <select class="select2 form-control btn-block" name='belong' required style="border-left: 1px solid #ccc;border-radius: 3px">
                                                        <?php
                                                        $query = mysql_query("select * from z_datacombo where name='item' order by value desc");
                                                        while ($row = mysql_fetch_array($query)) {
                                                            if ($row['value'] == $result['belong']) {
                                                                echo "<option value='" . $row['value'] . "' selected>" . $row['value'] . "</option>";
                                                            } else {
                                                                echo "<option value='" . $row['value'] . "'>" . $row['value'] . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Name <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">                                                                    
                                                    <input type="text" name="name" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['name'] ?>'>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Unit<span class="asterisk">*</span></label>
                                                <div class="col-sm-9">                                                                    
                                                    <select class="select2 form-control btn-block" name='unit' required style="border-left: 1px solid #ccc;border-radius: 3px">
                                                        <?php
                                                        $query = mysql_query("select * from z_datacombo where name='unit' order by value");
                                                        while ($row = mysql_fetch_array($query)) {
                                                            if ($row['value'] == $result['unit']) {
                                                                echo "<option value='" . $row['value'] . "' selected>" . $row['value'] . "</option>";
                                                            } else {
                                                                echo "<option value='" . $row['value'] . "'>" . $row['value'] . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Buffer<span class="asterisk">*</span></label>
                                                <div class="col-sm-9">                                                                    
                                                    <input type="text" name="buffer" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['buffer'] ?>' >
                                                </div>
                                            </div>                                                                                                                     
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Buffer Kitchen <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="buffer_kitchen" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['buffer_kitchen'] ?>'>
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
                                </form>
                            </div><!-- panel -->
                        </div>
                    </div><!-- contentpanel -->

                </div><!-- mainpanel -->


                <?php include(APPPATH . "/views/rightpanel.php") ?>

        </section>

        <?php include ( APPPATH . "/views/scriptmodule.php") ?>

    </body>
</html>
