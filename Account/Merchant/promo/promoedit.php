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
                                <form id="basicForm" action="Edit/<?php echo nospace($nav) ?>/<?php echo nospace($nav_sub) ?>" class="form-horizontal" novalidate="novalidate" method='post' enctype="multipart/form-data">
                                    <?php
                                    $query = mysql_query("select * from m_promo where id='$id'");
                                    $result = mysql_fetch_array($query);
                                    ?>
                                    <div class="panel panel-default">                                                        
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label"></label>
                                                <div class="col-sm-9">
                                                    <img src="<?php echo $result['pic'] ?>" width="300">
                                                </div>
                                            </div>                                            
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Picture</label>
                                                <div class="col-sm-9">
                                                    <input type="file" name="mainpic" style="position: relative;top: 7px">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Title <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="title" class="form-control" placeholder=". . ." required="" autocomplete='off'  value='<?php echo $result['title'] ?>'>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Start Date <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control datepicker" placeholder="dd/mm/yyyy" name='date_from' required autocomplete='off' value='<?php echo $result['date_from'] ?>'>
                                                </div>                    
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">End Date <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control datepicker" placeholder="dd/mm/yyyy"  name='date_to' required autocomplete='off' value='<?php echo $result['date_to'] ?>'>
                                                </div>                    
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Start Time <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <div class="input-group mb15">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                                        <div class="bootstrap-timepicker"><input value='<?php echo $result['time_from'] ?>'  name='time_from' required autocomplete='off' type="text" class="form-control timepicker2"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="glyphicon glyphicon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="glyphicon glyphicon-chevron-up"></i></a></td></tr><tr><td><input type="text" name="hour" class="form-control bootstrap-timepicker-hour" maxlength="2"></td> <td class="separator">:</td><td><input type="text" name="minute" class="form-control bootstrap-timepicker-minute" maxlength="2"></td> </tr><tr><td><a href="#" data-action="decrementHour"><i class="glyphicon glyphicon-chevron-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="glyphicon glyphicon-chevron-down"></i></a></td></tr></tbody></table></div></div>
                                                    </div>                    
                                                </div>                    
                                            </div>                                                            
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">End Time <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <div class="input-group mb15">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                                        <div class="bootstrap-timepicker"><input value='<?php echo $result['time_to'] ?>' name='time_to' required autocomplete='off' type="text" class="form-control timepicker2"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="glyphicon glyphicon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="glyphicon glyphicon-chevron-up"></i></a></td></tr><tr><td><input type="text" name="hour" class="form-control bootstrap-timepicker-hour" maxlength="2"></td> <td class="separator">:</td><td><input type="text" name="minute" class="form-control bootstrap-timepicker-minute" maxlength="2"></td> </tr><tr><td><a href="#" data-action="decrementHour"><i class="glyphicon glyphicon-chevron-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="glyphicon glyphicon-chevron-down"></i></a></td></tr></tbody></table></div></div>
                                                    </div>                    
                                                </div>                    
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Keyword <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="keyword" class="form-control" placeholder=". . ." required="" autocomplete='off'  value='<?php echo $result['keyword'] ?>'>
                                                </div>
                                            </div>                                                            
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Description <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea rows='5' type="text" name="desc" class="form-control" placeholder=". . ." required="" autocomplete='off'><?php echo $result['desc'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Payment <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control btn-block" name='payment' required style="border-left: 1px solid #ccc;border-radius: 3px">
                                                        <option value="">. . .</option>
                                                        <?php
                                                        $query = mysql_query("select * from m_payment where merchant_id='" . $_SESSION['merchant'] . "'");
                                                        while ($row = mysql_fetch_array($query)) {
                                                            if ($result['payment'] == $row['id']) {
                                                                echo "<option value='" . $row['id'] . "' selected>" . $row['name'] . "</option>";
                                                            } else {
                                                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
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
