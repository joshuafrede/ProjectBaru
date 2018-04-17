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
                                <?php
                                $query = mysql_query("select * from recipe where id='$id'");
                                $result = mysql_fetch_array($query);
                                ?>
                                <a class="btn btn-info pull-left btn-xs" href='Account/Recipe' style='margin-right: 5px'><i class='fa fa-arrow-left'></i></a>
                                <h3 class="panel-title pull-left" style='margin-top:5px'><?php echo $result['name'] ?></h3>
                                <a class="btn btn-info pull-right btn-xs"  data-toggle="modal" data-target="#bs-example-modal-lg"><i class='fa fa-plus'></i></a>
                                <div class="modal fade bs-example-modal-lg in" tabindex='-1' id='bs-example-modal-lg' role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
                                    <div class="modal-dialog modal-md">
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
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Item<span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">                                                                    
                                                                    <select class="select2 form-control btn-block" name='product_id' required style="border-left: 1px solid #ccc;border-radius: 3px">
                                                                        <?php
                                                                        $query = mysql_query("select * from product order by name");
                                                                        while ($row = mysql_fetch_array($query)) {
                                                                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . " (" . $row['unit'] . ")</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>       
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Qty <span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">                                                                    
                                                                    <input type="text" name="amount" class="form-control" placeholder=". . ." required="" autocomplete='off'>
                                                                </div>
                                                            </div>
                                                        </div><!-- panel-body -->
                                                        <div class="panel-footer">
                                                            <div class="row">
                                                                <div class="col-sm-9 col-sm-offset-3">
                                                                    <input type='hidden' name='recipe_id' value='<?php echo $id ?>/Success'>
                                                                    <input type='hidden' name='url' value='<?php echo $link ?>/<?php echo $id ?>/Success'>
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
                                                <th>Name</th>
                                                <th class="text-center" style="width: 200px">Qty</th>
                                                <th class='no-sort text-center' width='180'>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            $query = mysql_query("select *,a.id as id from recipelog a, product b where
                                                a.product_id=b.id and
                                                a.recipe_id='$id' 
                                                order by a.id desc");
                                            while ($row = mysql_fetch_array($query)) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>                                                    
                                                    <td><?php echo $row['name'] ?></td>
                                                    <td class="text-center">
                                                        <?php echo $row['unit'] ?>
                                                        <form onsubmit="return confirm('Are you sure you want to update Amount?');" method='post' action='Fungsi/globalupdate'>
                                                            <input type='hidden' name='id' value='<?php echo $row['id'] ?>'>
                                                            <input type='hidden' name='name_id' value='id'>
                                                            <input type='hidden' name='update_name' value='amount'>
                                                            <input type='hidden' name='table' value='recipelog'>                                                            
                                                            <input type='hidden' name='url' value='<?php echo base_url(); ?><?php echo $link ?>/<?php echo $id ?>/Success/Update'>
                                                            <button class='btn btn-success pull-right'><i class='glyphicon glyphicon-ok'></i></button> 
                                                            <input type='text' class="form-control border-radius0 pull-right" name='value' value='<?php echo $row['amount'] ?>' style="width: 120px">                                                    
                                                        </form>               
                                                    </td>
                                                    <td class='text-center'>
                                                        <div class="btn-group" role="group" aria-label="...">
                                                            <form onsubmit="return confirm('Are you sure you want to Delete?');" method='post' action='Fungsi/globaldelete'>
                                                                <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                                                                <input type='hidden' name='name_id' value='id'>
                                                                <input type='hidden' name='table' value='recipelog'>
                                                                <input type='hidden' name='url' value='<?php echo base_url(); ?><?php echo $link ?>/<?php echo $id ?>/Success/Deleted'>
                                                                <button class='btn btn-danger'><i class='glyphicon glyphicon-remove'></i></button>
                                                            </form>
                                                        </div>                                        
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>                                                                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- panel -->
                        </div>
                        <?php if ($result['subrecipe'] == 1) { ?>
                            <div class="panel panel-dark">
                                <div class="panel-heading">
                                    <!--                                <div class="panel-btns">
                                                                        <a href="" class="panel-close">×</a>
                                                                        <a href="" class="minimize">−</a>
                                                                    </div> panel-btns -->
                                    <?php
                                    $query = mysql_query("select * from recipe where id='$id'");
                                    $result = mysql_fetch_array($query);
                                    ?>
                                    <h3 class="panel-title pull-left" style='margin-top:5px'>Sub Recipe <?php echo $result['name'] ?></h3>
                                    <a class="btn btn-info pull-right btn-xs"  data-toggle="modal" data-target="#bs-example-modal-lg2"><i class='fa fa-plus'></i></a>
                                    <div class="modal fade bs-example-modal-lg in" tabindex='-1' id='bs-example-modal-lg2' role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content" style='border-top-left-radius: 3px;border-top-right-radius: 3px'>
                                                <div class="modal-header panel-heading">
                                                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                    <h4 class="modal-title panel-title">Add Sub Recipe</h4>
                                                    <p>Please provide your name, email address (won't be published) and a comment.</p>
                                                </div>
                                                <div class="modal-body" style='padding: 0'>
                                                    <form id="basicForm" action="Add/<?php echo nospace($nav) ?><?php echo nospace($nav_sub) ?>/SubRecipeLog" class="form-horizontal" novalidate="novalidate" method='post'>
                                                        <div class="panel panel-default">                                                        
                                                            <div class="panel-body">                                                                                                                        
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Item<span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9">                                                                    
                                                                        <select class="select2 form-control btn-block" name='product_id' required style="border-left: 1px solid #ccc;border-radius: 3px">
                                                                            <?php
                                                                            $query = mysql_query("select * from recipe where subrecipe=0 order by name");
                                                                            while ($row = mysql_fetch_array($query)) {
                                                                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>       
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Qty <span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9">                                                                    
                                                                        <input type="text" name="amount" class="form-control" placeholder=". . ." required="" autocomplete='off'>
                                                                    </div>
                                                                </div>
                                                            </div><!-- panel-body -->
                                                            <div class="panel-footer">
                                                                <div class="row">
                                                                    <div class="col-sm-9 col-sm-offset-3">
                                                                        <input type='hidden' name='recipe_id' value='<?php echo $id ?>/Success'>
                                                                        <input type='hidden' name='url' value='<?php echo $link ?>/<?php echo $id ?>/Success'>
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
                                                    <th>Name</th>
                                                    <th class="text-center" style="width: 200px">Qty</th>
                                                    <th class='no-sort text-center' width='180'>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 0;
                                                $query = mysql_query("select *,a.id as id,a.amount as amount from subrecipelog a, recipe b where a.subrecipe_id=b.id and a.recipe_id='$id'");
                                                while ($row = mysql_fetch_array($query)) {
                                                    $no++;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $no ?></td>                                                    
                                                        <td><?php echo $row['name'] ?></td>
                                                        <td>
                                                            <form onsubmit="return confirm('Are you sure you want to update Amount?');" method='post' action='Fungsi/globalupdate'>
                                                                <input type='hidden' name='id' value='<?php echo $row['id'] ?>'>
                                                                <input type='hidden' name='name_id' value='id'>
                                                                <input type='hidden' name='update_name' value='amount'>
                                                                <input type='hidden' name='table' value='subrecipelog'>                                                            
                                                                <input type='hidden' name='url' value='<?php echo base_url(); ?><?php echo $link ?>/<?php echo $id ?>/Success/Update'>
                                                                <button class='btn btn-success pull-right'><i class='glyphicon glyphicon-ok'></i></button> 
                                                                <input type='text' class="form-control border-radius0 pull-right" name='value' value='<?php echo $row['amount'] ?>' style="width: 120px">                                                    
                                                            </form> 
                                                        </td>
                                                        <td class='text-center'>                                                    
                                                            <div class="btn-group" role="group" aria-label="...">
                                                                <form onsubmit="return confirm('Are you sure you want to Delete?');" method='post' action='Fungsi/globaldelete'>
                                                                    <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                                                                    <input type='hidden' name='name_id' value='id'>
                                                                    <input type='hidden' name='table' value='subrecipelog'>
                                                                    <input type='hidden' name='url' value='<?php echo base_url(); ?><?php echo $link ?>/<?php echo $id ?>/Success/Deleted'>
                                                                    <button class='btn btn-danger'><i class='glyphicon glyphicon-remove'></i></button>
                                                                </form>
                                                            </div>                                        
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                if ($no == 0) {
                                                    ?>
                                                    <tr>
                                                        <td colspan="4" class="text-center">Please Add Sub Recipe or you can continue without sub recipe</td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>                                                                                        
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- panel -->
                            </div>
                        <?php } ?>
                    </div><!-- contentpanel -->

                </div><!-- mainpanel -->


                <?php include(APPPATH . "/views/rightpanel.php") ?>

        </section>

        <?php include(APPPATH . "/views/scriptmodule.php") ?>

    </body>
</html>
