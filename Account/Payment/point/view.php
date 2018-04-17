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
                                <h3 class="panel-title pull-left" style='margin-top: 5px'>View <?php echo $modulename ?></h3>
<!--                                <a class="btn btn-info pull-right btn-xs"  data-toggle="modal" data-target="#bs-example-modal-lg"><i class='fa fa-plus'></i></a>                                -->
                                <div class='clearfix'></div>
                            </div>
                            <div class="panel-body">
                                <form id="basicForm" action="Edit/<?php echo $nav ?>/<?php echo $nav_sub ?>" class="form-horizontal" novalidate="novalidate" method='post'>
                                    <?php
                                    $query = mysql_query("select * from customer where id='$id'");
                                    $result = mysql_fetch_array($query);
                                    ?>
                                    <div class="panel panel-default">                                                        
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Card Type <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control btn-block" name='card_type' required style="border-left: 1px solid #ccc;border-radius: 3px" disabled>
                                                        <?php
                                                        $query = mysql_query("select * from m_cardtype where merchant_id='" . $_SESSION['merchant'] . "'");
                                                        while ($row = mysql_fetch_array($query)) {
                                                            if ($result['card_type'] == $row['id']) {
                                                                echo "<option value='" . $row['id'] . "' selected>" . $row['name'] . "</option>";
                                                            } else {
                                                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">First Name <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">                                                                    
                                                    <input type="text" name="first_name" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['first_name'] ?>' disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Last Name <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">                                                                    
                                                    <input type="text" name="last_name" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['last_name'] ?>' disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Gender <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control btn-block" name='gender' required style="border-left: 1px solid #ccc;border-radius: 3px" disabled>
                                                        <?php
                                                        $query = mysql_query("select * from z_datacombo where name='Gender'");
                                                        while ($row = mysql_fetch_array($query)) {
                                                            if ($result['gender'] == $row['value']) {
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
                                                <label class="col-sm-3 control-label">Marital <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control btn-block" name='marital' required style="border-left: 1px solid #ccc;border-radius: 3px" disabled>
                                                        <?php
                                                        $query = mysql_query("select * from z_datacombo where name='Marital'");
                                                        while ($row = mysql_fetch_array($query)) {
                                                            if ($result['marital'] == $row['value']) {
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
                                                <label class="col-sm-3 control-label">Place of Birth <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="pob" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['pob'] ?>' disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Birth Date <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control datepicker" placeholder="dd/mm/yyyy" name='birth' required autocomplete='off' value='<?php echo date("d-m-Y", strtotime($result['birth'])) ?>' disabled>
                                                </div>                    
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Email <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="email" name="email" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['email'] ?>' disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Phone <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="phone" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['phone'] ?>' disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Password <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="password" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['password'] ?>' disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Location <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="location" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['location'] ?>' disabled>
                                                </div>
                                            </div>                                                            
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">City <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="city" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['city'] ?>' disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Occupation <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="occupation" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['occupation'] ?>' disabled>
                                                </div>
                                            </div>                         
                                        </div><!-- panel-body -->
                                        <!--                                        <div class="panel-footer">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-9 col-sm-offset-3">
                                                                                            <input type='hidden' name='id' value='<?php echo $id ?>'>
                                                                                            <input type='hidden' name='url' value='<?php echo $link ?>/Edit/<?php echo $id ?>/Success'>
                                                                                            <input type='hidden' name='url2' value='<?php echo $link ?>/Edit/<?php echo $id ?>/Failed'>
                                                                                            <button class="btn btn-primary">Submit</button>
                                                                                            <button type="reset" class="btn btn-default">Reset</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>-->

                                    </div><!-- panel -->
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
