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
                                <a class="btn btn-info pull-left btn-xs" href='Account' style='margin-right: 5px'><i class='fa fa-arrow-left'></i></a>
                                <h3 class="panel-title pull-left" style='margin-top: 5px'>Edit <?php echo $modulename ?></h3>
<!--                                <a class="btn btn-info pull-right btn-xs"  data-toggle="modal" data-target="#bs-example-modal-lg"><i class='fa fa-plus'></i></a>                                -->
                                <div class='clearfix'></div>
                            </div>
                            <div class="panel-body">
                                <form id="basicForm" action="Edit/EditProfile/Tenant" class="form-horizontal" novalidate="novalidate" method='post' enctype="multipart/form-data">
                                    <?php
                                    $query = mysql_query("select * from m_tenant where id='" . $_SESSION['tenant'] . "'");
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
                                                    <input type="file" name="mainpic" style="position: relative;top: 7px;display: inline;margin-right: 25px">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Name <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['name'] ?>'>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Username <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="username" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['username'] ?>'>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Password <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="password" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['password'] ?>'>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Card ID <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="cid" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['cid'] ?>'>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Location <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="location" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['location'] ?>'>
                                                </div>
                                            </div>                                                            
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">City <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="city" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['city'] ?>'>
                                                </div>
                                            </div>   
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">City <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="contact" class="form-control" placeholder=". . ." required="" autocomplete='off' value='<?php echo $result['contact'] ?>'>
                                                </div>
                                            </div>   
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Latitude</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="lat" class="form-control" placeholder=". . ." autocomplete='off' value='<?php echo $result['lat'] ?>'>
                                                </div>
                                            </div>                                                            
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Longitude</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="long" class="form-control" placeholder=". . ." autocomplete='off' value='<?php echo $result['long'] ?>'>
                                                </div>
                                            </div>                                          
                                        </div><!-- panel-body -->
                                        <div class="panel-footer">
                                            <div class="row">
                                                <div class="col-sm-9 col-sm-offset-3">
                                                    <input type='hidden' name='id' value='<?php echo $_SESSION['tenant'] ?>'>
                                                    <input type='hidden' name='url' value='<?php echo $link ?>/Success'>
                                                    <input type='hidden' name='url2' value='<?php echo $link ?>/Failed'>
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
