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
                                $query = mysql_query("select * from supplier where id='$id'");
                                $result = mysql_fetch_array($query);
                                ?>
                                <a class="btn btn-info pull-left btn-xs" href='Account/Supplier' style='margin-right: 5px'><i class='fa fa-arrow-left'></i></a>
                                <h3 class="panel-title pull-left" style='margin-top:5px'><?php echo $result['name'] ?></h3>
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
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Supplier <span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">                                                                    
                                                                    <select class="select2" name='supplier_id' required disabled>
                                                                        <?php
                                                                        $idsup = 0;
                                                                        $query = mysql_query("select * from supplier where id='$id' order by name");
                                                                        while ($row = mysql_fetch_array($query)) {
                                                                            $idsup = $row['id'];
                                                                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <input type='hidden' name='supplier_id' value='<?php echo $idsup; ?>'>
                                                                </div>
                                                            </div> 
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Item</label>
                                                                <div class="col-sm-9">
                                                                    <select class="select2" multiple data-placeholder="Choose an Item" name='product_id[]' >
                                                                        <?php
                                                                        $query = mysql_query("select * from product order by name");
                                                                        while ($row = mysql_fetch_array($query)) {
                                                                            $querydalem = mysql_query("select * from supplierlog where supplier_id='$idsup' and product_id='" . $row['id'] . "'");
                                                                            if (mysql_num_rows($querydalem) == 0) {
                                                                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
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
                                <div class='well'>
                                    <table style="width: 100%">
                                        <tr>
                                            <td>
                                                <strong>Informasi Supplier :</strong><br>
                                                <?php if ($result['email'] != "") echo "Email : " . $result['email'] . "<br>" ?>                                                
                                                <?php if ($result['phone1'] != "") echo "Phone 1 : " . $result['phone1'] . "<br>" ?>
                                                <?php if ($result['phone2'] != "") echo "Phone 2 : " . $result['phone2'] . "<br>" ?>
                                                <?php if ($result['website'] != "") echo "Website : " . $result['website'] ?>
                                            </td>
                                            <td> 
                                                <?php if ($result['address'] != "") echo "Address : " . nl2br($result['address']) . "<br>" ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <button id="togglehideitem" class="btn btn-success pull-right" style="margin-bottom: 5px;margin-top: -15px">Toggle Editing</button>
                                <div class="table-responsive">
                                    <table class="table mb40 table-bordered" id='table1'>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center hideitem">Unit</th>
                                                <th class='no-sort text-center hideitem' width='180'>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            $query = mysql_query("select * from supplierlog where supplier_id='$id'");
                                            while ($row = mysql_fetch_array($query)) {
                                                $no++;
                                                $querydalem = mysql_query("select * from product where id='" . $row['product_id'] . "'");
                                                $resultdalem = mysql_fetch_array($querydalem);
                                                ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>                                                    
                                                    <td><?php echo $resultdalem['name'] ?></td>        
                                                    <td class="text-center hideitemright">
                                                        Rp <?php echo number_format($row['price']) ?> / <?php
                                                        $unit = $resultdalem['unit'];
                                                        if ($row['unit'] != "") {
                                                            $unit = $row['unit'];
                                                        }
                                                        echo $unit;
                                                        ?>
                                                        <form class="hideitem" onsubmit="return confirm('Are you sure you want to update Price?');" method='post' action='Fungsi/globalupdate'>
                                                            <input type='hidden' name='id' value='<?php echo $row['id'] ?>'>
                                                            <input type='hidden' name='name_id' value='id'>
                                                            <input type='hidden' name='update_name' value='price'>
                                                            <input type='hidden' name='table' value='supplierlog'>                                                            
                                                            <input type='hidden' name='url' value='<?php echo base_url(); ?><?php echo $link ?>/<?php echo $id ?>/Success/Update'>
                                                            <div class='row' style='margin:0'>
                                                                <button class='btn btn-success pull-right' style='height: 40px;width: 48px'><i class='glyphicon glyphicon-ok'></i></button> 
                                                                <input type='text' class="form-control border-radius0 pull-right" name='value' value='<?php echo $row['price'] ?>' style="width: 120px">                                                    
                                                            </div>
                                                        </form>               
                                                    </td>
                                                    <td class="text-center hideitem">
                                                        <?php
                                                        echo $unit;
                                                        ?>
                                                        <form onsubmit="return confirm('Are you sure you want to update Unit?');" method='post' action='Fungsi/globalupdate'>
                                                            <input type='hidden' name='id' value='<?php echo $row['id'] ?>'>
                                                            <input type='hidden' name='name_id' value='id'>
                                                            <input type='hidden' name='update_name' value='unit'>
                                                            <input type='hidden' name='table' value='supplierlog'>                                                            
                                                            <input type='hidden' name='url' value='<?php echo base_url(); ?><?php echo $link ?>/<?php echo $id ?>/Success/Update'>
                                                            <button class='btn btn-success pull-right' style='height: 40px;width: 48px'><i class='glyphicon glyphicon-ok'></i></button> 
                                                            <input type='text' class="form-control border-radius0 pull-right" name='value' value='<?php echo $unit ?>' style="width: 120px">                                                    
                                                        </form>               
                                                    </td>
                                                    <td class='text-center hideitem'>
                                                        <div class="btn-group" role="group" aria-label="...">
                                                            <form onsubmit="return confirm('Are you sure you want to Delete?');" method='post' action='Fungsi/globaldelete'>
                                                                <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                                                                <input type='hidden' name='name_id' value='id'>
                                                                <input type='hidden' name='table' value='supplierlog'>
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
                    </div><!-- contentpanel -->

                </div><!-- mainpanel -->


                <?php include(APPPATH . "/views/rightpanel.php") ?>

        </section>
        <?php include(APPPATH . "/views/scriptmodulenew.php") ?>


    </body>
</html>
