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
                                    $query = mysql_query("select * from m_promo where id='$id'");
                                    $result = mysql_fetch_array($query);
                                    ?>
                                    <div class="panel panel-default">                                                        
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Title <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="title" class="form-control" placeholder=". . ." required="" autocomplete='off'  value='<?php echo $result['title'] ?>' disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Keyword <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="keyword" class="form-control" placeholder=". . ." required="" autocomplete='off'  value='<?php echo $result['keyword'] ?>' disabled>
                                                </div>
                                            </div>                                                            
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Description <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <textarea rows='5' type="text" name="desc" class="form-control" placeholder=". . ." required="" autocomplete='off' disabled><?php echo $result['desc'] ?></textarea>
                                                </div>
                                            </div><div class="form-group">
                                                <label class="col-sm-3 control-label">Payment <span class="asterisk">*</span></label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="payment" class="form-control" placeholder=". . ." required="" autocomplete='off'  value='<?php echo $result['payment'] ?>' disabled>
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
