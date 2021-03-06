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
                                if ($msg == "Deleted") {
                                    ?>
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <strong>Delete Success</strong> Please continue</a>.
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <strong>Add Success</strong> Please continue</a>.
                                    </div>
                                    <?php
                                }
                            } else if ($status == "Failed") {
                                ?>
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong>Add Failed</strong> Please re-type your input or contact the administrator</a>.
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
                                <h3 class="panel-title pull-left" style='margin-top:5px'><?php echo $modulename ?></h3>
<!--                                <a class="btn btn-info pull-right btn-xs"  data-toggle="modal" data-target="#bs-example-modal-lg"><i class='fa fa-plus'></i></a>-->
                                <div class="modal fade bs-example-modal-lg in" id='bs-example-modal-lg' role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" style='border-top-left-radius: 3px;border-top-right-radius: 3px'>
                                            <div class="modal-header panel-heading">
                                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                <h4 class="modal-title panel-title">Add <?php echo $modulename ?></h4>
                                                <p>Please provide your name, email address (won't be published) and a comment.</p>
                                            </div>
                                            <div class="modal-body" style='padding: 0'>
                                                <form id="basicForm" action="Add/<?php echo nospace($nav) ?>/<?php echo nospace($nav_sub) ?>" class="form-horizontal" novalidate="novalidate" method='post'>
                                                    <div class="panel panel-default">    
                                                        <div class="panel-body">
                                                            <div class='col-md-6'>                                                            
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Name <span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="name" class="form-control" placeholder=". . ." required="" autocomplete='off'>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Amount <span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="min" class="form-control" placeholder=". . ." required="" autocomplete='off'>
                                                                    </div>
                                                                </div>                                                            
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Point <span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="point" class="form-control" placeholder=". . ." required="" autocomplete='off'>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group" style='margin-bottom: 0'>
                                                                    <label class="col-sm-3 control-label">Payment <span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9" style='padding:0'>
                                                                        <div class="input-group mb15" style='padding-left: 10px'>
                                                                            <?php
                                                                            $query = mysql_query("select * from m_payment where merchant_id='" . $_SESSION['merchant'] . "'");
                                                                            while ($row = mysql_fetch_array($query)) {
                                                                                ?>
                                                                                <div class="checkbox block"><label><input type="checkbox" name='payment[]' value='<?php echo $row['id'] ?>' checked> <?php echo $row['name'] ?></label></div>
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
                                                                                ?>
                                                                                <div class="checkbox block"><label><input type="checkbox" name='tenant[]' value='<?php echo $row['id'] ?>' checked> <?php echo $row['name'] ?></label></div>
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
                                                                        <input type="text" class="form-control datepicker" placeholder="dd/mm/yyyy" name='date_from' required autocomplete='off'>
                                                                    </div>                    
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">End Date <span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control datepicker" placeholder="dd/mm/yyyy"  name='date_to' required autocomplete='off'>
                                                                    </div>                    
                                                                </div>
                                                                <div class="form-group" style='margin-bottom: 0'>
                                                                    <label class="col-sm-3 control-label">Start Time <span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <div class="input-group mb15">
                                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                                                            <div class="bootstrap-timepicker"><input value='00:00'  name='time_from' required autocomplete='off' type="text" class="form-control timepicker2"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="glyphicon glyphicon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="glyphicon glyphicon-chevron-up"></i></a></td></tr><tr><td><input type="text" name="hour" class="form-control bootstrap-timepicker-hour" maxlength="2"></td> <td class="separator">:</td><td><input type="text" name="minute" class="form-control bootstrap-timepicker-minute" maxlength="2"></td> </tr><tr><td><a href="#" data-action="decrementHour"><i class="glyphicon glyphicon-chevron-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="glyphicon glyphicon-chevron-down"></i></a></td></tr></tbody></table></div></div>
                                                                        </div>                    
                                                                    </div>                    
                                                                </div>                                                            
                                                                <div class="form-group" style='margin-bottom: 0'>
                                                                    <label class="col-sm-3 control-label">End Time <span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <div class="input-group mb15">
                                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                                                            <div class="bootstrap-timepicker"><input value='00:00' name='time_to' required autocomplete='off' type="text" class="form-control timepicker2"><div class="bootstrap-timepicker-widget dropdown-menu"><table><tbody><tr><td><a href="#" data-action="incrementHour"><i class="glyphicon glyphicon-chevron-up"></i></a></td><td class="separator">&nbsp;</td><td><a href="#" data-action="incrementMinute"><i class="glyphicon glyphicon-chevron-up"></i></a></td></tr><tr><td><input type="text" name="hour" class="form-control bootstrap-timepicker-hour" maxlength="2"></td> <td class="separator">:</td><td><input type="text" name="minute" class="form-control bootstrap-timepicker-minute" maxlength="2"></td> </tr><tr><td><a href="#" data-action="decrementHour"><i class="glyphicon glyphicon-chevron-down"></i></a></td><td class="separator"></td><td><a href="#" data-action="decrementMinute"><i class="glyphicon glyphicon-chevron-down"></i></a></td></tr></tbody></table></div></div>
                                                                        </div>                    
                                                                    </div>                    
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Days <span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9" style='padding:0'>
                                                                        <div class="input-group mb15">
                                                                            <div class='col-md-6'>
                                                                                <div class="checkbox block"><label><input type="checkbox" name='day[]' value='1' checked> Monday</label></div>
                                                                                <div class="checkbox block"><label><input type="checkbox" name='day[]' value='2' checked> Tuesday</label></div>
                                                                                <div class="checkbox block"><label><input type="checkbox" name='day[]' value='3' checked> Wednesday</label></div>
                                                                                <div class="checkbox block"><label><input type="checkbox" name='day[]' value='4' checked> Thursday</label></div>
                                                                            </div>                    
                                                                            <div class='col-md-6'>
                                                                                <div class="checkbox block"><label><input type="checkbox" name='day[]' value='5' checked> Friday</label></div>
                                                                                <div class="checkbox block"><label><input type="checkbox" name='day[]' value='6' checked> Saturday</label></div>
                                                                                <div class="checkbox block"><label><input type="checkbox" name='day[]' value='7' checked> Sunday</label></div>
                                                                            </div>                    
                                                                        </div>                    
                                                                    </div>                    
                                                                </div>
                                                            </div>                                                                                                                       
                                                        </div><!-- panel-body -->
                                                        <div class="panel-footer">
                                                            <div class="row">
                                                                <div class="col-sm-9 col-sm-offset-3">
                                                                    <input type='hidden' name='url' value='<?php echo $link ?>/Success'>
                                                                    <input type='hidden' name='url2' value='<?php echo $link ?>/Failed'>
                                                                    <button class="btn btn-primary">Submit</button>
                                                                    <button type="reset" class="btn btn-default">Reset</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div><!-- panel -->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='clearfix'></div>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table mb40 table-bordered" id='table1'>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Comment</th>
                                                <th>Anger</th>
                                                <th>Disgust</th>
                                                <th>Fear</th>
                                                <th>Joy</th>
                                                <th>Sadness</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            $query = mysql_query("select * from comment where merchant_id='" . $_SESSION['merchant'] . "' order by created_at desc");
                                            while ($row = mysql_fetch_array($query)) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>                                                    
                                                    <td><?php echo $row['comment'] ?></td>    
                                                    <td><?php echo $row['anger'] ?>%</td>    
                                                    <td><?php echo $row['disgust'] ?>%</td>    
                                                    <td><?php echo $row['fear'] ?>%</td>    
                                                    <td><?php echo $row['joy'] ?>%</td>    
                                                    <td><?php echo $row['sadness'] ?>%</td>    
                                                </tr>
                                                <?php
                                            }
                                            ?>                                                                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- panel -->
                        </div>
                    </div><!-- contentpanel -->

                </div><!-- mainpanel -->


                <?php include(APPPATH . "/views/rightpanel.php") ?>

        </section>

        <?php include(APPPATH . "/views/scriptmodule.php") ?>

    </body>
</html>
