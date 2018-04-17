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
                                <?php
                                $msg = "Ok";
                                $query = mysql_query("select * from product order by id desc");
                                while ($row = mysql_fetch_array($query)) {
                                    $querydalem = mysql_query("select * from stock where product_id='" . $row['id'] . "' and tenant_id='" . $_SESSION['tenant'] . "'");
                                    $stock = 0;
                                    $kitchen = 0;
                                    $system = 0;
                                    $actual = 0;
                                    if (mysql_num_rows($querydalem) > 0) {
                                        $resultdalem = mysql_fetch_array($querydalem);
                                        $stock = $resultdalem['qty_storage'];
                                        $kitchen = $resultdalem['qty_kitchen'];
                                        $system = $resultdalem['qty_system'];
                                        $actual = $resultdalem['qty_actual'];
                                    }
                                    if ($actual < ($system * 90 / 100)) {
                                        $msg = "Kurang";
                                        echo "class='danger'";
                                    }
                                }
                                if ($msg == "Ok") {
                                    ?>
                                    <form method='post' action='CSV/sync_actual'style='display:inline-block' class='pull-right' onsubmit="return confirm('Are you sure you want to Sync?');">
                                        <input type='hidden' name='url' value='Account/Kitchen/Success'>
                                        <button class='btn btn-success btn-xs'>Sync Actual</button>              
                                    </form>
                                    <?php
                                }
                                ?>                                                                      
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
                                                        <form method="post" action="Ajax/DownloadCSV">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label text-right">Where</label>
                                                                <div class="col-sm-9" style="padding: 0">    
                                                                    <select class="select2 form-control btn-block" name='belong' style="border-left: 1px solid #ccc;border-radius: 3px">
                                                                        <option value=''>All</option>
                                                                        <option value='Kitchen'>Kitchen</option>
                                                                        <option value='Bar'>Bar</option>
                                                                    </select>
                                                                </div>
                                                            </div> 
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
                                                                <label class="col-sm-3 control-label">Date<span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">                                                                    
                                                                    <input type="text" disabled="" name="value" class="form-control" placeholder=". . ." value="<?php echo date("d-m-Y") ?>" autocomplete='off'>
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
                                <div class="modal fade bs-example-modal-lg in" tabindex='-1' id='bs-example-modal-lg2' role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content" style='border-top-left-radius: 3px;border-top-right-radius: 3px'>
                                            <div class="modal-header panel-heading">
                                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                                <h4 class="modal-title panel-title">Add <?php echo $modulename ?></h4>
                                                <p>Please provide your name, email address (won't be published) and a comment.</p>
                                            </div>
                                            <div class="modal-body" style='padding: 0'>
                                                <form id="basicForm" action="Add/Stock/" class="form-horizontal" novalidate="novalidate" method='post' enctype="multipart/form-data">
                                                    <div class="panel panel-default">                                                        
                                                        <div class="panel-body">                                                            
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Item<span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">                                                                    
                                                                    <select class="select2 form-control btn-block" id='product_val' name='product_id_disabled' required style="border-left: 1px solid #ccc;border-radius: 3px" disabled>
                                                                        <?php
                                                                        $query = mysql_query("select * from product order by name");
                                                                        while ($row = mysql_fetch_array($query)) {
                                                                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . " (" . $row['unit'] . ")</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <input type='hidden' id='product_val_hidden' name='product_id' value=''>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Type<span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">                                                                    
                                                                    <select class="select2 form-control btn-block" name='type' required style="border-left: 1px solid #ccc;border-radius: 3px" id="type" readonly>
                                                                        <option value="-">- Pengurangan Barang</option>
                                                                        <!--                                                                        <option value="=">= Masukan Baru</option>-->
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Option<span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">                                                                    
                                                                    <select class="select2 form-control btn-block" name='option' required style="border-left: 1px solid #ccc;border-radius: 3px" id="option" readonly>
                                                                        <option value="kitchen">Kitchen</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div id="reason" style="margin-bottom: 15px">
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Reason<span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9">                                                                    
                                                                        <select class="select2 form-control btn-block" name='reason' required style="border-left: 1px solid #ccc;border-radius: 3px">
                                                                            <?php
                                                                            $query = mysql_query("select * from z_datacombo where name='reason' order by value");
                                                                            while ($row = mysql_fetch_array($query)) {
                                                                                echo "<option value='" . $row['value'] . "'>" . $row['value'] . "</option>";
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="pic" style="margin-bottom: 15px">
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Picture</label>
                                                                    <div class="col-sm-9">                                                                    
                                                                        <input type="file" name="mainpic" style="margin-top: 7px">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Qty<span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">                                                                    
                                                                    <input type="text" id='qty_val' name="value" class="form-control" placeholder=". . ." required="" value="0" autocomplete='off' readonly>
                                                                </div>
                                                            </div>
                                                            <div id="price" class='collapse'>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Price<span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9">                                                                    
                                                                        <input type="text" name="price" class="form-control" placeholder=". . ." required="" value="0" autocomplete='off'>
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
                                <?php
                                $filtervariable = "belong";
                                $filterquery = "select * from z_datacombo where name='item' order by value desc";
                                include(APPPATH . "views/Account/filter.php");
                                ?> 
                                <div class="table-responsive">
                                    <table class="table mb40 table-bordered" id='table1'>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>                                                
                                                <th>Buffer Kitchen</th>
                                                <th>Kitchen</th>
                                                <th>System</th>
                                                <th>Actual</th>
                                                <th>Status</th>
<!--                                                <th class='no-sort text-center' width='180'>Action</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            $query = mysql_query("select * from product where belong like '%$filter%' order by id desc");
                                            while ($row = mysql_fetch_array($query)) {
                                                $no++;
                                                $querydalem = mysql_query("select * from stock where product_id='" . $row['id'] . "' and tenant_id='" . $_SESSION['tenant'] . "'");
                                                $stock = 0;
                                                $kitchen = 0;
                                                $system = 0;
                                                $actual = 0;
                                                if (mysql_num_rows($querydalem) > 0) {
                                                    $resultdalem = mysql_fetch_array($querydalem);
                                                    $stock = $resultdalem['qty_storage'];
                                                    $kitchen = $resultdalem['qty_kitchen'];
                                                    $system = $resultdalem['qty_system'];
                                                    $actual = $resultdalem['qty_actual'];
                                                }
                                                ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>                                                    
                                                    <td><?php echo substr($row['belong'], 0, 1) . " - " . $row['name'] ?></td>                                               
                                                    <td><?php echo number_format($row['buffer_kitchen']) ?> <?php echo $row['unit'] ?></td>
                                                    <td <?php
                                                    if ($row['buffer_kitchen'] > $kitchen)
                                                        echo "class='danger'";
                                                    else
                                                        echo "class='success'";
                                                    ?>><?php echo $kitchen ?> <?php echo $row['unit'] ?></td>
                                                    <td <?php
                                                    if ($row['buffer_kitchen'] > $system)
                                                        echo "class='danger'";
                                                    else
                                                        echo "class='success'";
                                                    ?>><?php echo $system ?> <?php echo $row['unit'] ?></td>

                                                    <td <?php
                                                    $msg = "Ok";
                                                    if ($actual < ($system * 90 / 100)) {
                                                        $msg = "Kurang";
                                                        echo "class='danger'";
                                                    }
                                                    else
                                                        echo "class='success'";
                                                    ?>><?php echo $actual ?> <?php echo $row['unit'] ?></td>
                                                    <td>
                                                        <?php
                                                        echo $msg;
                                                        if ($msg == "Kurang") {
                                                            ?>
                                                            <a class="btn btn-danger btn-xs minusclick" item_id='<?php echo $row['id'] ?>' qty_item='<?php echo $kitchen - $actual ?>' data-toggle="modal" data-target="#bs-example-modal-lg2"><i class='fa fa-minus'></i></a>
                                                            <?php } ?>
                                                    </td>
    <!--                                                    <td class='text-center'>
                                                       <div class="btn-group" role="group" aria-label="...">
                                                           <a href=" <?php echo $link ?>/View/<?php echo $row['id'] ?>" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></a>                                        
                                                       </div>
                                                       <div class="btn-group" role="group" aria-label="...">
                                                           <a href="<?php echo $link ?>/Edit/<?php echo $row['id'] ?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a>                                        
                                                       </div>
                                                       <div class="btn-group" role="group" aria-label="...">
                                                           <form onsubmit="return confirm('Are you sure you want to Delete?');" method='post' action='Fungsi/globaldelete'>
                                                               <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                                                               <input type='hidden' name='name_id' value='id'>
                                                               <input type='hidden' name='table' value='product'>
                                                               <input type='hidden' name='url' value='<?php echo base_url(); ?><?php echo $link ?>/Success/Deleted'>
                                                               <button class='btn btn-danger'><i class='glyphicon glyphicon-remove'></i></button>
                                                           </form>
                                                       </div>                                        
                                                   </td>-->
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
