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
                                    $query = mysql_query("select * from p_formula where id='$id'");
                                    $result = mysql_fetch_array($query);
                                    ?>
                                    <div class="panel panel-default">                                                        
                                        <div class="panel-body">                                                                                        
                                            <div class='col-md-6'>                                                            
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Name <span class="asterisk">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="name" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['name'] ?>'>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Amount <span class="asterisk">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="min" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['min'] ?>'>
                                                    </div>
                                                </div>                                                            
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Point <span class="asterisk">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="point" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['point'] ?>'>
                                                    </div>
                                                </div>
                                                <div class="form-group" style='margin-bottom: 0'>
                                                    <label class="col-sm-3 control-label">Card Type <span class="asterisk">*</span></label>
                                                    <div class="col-sm-9" style='padding:0'>
                                                        <div class="input-group mb15" style='padding-left: 10px'>
                                                            <?php
                                                            $query = mysql_query("select * from m_cardtype where merchant_id='" . $_SESSION['merchant'] . "'");
                                                            while ($row = mysql_fetch_array($query)) {
                                                                $checked = "";
                                                                foreach (explode("~", $result['cardtype']) as $a) {
                                                                    if ($a == $row['id']) {
                                                                        $checked = "checked";
                                                                    }
                                                                }
                                                                ?>
                                                                <div class="checkbox block"><label><input type="checkbox" name='cardtype[]' value='<?php echo $row['id'] ?>' <?php echo $checked ?>> <?php echo $row['name'] ?></label></div>
                                                                <?php
                                                            }
                                                            if (mysql_num_rows($query) == 0) {
                                                                ?>
                                                                <input type='hidden' name='cardtype[]' value=''>
                                                                <div class="checkbox block"><label><input type="checkbox" checked disabled>All</label></div>
                                                                <?php
                                                            }
                                                            ?>                                                                        
                                                        </div>                    
                                                    </div>                    
                                                </div>
                                                <div class="form-group" style='margin-bottom: 0'>
                                                    <label class="col-sm-3 control-label">Payment <span class="asterisk">*</span></label>
                                                    <div class="col-sm-9" style='padding:0'>
                                                        <div class="input-group mb15" style='padding-left: 10px'>
                                                            <?php
                                                            $query = mysql_query("select * from m_payment where merchant_id='" . $_SESSION['merchant'] . "'");
                                                            while ($row = mysql_fetch_array($query)) {
                                                                $checked = "";
                                                                foreach (explode("~", $result['payment']) as $a) {
                                                                    if ($a == $row['id']) {
                                                                        $checked = "checked";
                                                                    }
                                                                }
                                                                ?>
                                                                <div class="checkbox block"><label><input type="checkbox" name='payment[]' value='<?php echo $row['id'] ?>' <?php echo $checked ?>> <?php echo $row['name'] ?></label></div>
                                                                <?php
                                                            }
                                                            if (mysql_num_rows($query) == 0) {
                                                                ?>
                                                                <input type='hidden' name='payment[]' value=''>
                                                                <div class="checkbox block"><label><input type="checkbox" checked disabled>All</label></div>
                                                                <?php
                                                            }
                                                            ?>                                                                        
                                                        </div>                    
                                                    </div>                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Tenant <span class="asterisk">*</span></label>
                                                    <div class="col-sm-9" style='padding:0'>
                                                        <div class="input-group mb15" style='padding-left: 10px'>
                                                            <?php
                                                            $query = mysql_query("select * from m_tenant where merchant_id='" . $_SESSION['merchant'] . "'");
                                                            while ($row = mysql_fetch_array($query)) {
                                                                $checked = "";
                                                                foreach (explode("~", $result['tenant']) as $a) {
                                                                    if ($a == $row['id']) {
                                                                        $checked = "checked";
                                                                    }
                                                                }
                                                                ?>
                                                                <div class="checkbox block"><label><input type="checkbox" name='tenant[]' value='<?php echo $row['id'] ?>' <?php echo $checked ?>> <?php echo $row['name'] ?></label></div>
                                                                <?php
                                                            }
                                                            if (mysql_num_rows($query) == 0) {
                                                                ?>
                                                                <input type='hidden' name='tenant[]' value=''>
                                                                <div class="checkbox block"><label><input type="checkbox" checked disabled>All</label></div>
                                                                <?php
                                                            }
                                                            ?>                                                                        
                                                        </div>                    
                                                    </div>                    
                                                </div>                                                                
                                            </div>
                                            <div class='col-md-6'>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Start Date <span class="asterisk">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control datepicker" placeholder="dd/mm/yyyy" name='date_from' required autocomplete='off' value='<?php echo date("d-m-Y", strtotime($result['date_from'])) ?>'>
                                                    </div>                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">End Date <span class="asterisk">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control datepicker" placeholder="dd/mm/yyyy"  name='date_to' required autocomplete='off' value='<?php echo date("d-m-Y", strtotime($result['date_to'])) ?>'>
                                                    </div>                    
                                                </div>
                                                <div class="form-group" style='margin-bottom: 0'>
                                                    <label class="col-sm-3 control-label">Start Time <span class="asterisk">*</span></label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group mb15">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                                            <div class="bootstrap-timepicker"><input value='<?php echo date("H:i", strtotime($result['date_from'])) ?>'  name='time_from' required autocomplete='off' type="text" class="form-control timepicker2"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="glyphicon glyphicon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="glyphicon glyphicon-chevron-up"></i></a></td></tr><tr><td><input type="text" name="hour" class="form-control bootstrap-timepicker-hour" maxlength="2"></td> <td class="separator">:</td><td><input type="text" name="minute" class="form-control bootstrap-timepicker-minute" maxlength="2"></td> </tr><tr><td><a href="#" data-action="decrementHour"><i class="glyphicon glyphicon-chevron-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="glyphicon glyphicon-chevron-down"></i></a></td></tr></tbody></table></div></div>
                                                        </div>                    
                                                    </div>                    
                                                </div>                                                            
                                                <div class="form-group" style='margin-bottom: 0'>
                                                    <label class="col-sm-3 control-label">End Time <span class="asterisk">*</span></label>
                                                    <div class="col-sm-9">
                                                        <div class="input-group mb15">
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                                            <div class="bootstrap-timepicker"><input value='<?php echo date("H:i", strtotime($result['date_to'])) ?>' name='time_to' required autocomplete='off' type="text" class="form-control timepicker2"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="glyphicon glyphicon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="glyphicon glyphicon-chevron-up"></i></a></td></tr><tr><td><input type="text" name="hour" class="form-control bootstrap-timepicker-hour" maxlength="2"></td> <td class="separator">:</td><td><input type="text" name="minute" class="form-control bootstrap-timepicker-minute" maxlength="2"></td> </tr><tr><td><a href="#" data-action="decrementHour"><i class="glyphicon glyphicon-chevron-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="glyphicon glyphicon-chevron-down"></i></a></td></tr></tbody></table></div></div>
                                                        </div>                    
                                                    </div>                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Days <span class="asterisk">*</span></label>
                                                    <div class="col-sm-9" style='padding:0'>
                                                        <div class="input-group mb15">
                                                            <div class='col-md-6'>
                                                                <?php
                                                                $checked1 = "";
                                                                $checked2 = "";
                                                                $checked3 = "";
                                                                $checked4 = "";
                                                                foreach (explode("~", $result['day']) as $a) {
                                                                    if ($a == 1) {
                                                                        $checked1 = "checked";
                                                                    } else if ($a == 2) {
                                                                        $checked2 = "checked";
                                                                    } else if ($a == 3) {
                                                                        $checked3 = "checked";
                                                                    } else if ($a == 4) {
                                                                        $checked4 = "checked";
                                                                    }
                                                                }
                                                                ?>                                                                         
                                                                <div class="checkbox block"><label><input type="checkbox" name='day[]' value='1' <?php echo $checked1 ?>> Monday</label></div>                                                                   
                                                                <div class="checkbox block"><label><input type="checkbox" name='day[]' value='2' <?php echo $checked2 ?>> Tuesday</label></div>                                                             
                                                                <div class="checkbox block"><label><input type="checkbox" name='day[]' value='3' <?php echo $checked3 ?>> Wednesday</label></div>
                                                                <div class="checkbox block"><label><input type="checkbox" name='day[]' value='4' <?php echo $checked4 ?>> Thursday</label></div>
                                                            </div>                    
                                                            <div class='col-md-6'>
                                                                <?php
                                                                $checked5 = "";
                                                                $checked6 = "";
                                                                $checked7 = "";
                                                                foreach (explode("~", $result['day']) as $a) {
                                                                    if ($a == 5) {
                                                                        $checked5 = "checked";
                                                                    } else if ($a == 6) {
                                                                        $checked6 = "checked";
                                                                    } else if ($a == 7) {
                                                                        $checked7 = "checked";
                                                                    }
                                                                    ?>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <div class="checkbox block"><label><input type="checkbox" name='day[]' value='5' <?php echo $checked5 ?>> Friday</label></div>                                                                
                                                                <div class="checkbox block"><label><input type="checkbox" name='day[]' value='6' <?php echo $checked6 ?>> Saturday</label></div>                                                                
                                                                <div class="checkbox block"><label><input type="checkbox" name='day[]' value='7' <?php echo $checked7 ?>> Sunday</label></div>
                                                            </div>                    
                                                        </div>                    
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
