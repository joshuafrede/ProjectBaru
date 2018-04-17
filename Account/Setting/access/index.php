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
                                <div class="modal fade bs-example-modal-lg in" id='bs-example-modal-lg' role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
                                    <div class="modal-dialog modal-lg">
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
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Name <span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="name" class="form-control" placeholder=". . ." required="" autocomplete='off'>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Title</label>
                                                                <div class="col-sm-9">
<!--                                                                    <input type="text" name="title" class="form-control" placeholder=". . ." required="" autocomplete='off'>-->
                                                                    <select class="select2 form-control btn-block" name='title' style="border-left: 1px solid #ccc;border-radius: 3px" id="title">
                                                                        <option value="">-</option>
                                                                        <?php
                                                                        $query = mysql_query("select * from z_datacombo where name='title' order by name");
                                                                        while ($row = mysql_fetch_array($query)) {
                                                                            echo "<option value='" . $row['value'] . "'>" . $row['value'] . "</option>";
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
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Tenant <span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">                                                                    
                                                                    <select class="select2 form-control btn-block" name='tenant' required style="border-left: 1px solid #ccc;border-radius: 3px">
                                                                        <?php
                                                                        $query = mysql_query("select * from tenant where id!=0 order by name");
                                                                        while ($row = mysql_fetch_array($query)) {
                                                                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group" style='margin-bottom: 0'>
                                                                <label class="col-sm-3 control-label">Access <span class="asterisk">*</span></label>
                                                                <div class="col-sm-9" style='padding:0'>
                                                                    <div class="input-group mb15" style='padding-left: 10px' id="access">
                                                                        <?php
                                                                        $query = mysql_query("select * from z_module where parent=''");
                                                                        while ($row = mysql_fetch_array($query)) {
                                                                            ?>
                                                                                    <!--label style="margin:0px !important;font-weight: bold"><?php echo $row['title'] ?></label-->
                                                                            <?php
                                                                            $querydalem = mysql_query("select * from z_module where parent='" . $row['title'] . "'  and master=0");
                                                                            while ($rowdalem = mysql_fetch_array($querydalem)) {
                                                                                $checked = "";
                                                                                foreach (explode("~", $result['access']) as $a) {
                                                                                    if ($a == $rowdalem['id']) {
                                                                                        $checked = "checked";
                                                                                    }
                                                                                }
                                                                                ?>
                                                                                <div class="checkbox block"><label><input type="checkbox" name='access[]' value='<?php echo $rowdalem['id'] ?>' checked> <?php echo $rowdalem['subtitle'] ?></label></div>   
                                                                                <?php
                                                                            }
                                                                            if (mysql_num_rows($querydalem) == 0) {
                                                                                $checked = "";
                                                                                foreach (explode("~", $result['access']) as $a) {
                                                                                    if ($a == $row['id']) {
                                                                                        $checked = "checked";
                                                                                    }
                                                                                }
                                                                                ?>
                                                                                <div class="checkbox block"><label><input type="checkbox" name='access[]' value='<?php echo $row['id'] ?>' checked> <?php echo $row['title'] ?></label></div>   
                                                                                <?php
                                                                            }
                                                                        }
                                                                        if (mysql_num_rows($query) == 0) {
                                                                            ?>
                                                                            <input type='hidden' name='access[]' value=''>
                                                                            <div class="checkbox block"><label><input type="checkbox" checked disabled>All</label></div>
                                                                            <?php
                                                                        }
                                                                        ?>                                                                        
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
                                                <th>Name</th>
                                                <th>Title</th>
                                                <th>Username</th>
                                                <th>Tenant</th>
                                                <th class='no-sort text-center' width='180'>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            $query = mysql_query("select *,a.name as aname,b.name as bname,a.id as id from admin a, tenant b where tenant != 0 and a.tenant=b.id");
                                            while ($row = mysql_fetch_array($query)) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>                                                    
                                                    <td><?php echo $row['aname'] ?></td>
                                                    <td><?php echo $row['title'] ?></td>
                                                    <td><?php echo $row['username'] ?></td>
                                                    <td><?php echo $row['bname'] ?></td>
                                                    <td class='text-center'>
                                                        <!--                                                        <div class="btn-group" role="group" aria-label="...">
                                                                                                                    <a href="<?php echo $link ?>/View/<?php echo $row['id'] ?>" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></a>                                        
                                                                                                                </div>-->
                                                        <div class="btn-group" role="group" aria-label="...">
                                                            <a href="<?php echo $link ?>/Edit/<?php echo $row['id'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>                                        
                                                        </div>
                                                        <div class="btn-group" role="group" aria-label="...">
                                                            <form onsubmit="return confirm('Are you sure you want to Delete?');" method='post' action='Fungsi/globaldelete'>
                                                                <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                                                                <input type='hidden' name='name_id' value='id'>
                                                                <input type='hidden' name='table' value='admin'>
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
                                                            $("#title").change(function() {
                                                                $.ajax({
                                                                    url: "Ajax/Access",
                                                                    type: "post",
                                                                    data: {
                                                                        access: $("#title").val(),
                                                                    },
                                                                    success: function(data) {
                                                                        $("#access").html(data);
                                                                    }
                                                                });
                                                            });
        </script>
    </body>
</html>
