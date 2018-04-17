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
                                    <strong>Add Failed</strong> Penambahan point sedang tidak tersedia</a>.
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
                                                <p>Please provide your name, email address (won't be published) and a comment.</p>
                                            </div>
                                            <div class="modal-body" style='padding: 0'>
                                                <form id="basicForm" action="Add/<?php echo nospace($nav) ?>/<?php echo nospace($nav_sub) ?>" class="form-horizontal" novalidate="novalidate" method='post'>
                                                    <div class="panel panel-default">                                                        
                                                        <div class="panel-body">                                                            
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Customer <span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">
                                                                    <select class="form-control btn-block" name='customer_id' required style="border-left: 1px solid #ccc;border-radius: 3px">
                                                                        <?php
                                                                        $query = mysql_query("select * from customer where merchant_id='" . $_SESSION['merchant'] . "'");
                                                                        while ($row = mysql_fetch_array($query)) {
                                                                            echo "<option value='" . $row['id'] . "'>" . $row['first_name'] . "</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Payment <span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">
                                                                    <select class="form-control btn-block" name='payment' required style="border-left: 1px solid #ccc;border-radius: 3px">
                                                                        <option value="">. . .</option>
                                                                        <?php
                                                                        $query = mysql_query("select * from m_payment where merchant_id='" . $_SESSION['merchant'] . "'");
                                                                        while ($row = mysql_fetch_array($query)) {
                                                                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Amount <span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">                                                                    
                                                                    <input type="text" name="amount" class="form-control" placeholder=". . ." required="" autocomplete='off'>
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
                                <label>Default Functionality</label>                                
                                <div class="table-responsive">
                                    <table class="table mb40 table-bordered" id='table1'>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Amount</th>
                                                <th>1 Point</th>
                                                <th>Point</th>
                                                <th>Date</th>
<!--                                                <th class='no-sort text-center' width='180'>Action</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            $query = mysql_query("select *, a.id as id, a.point as point from log_transaction a, customer b, p_formula c where
                                                a.customer_id=b.id and
                                                a.merchant_id='" . $_SESSION['merchant'] . "' and
                                                a.formula=c.id
                                                order by a.id desc");
                                            while ($row = mysql_fetch_array($query)) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $row['first_name'] . " " . $row['last_name'] ?></td>
                                                    <td><?php echo $row['name'] ?></td>
                                                    <td>Rp <?php echo number_format($row['amount']) ?></td>
                                                    <td>Rp <?php echo number_format($row['min']) ?></td>
                                                    <td><?php echo $row['point'] ?></td>
                                                    <td><?php echo date("d-m-Y", strtotime($row['date'])) ?></td>
        <!--                                                    <td class='text-center'>
                                                            <div class="btn-group" role="group" aria-label="...">
                                                                <a href="<?php echo $link ?>/View/<?php echo $row['id'] ?>" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></a>                                        
                                                            </div>
                                                            <div class="btn-group" role="group" aria-label="...">
                                                                <a href="<?php echo $link ?>/Edit/<?php echo $row['id'] ?>" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a>                                        
                                                            </div>
                                                            <div class="btn-group" role="group" aria-label="...">
                                                                <form onsubmit="return confirm('Are you sure you want to Delete?');" method='post' action='Fungsi/globaldelete'>
                                                                    <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                                                                    <input type='hidden' name='name_id' value='id'>
                                                                    <input type='hidden' name='table' value='customer'>
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

    </body>
</html>
