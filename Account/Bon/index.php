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
                                <div class="modal fade bs-example-modal-lg in" tabindex='-1' id='bs-example-modal-lg' role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content" style='border-top-left-radius: 3px;border-top-right-radius: 3px'>
                                            <div class="modal-header panel-heading">
                                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                <h4 class="modal-title panel-title">Add <?php echo $modulename ?></h4>
                                                <p><?php echo $nav_desc ?></p>
                                            </div>
                                            <div class="modal-body" style='padding: 0'>
                                                <div class="panel panel-default" style="margin-bottom: -30px">                                                        
                                                    <div class="panel-body"> 
                                                        <form method="post" action="Ajax/DownloadBonCSV">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label text-right">CSV Template</label>
                                                                <div class="col-sm-9" style="padding: 0">                                                                     
                                                                    <button class="btn btn-primary btn-sm" style="margin: 0" id="download">Download</button>                                                                
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>    
                                                </div>    
                                                <form id="basicForm" action="Add/<?php echo nospace($nav) ?>/<?php echo nospace($nav_sub) ?>" class="form-horizontal" novalidate="novalidate" method='post' enctype="multipart/form-data">
                                                    <div class="panel panel-default">                                                        
                                                        <div class="panel-body">                                                                                                                                                                                 
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Date <span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control datepicker" placeholder="dd-mm-yyyy"  name='date' value='<?php echo date("d-m-Y") ?>' required autocomplete='off'>
                                                                </div>                    
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">CSV File</label>
                                                                <div class="col-sm-9">                                                                    
                                                                    <input type="file" name="mainpic" style="margin-top: 7px">
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
                                                <th>Date</th>                                                
                                                <th class='text-center'>Total</th>
                                                <th>Status</th>
                                                <th class='no-sort text-center' width='180'>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            $query = mysql_query("select * from bon where tenant_id='" . $_SESSION['tenant'] . "' order by name desc");
                                            while ($row = mysql_fetch_array($query)) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>                                                    
                                                    <td><?php echo date("D, d-m-Y", strtotime($row['name'])) ?></td>       
                                                    <td class="text-right">
                                                        <?php
                                                        if ($row['total'] != 0) {
                                                            echo "Rp " . number_format($row['total']);
                                                        } else {
                                                            echo '-';
                                                        }
                                                        ?>
                                                    </td>  
                                                    <td>
                                                        <?php
                                                        if ($row['status'] == 0) {
                                                            echo "Not Finished";
                                                        } else {
                                                            echo "Finished";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class='text-center'>
                                                        <?php if ($row['status'] == 0) { ?>
                                                            <div class="btn-group" role="group" aria-label="...">
                                                                <a href=" <?php echo $link ?>/BonLog/<?php echo $row['id'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>                                        
                                                            </div>
                                                            <div class="btn-group" role="group" aria-label="...">
                                                                <a href="<?php echo $link ?>/Edit/<?php echo $row['id'] ?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a>                                        
                                                            </div>
                                                            <div class="btn-group" role="group" aria-label="...">                                                            
                                                                <form onsubmit="return confirm('Are you sure you want to Delete?');" method='post' action='Fungsi/globaldelete'>
                                                                    <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                                                                    <input type='hidden' name='name_id' value='id'>
                                                                    <input type='hidden' name='table' value='bon'>
                                                                    <input type='hidden' name='id2' value='<?php echo $row['id']; ?>'>
                                                                    <input type='hidden' name='name_id2' value='bon_id'>
                                                                    <input type='hidden' name='table2' value='bonlog'>
                                                                    <input type='hidden' name='url' value='<?php echo base_url(); ?><?php echo $link ?>/Success/Deleted'>
                                                                    <button class='btn btn-danger'><i class='glyphicon glyphicon-remove'></i></button>
                                                                </form>
                                                            </div>        
                                                        <?php } else { ?>                                                           
                                                            <?php
                                                            if ($_SESSION['level'] == "2") {
                                                                ?>
                                                                <div class="btn-group" role="group" aria-label="...">
                                                                    <a href=" <?php echo $link ?>/BonLog/<?php echo $row['id'] ?>" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i></a>                                        
                                                                </div>
                                                                <div class="btn-group" role="group" aria-label="...">
                                                                    <a href="<?php echo $link ?>/Edit/<?php echo $row['id'] ?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a>                                        
                                                                </div>
                                                                <div class="btn-group" role="group" aria-label="...">                                                            
                                                                    <form onsubmit="return confirm('Are you sure you want to Delete?');" method='post' action='Fungsi/globaldelete'>
                                                                        <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                                                                        <input type='hidden' name='name_id' value='id'>
                                                                        <input type='hidden' name='table' value='bon'>
                                                                        <input type='hidden' name='id2' value='<?php echo $row['id']; ?>'>
                                                                        <input type='hidden' name='name_id2' value='bon_id'>
                                                                        <input type='hidden' name='table2' value='bonlog'>
                                                                        <input type='hidden' name='url' value='<?php echo base_url(); ?><?php echo $link ?>/Success/Deleted'>
                                                                        <button class='btn btn-danger'><i class='glyphicon glyphicon-remove'></i></button>
                                                                    </form>
                                                                </div>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <div class="btn-group" role="group" aria-label="...">
                                                                    <a href=" <?php echo $link ?>/BonLog/<?php echo $row['id'] ?>" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i></a>                                        
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
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
                                                            $('.minusclick').click(function() {
                                                                $('#qty_val').val($(this).attr("qty_item"));
                                                                $('#product_val').val($(this).attr("item_id"));
                                                                $('#product_val_hidden').val($(this).attr("item_id"));
                                                            });
                                                            if ($('#type').val() == "+") {
                                                                $('#reason').addClass("collapse");
                                                                $('#pic').addClass("collapse");
                                                            } else if ($('#type').val() == "-") {

                                                            }
                                                            $('#type').change(function() {
                                                                if ($('#type').val() == "+") {
                                                                    $('#reason').addClass("collapse");
                                                                    $('#price').removeClass("collapse");
                                                                    $('#pic').addClass("collapse");
                                                                } else if ($('#type').val() == "-") {
                                                                    $('#price').addClass("collapse");
                                                                    $('#pic').removeClass("collapse");
                                                                    $('#reason').removeClass()("collapse");
                                                                }
                                                            });
                                                            $('#option').change(function() {
                                                                if ($('#option').val() == "storage") {
                                                                    $('#price').removeClass("collapse");
                                                                } else if ($('#option').val() == "kitchen") {
                                                                    $('#price').addClass("collapse");
                                                                }
                                                            });
        </script>
    </body>
</html>
