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
                                <a class="btn btn-info pull-right btn-xs"  data-toggle="modal" data-target="#bs-example-modal-lg"><i class='fa fa-plus'></i></a>
                                <div class="modal fade bs-example-modal-lg in" id='bs-example-modal-lg' role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" style='border-top-left-radius: 3px;border-top-right-radius: 3px'>
                                            <div class="modal-header panel-heading">
                                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                <h4 class="modal-title panel-title">Add <?php echo $modulename ?></h4>
                                                <p>Please provide your name, email address (won't be published) and a comment.</p>
                                            </div>
                                            <div class="modal-body" style='padding: 0'>
                                                <form id="basicForm" action="Add/<?php echo nospace($nav) ?>/<?php echo nospace($nav_sub) ?>" class="form-horizontal" novalidate="novalidate" method='post' enctype="multipart/form-data">
                                                    <div class="panel panel-default">                                                        
                                                        <div class="panel-body">
                                                            <div class='col-md-6'>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Picture <span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="file" name="mainpic" style="position: relative;top: 7px" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Picture 2 <span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="file" name="mainpic2" style="position: relative;top: 7px" required>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Category <span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control btn-block" name='category' required style="border-left: 1px solid #ccc;border-radius: 3px">
                                                                            <option value="">. . .</option>
                                                                            <?php
                                                                            $query = mysql_query("select * from m_category");
                                                                            while ($row = mysql_fetch_array($query)) {
                                                                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>                                                              
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Card ID <span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <select class="form-control btn-block" name='cardid' required style="border-left: 1px solid #ccc;border-radius: 3px">
                                                                            <option value="">. . .</option>
                                                                            <?php
                                                                            $query = mysql_query("select * from z_datacombo where name='cardid'");
                                                                            while ($row = mysql_fetch_array($query)) {
                                                                                echo "<option value='" . $row['value'] . "'>" . $row['value'] . " - " . $row['group'] . "</option>";
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Username <span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="username" class="form-control" placeholder=". . ." required="" autocomplete='off'>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Password <span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="password" class="form-control" placeholder=". . ." required="" autocomplete='off'>
                                                                    </div>
                                                                </div>                                                                
                                                            </div>
                                                            <div class='col-md-6'>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">PMID</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="pmid" class="form-control" placeholder=". . ." autocomplete='off'>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Name <span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="name" class="form-control" placeholder=". . ." required="" autocomplete='off'>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Location <span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="location" class="form-control" placeholder=". . ." required="" autocomplete='off'>
                                                                    </div>
                                                                </div>                                                            
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">City <span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="city" class="form-control" placeholder=". . ." required="" autocomplete='off'>
                                                                    </div>
                                                                </div>                                                            
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Latitude</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="lat" class="form-control" placeholder=". . ." autocomplete='off'>
                                                                    </div>
                                                                </div>                                                            
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Longitude</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="long" class="form-control" placeholder=". . ." autocomplete='off'>
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
                                                <th class="no-sort" width="300">Picture</th>
                                                <th>Category</th>
                                                <th>Name</th>
                                                <th>Location</th>
                                                <th>City</th>
                                                <th class='no-sort text-center' width='180'>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            $query = mysql_query("select * from merchant where deleted=0 order by id desc");
                                            while ($row = mysql_fetch_array($query)) {
                                                $no++;
                                                $querydalem = mysql_query("select * from m_category where id='" . $row['category_id'] . "'");
                                                $resultdalem = mysql_fetch_array($querydalem);
                                                ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><img src="<?php echo $row['pic'] ?>" width="300"></td>
                                                    <td><?php echo $resultdalem['name'] ?></td>
                                                    <td><?php echo $row['name'] ?></td>
                                                    <td><?php echo $row['location'] ?></td>
                                                    <td><?php echo $row['city'] ?></td>
                                                    <td class='text-center'>
                                                        <div class="btn-group" role="group" aria-label="...">
                                                            <a href="<?php echo $link ?>/View/<?php echo $row['id'] ?>" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></a>                                        
                                                        </div>
                                                        <div class="btn-group" role="group" aria-label="...">
                                                            <a href="<?php echo $link ?>/Edit/<?php echo $row['id'] ?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a>                                        
                                                        </div>
                                                        <div class="btn-group" role="group" aria-label="...">
                                                            <form onsubmit="return confirm('Are you sure you want to Delete?');" method='post' action='Fungsi/globalupdate'>
                                                                <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                                                                <input type='hidden' name='name_id' value='id'>
                                                                <input type='hidden' name='update_name' value='deleted'>
                                                                <input type='hidden' name='table' value='merchant'>
                                                                <input type='hidden' name='value' value='1'>
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

    </body>
</html>
