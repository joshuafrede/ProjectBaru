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
                                                <form id="basicForm" action="Add/<?php echo nospace($nav) ?>/<?php echo nospace($nav_sub) ?>" class="form-horizontal" method='post' enctype="multipart/form-data">
                                                    <div class="panel panel-default">                                                        
                                                        <div class="panel-body">                                                            
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Item<span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">                                                                    
                                                                    <select class="select2" name='product_id' required style="border-left: 1px solid #ccc;border-radius: 3px">
                                                                        <option value="">Pilih Item</option>
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
                                                                <label class="col-sm-3 control-label">Type<span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">                                                                    
                                                                    <select class="select2" name='type' required style="border-left: 1px solid #ccc;border-radius: 3px" id="type">
                                                                        <option value="+">+ Penambahan Barang</option>
                                                                        <option value="-">- Pengurangan Barang</option>
                                                                        <!--                                                                        <option value="=">= Masukan Baru</option>-->
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Option<span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">                                                                    
                                                                    <select class="select2" name='option' required style="border-left: 1px solid #ccc;border-radius: 3px" id="option">
                                                                        <option value="storage">Gudang</option>
                                                                        <option value="kitchen">Kitchen</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div id="reason" style="margin-bottom: 15px">
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label">Reason<span class="asterisk">*</span></label>
                                                                    <div class="col-sm-9">                                                                    
                                                                        <select class="select2" name='reason' required style="border-left: 1px solid #ccc;border-radius: 3px">                                                                            
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
                                                                    <input type="text" name="value" class="form-control" placeholder=". . ." required="" value="0" autocomplete='off'>
                                                                </div>
                                                            </div>
                                                            <div id="price">
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
                                                <th>Buffer Gudang</th>
                                                <th>Gudang</th>
                                                <th>Buffer Kitchen</th>
                                                <th>Kitchen</th>
                                                <th>System</th>
<!--                                                <th class='no-sort text-center' width='180'>Action</th>-->
                                            </tr>
                                        </thead>
                                        <thead>
                                            <?php
                                            $queryrecent = mysql_query("select * from stocklog where tenant_id='" . $_SESSION['tenant'] . "' order by id desc limit 1");
                                            $resultrecent = mysql_fetch_array($queryrecent);
                                            $query = mysql_query("select * from product where belong like '%$filter%' and id='" . $resultrecent['product_id'] . "' order by id desc");
                                            while ($row = mysql_fetch_array($query)) {
                                                $querydalem = mysql_query("select * from stock where product_id='" . $row['id'] . "' and tenant_id='" . $_SESSION['tenant'] . "'");
                                                $stock = 0;
                                                $kitchen = 0;
                                                $system = 0;
                                                if (mysql_num_rows($querydalem) > 0) {
                                                    $resultdalem = mysql_fetch_array($querydalem);
                                                    $stock = $resultdalem['qty_storage'];
                                                    $kitchen = $resultdalem['qty_kitchen'];
                                                    $system = $resultdalem['qty_system'];
                                                }
                                                ?>
                                                <tr>
                                                    <td><?php echo "Recent" ?></td>                                                    
                                                    <td><?php echo substr($row['belong'], 0, 1) . " - " . $row['name'] ?></td>
                                                    <td><?php echo number_format($row['buffer']) ?> <?php echo $row['unit'] ?></td>
                                                    <td <?php
                                                    if ($row['buffer'] > $stock)
                                                        echo "class='danger'";
                                                    else
                                                        echo "class='success'";
                                                    ?>><?php echo number_format($stock) ?> <?php echo $row['unit'] ?></td>
                                                    <td><?php echo number_format($row['buffer_kitchen']) ?> <?php echo $row['unit'] ?></td>
                                                    <td <?php
                                                    if ($row['buffer_kitchen'] > $kitchen)
                                                        echo "class='danger'";
                                                    else
                                                        echo "class='success'";
                                                    ?>><?php echo number_format($kitchen) ?> <?php echo $row['unit'] ?></td>
                                                    <td <?php
                                                    if ($row['buffer_kitchen'] > $system)
                                                        echo "class='danger'";
                                                    else
                                                        echo "class='success'";
                                                    ?>><?php echo number_format($system) ?> <?php echo $row['unit'] ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>          
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
                                                if (mysql_num_rows($querydalem) > 0) {
                                                    $resultdalem = mysql_fetch_array($querydalem);
                                                    $stock = $resultdalem['qty_storage'];
                                                    $kitchen = $resultdalem['qty_kitchen'];
                                                    $system = $resultdalem['qty_system'];
                                                }
                                                ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>                                                    
                                                    <td><?php echo substr($row['belong'], 0, 1) . " - " . $row['name'] ?></td>
                                                    <td><?php echo number_format($row['buffer']) ?> <?php echo $row['unit'] ?></td>
                                                    <td <?php
                                                    if ($row['buffer'] > $stock)
                                                        echo "class='danger'";
                                                    else
                                                        echo "class='success'";
                                                    ?>><?php echo number_format($stock) ?> <?php echo $row['unit'] ?></td>
                                                    <td><?php echo number_format($row['buffer_kitchen']) ?> <?php echo $row['unit'] ?></td>
                                                    <td <?php
                                                    if ($row['buffer_kitchen'] > $kitchen)
                                                        echo "class='danger'";
                                                    else
                                                        echo "class='success'";
                                                    ?>><?php echo number_format($kitchen) ?> <?php echo $row['unit'] ?></td>
                                                    <td <?php
                                                    if ($row['buffer_kitchen'] > $system)
                                                        echo "class='danger'";
                                                    else
                                                        echo "class='success'";
                                                    ?>><?php echo $system ?> <?php echo $row['unit'] ?></td>
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

        <?php include(APPPATH . "/views/scriptmodulenew.php") ?>
        <script>
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
