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
                                                            <!--                                                            <div class="form-group">
                                                                                                                            <label class="col-sm-3 control-label">Payment <span class="asterisk">*</span></label>
                                                                                                                            <div class="col-sm-9">
                                                                                                                                <select class="form-control btn-block" name='payment' required style="border-left: 1px solid #ccc;border-radius: 3px">                                                                        
                                                            <?php
                                                            $query = mysql_query("select * from m_payment where merchant_id='" . $_SESSION['merchant'] . "'");
                                                            while ($row = mysql_fetch_array($query)) {
                                                                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                                            }
                                                            ?>
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                        </div>-->
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Amount <span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">                                                                    
                                                                    <input type="text" name="amount" class="form-control" placeholder=". . ." required="" autocomplete='off'>
                                                                </div>
                                                            </div> 
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label">Status <span class="asterisk">*</span></label>
                                                                <div class="col-sm-9">
                                                                    <select class="form-control btn-block" name='status' required style="border-left: 1px solid #ccc;border-radius: 3px" disabled>
                                                                        <?php
                                                                        $query = mysql_query("select * from z_datacombo where name='StatusBill' order by value desc");
                                                                        $statusvalue = "";
                                                                        while ($row = mysql_fetch_array($query)) {
                                                                            $statusvalue = $row['value'];
                                                                            echo "<option value='" . $row['value'] . "'>" . $row['value'] . "</option>";
                                                                            break;
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <input type="hidden" name="status" value="<?php echo $statusvalue ?>">
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
                                                <th>Date</th>
                                                <th colspan='2'>ID - Name</th>
                                                <th>Payment</th>                 
                                                <th>Amount</th>                 
                                                <th>Status</th>                 
                                                <th class='no-sort text-center' width='180'>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysql_query("select * from merchant where id='" . $_SESSION['merchant'] . "'");
                                            $result = mysql_fetch_array($query);
                                            $idcard = $result['cardid'];
                                            $pmid = $result['pmerchant_id'];
                                            $no = 0;
                                            $arraytenant = array();
                                            $arraycid = array();
                                            $querytenant = mysql_query("select * from m_tenant where merchant_id='" . $_SESSION['merchant'] . "'");
                                            while ($rowtenant = mysql_fetch_array($querytenant)) {
                                                $arraytenant[] = $rowtenant['id'];
                                                $arraycid[] = $rowtenant['cid'];
                                            }
                                            $query = mysql_query("select *, a.id as id,b.id as custid from bill a, customer b where a.customer_id=b.id and a.merchant_id='" . $_SESSION['merchant'] . "' order by a.id desc");
                                            while ($row = mysql_fetch_array($query)) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo date("d-m-Y", strtotime($row['date'])) ?></td>
                                                    <td>
                                                        <?php
                                                        $temp = "";
                                                        if ($idcard == "Alternate ID") {
                                                            $notenant = 0;
                                                            foreach ($arraytenant as $a) {
                                                                $notenant++;
                                                                if ($row['tenant_id'] == $a) {
                                                                    break;
                                                                }
                                                            }
                                                            $temp.=str_pad($notenant, 3, '0', STR_PAD_LEFT) . str_pad($no, 5, '0', STR_PAD_LEFT);
                                                        } else if ($idcard == "Normal ID") {
                                                            $notenant = 0;
                                                            $texttenant = "";
                                                            foreach ($arraytenant as $a) {
                                                                if ($row['tenant_id'] == $a) {
                                                                    $texttenant = $arraycid[$notenant];
                                                                    break;
                                                                }
                                                                $notenant++;
                                                            }
                                                            $temp.=$texttenant . str_pad($no, 5, '0', STR_PAD_LEFT);
                                                        } elseif ($idcard == "PAlternate ID") {
                                                            $notenant = 0;
                                                            foreach ($arraytenant as $a) {
                                                                $notenant++;
                                                                if ($row['tenant_id'] == $a) {
                                                                    break;
                                                                }
                                                            }
                                                            $temp.=$pmid . str_pad($notenant, 3, '0', STR_PAD_LEFT) . str_pad($no, 5, '0', STR_PAD_LEFT);
                                                        } elseif ($idcard == "PNormal ID") {
                                                            $notenant = 0;
                                                            $texttenant = "";
                                                            foreach ($arraytenant as $a) {
                                                                if ($row['tenant_id'] == $a) {
                                                                    $texttenant = $arraycid[$notenant];
                                                                    break;
                                                                }
                                                                $notenant++;
                                                            }
                                                            $temp.=$pmid . $texttenant . str_pad($no, 5, '0', STR_PAD_LEFT);
                                                        }
                                                        echo $temp;
                                                        ?>
                                                    </td>
                                                    <td><?php echo $row['first_name'] . " " . $row['last_name'] ?></td>
                                                    <td>
                                                        <?php
                                                        $querypayment = mysql_query("select * from m_payment where id='" . $row['payment_id'] . "'");
                                                        $resultpayment = mysql_fetch_array($querypayment);
                                                        echo $resultpayment['name'];
                                                        if ($resultpayment == null) {
                                                            echo "-";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>Rp <?php echo number_format($row['amount']) ?></td>
                                                    <td><?php echo $row['status'] ?></td>
                                                    <td class='text-center'>
                                                        <?php
                                                        if ($row['status'] == "Unpaid") {
                                                            ?>
                                                            <div class="btn-group" role="group" aria-label="...">
                                                                <a href="<?php echo $link ?>/Edit/<?php echo $row['id'] ?>" class="btn btn-success"><i class='glyphicon glyphicon-hand-right'></i> Pay</a>                                        
                                                            </div>
<!--                                                            <div class="btn-group" role="group" aria-label="...">
                                                                <form onsubmit="return confirm('Are you sure you want to make this paid ?');" method='post' action='Edit/<?php echo nospace($nav) ?>/<?php echo nospace($nav_sub) ?>'>
                                                                    <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>                                                                
                                                                    <input type='hidden' name='url' value='<?php echo $link ?>/Success'>
                                                                    <input type='hidden' name='url2' value='<?php echo $link ?>/Failed'>
                                                                    <button class='btn btn-success'><i class='glyphicon glyphicon-hand-right'></i> Pay</button>
                                                                </form>
                                                            </div>                       -->
                                                            <?php
                                                        } else {
                                                            echo "-";
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

    </body>
</html>
