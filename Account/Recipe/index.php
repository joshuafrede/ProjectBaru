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
                                    <strong>Add Failed</strong> Item already exist</a>.
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
                                <a class="btn btn-info pull-right btn-xs"  data-toggle="modal" data-target="#bs-example-modal-lg"><i class='fa fa-plus'></i></a>
                                <div class="modal fade bs-example-modal-lg in" tabindex='-1' id='bs-example-modal-lg' role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content" style='border-top-left-radius: 3px;border-top-right-radius: 3px'>
                                            <div class="modal-header panel-heading">
                                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                <h4 class="modal-title panel-title">Add <?php echo $modulename ?></h4>
                                                <p><?php echo $nav_desc ?></p>
                                            </div>
                                            <div class="modal-body" style='padding: 0'>
                                                <form id="basicForm" action="Add/<?php echo nospace($nav) ?>/<?php echo nospace($nav_sub) ?>" class="form-horizontal" novalidate="novalidate" method='post'>
                                                    <div class="panel panel-default">                                                        
                                                        <div class="panel-body">     
                                                            <div class="form-group" id="divgroup">
                                                                <label class="col-sm-3 control-label">Group</label>
                                                                <div class="col-sm-9">                                                                    
                                                                    <select class="select2 form-control btn-block" name='group' style="border-left: 1px solid #ccc;border-radius: 3px">
                                                                        <option value="">-</option>
                                                                        <?php
                                                                        $query = mysql_query("select * from z_datacombo where name='recipe' order by name");
                                                                        while ($row = mysql_fetch_array($query)) {
                                                                            echo "<option value='" . $row['value'] . "'>" . $row['value'] . "</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Name <span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">                                                                    
                                                                    <input type="text" name="name" class="form-control" placeholder=". . ." required="" autocomplete='off'>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Sub Recipe<span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">                                                                    
                                                                    <select id="subrecipe" class="select2 form-control btn-block" name='subrecipe' required style="border-left: 1px solid #ccc;border-radius: 3px">
                                                                        <option value="1">Yes</option>
                                                                        <option value="0">No</option>                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group" id="divsubrecipe">
                                                                <label class="col-sm-3 control-label">Price<span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">                                                                    
                                                                    <input type="text" name="price" class="form-control" placeholder=". . ." required="" autocomplete='off' value="0">
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
                                <?php
                                $filtervariable = "recipegroup";
                                $filterquery = "select * from z_datacombo where name='recipe' order by value desc";
                                include(APPPATH . "views/Account/filter.php");
                                ?>                               
                                <div class="table-responsive">
                                    <table class="table mb40 table-bordered" id='table1'>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Sub Recipe</th>
                                                <th>Group</th>                                                
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th class='no-sort text-center' width='180'>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            $query = mysql_query("select * from recipe a where a.group like '%$filter%' order by updated_at desc");
                                            while ($row = mysql_fetch_array($query)) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>                                                                                                        
                                                    <td>
                                                        <?php
                                                        if ($row['subrecipe'] == "1") {
                                                            echo "Yes";
                                                        } else {
                                                            echo "No";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?php echo $row['group'] ?></td>
                                                    <td><?php echo $row['name'] ?></td>
                                                    <td>Rp <?php echo number_format($row['price']) ?></td>
                                                    <td class='text-center'>
                                                        <div class="btn-group" role="group" aria-label="...">
                                                            <a href=" <?php echo $link ?>/RecipeLog/<?php echo $row['id'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>                                        
                                                        </div>
                                                        <div class="btn-group" role="group" aria-label="...">
                                                            <a href="<?php echo $link ?>/Edit/<?php echo $row['id'] ?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a>                                        
                                                        </div>
                                                        <div class="btn-group" role="group" aria-label="...">
                                                            <form onsubmit="return confirm('Are you sure you want to Delete?');" method='post' action='Fungsi/globaldelete'>
                                                                <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                                                                <input type='hidden' name='name_id' value='id'>
                                                                <input type='hidden' name='table' value='recipe'>
                                                                <input type='hidden' name='url' value='<?php echo base_url(); ?><?php echo $link ?>/Success/Deleted'>
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
                    </div><!-- contentpanel -->

                </div><!-- mainpanel -->


                <?php include(APPPATH . "/views/rightpanel.php") ?>

        </section>

        <?php include(APPPATH . "/views/scriptmodule.php") ?>
        <script>
                                                            $('#subrecipe').change(function() {
                                                                if ($('#subrecipe').val() == "1") {
                                                                    $('#divsubrecipe').removeClass("collapse");
                                                                    $('#divgroup').removeClass("collapse");
                                                                } else if ($('#subrecipe').val() == "0") {
                                                                    $('#divsubrecipe').addClass("collapse");
                                                                    $('#divgroup').addClass("collapse");
                                                                }
                                                            });
        </script>
    </body>
</html>
