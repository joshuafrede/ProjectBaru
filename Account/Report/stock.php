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
                                <div class='clearfix'></div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-2" style="padding: 0">
                                    <select class="select2 form-control btn-block" name='product_id' id="product" style="border-left: 1px solid #ccc;border-radius: 3px;height: 40px">
                                        <option value="">All Items</option>
                                        <?php
                                        $query = mysql_query("select * from product order by name");
                                        while ($row = mysql_fetch_array($query)) {
                                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                        }
                                        ?>
                                    </select>                          
                                </div>
                                <div class="col-md-2" style="padding: 0">
                                    <select class="select2 form-control btn-block" name='product_id' id="date" style="border-left: 1px solid #ccc;border-radius: 3px;height: 40px">
                                        <option value="123">Pick Date</option>
                                        <option value="">All Date</option>                                        
                                    </select>                          
                                </div>
                                <div id="divdate">
                                    <div class="col-md-2" style="padding: 0">
                                        <input type="text" class="form-control datepicker" placeholder="dd/mm/yyyy" id="from" name='date_from' required autocomplete='off' value="<?php echo date("d-m-Y") ?>">
                                    </div>
                                    <div class="col-md-2" style="padding: 0">
                                        <input type="text" class="form-control datepicker" placeholder="dd/mm/yyyy" id="to" name='date_to' required autocomplete='off' value="<?php echo date("d-m-Y") ?>">
                                    </div>
                                </div>
                                <div class="col-md-2" style="padding: 0">
                                    <select class="select2 form-control btn-block" name='product_id' id="type" required style="padding: 10px;border-left: 1px solid #ccc;border-radius: 3px;height: 40px">
                                        <option value="Report Pembelian">Report Pembelian</option>
                                        <option value="Report Transfer">Report Transfer</option>
                                        <option value="Buffer Control Gudang">Buffer Control Gudang</option>
                                        <option value="Buffer Control Kitchen">Buffer Control Kitchen</option>
                                    </select>                             
                                </div>
                                <div class="col-md-2" style="padding: 0">
                                    <button class="btn btn-success" id="submit">Go</button>                          
                                </div>
                                <div class="clearfix"></div>
                                <div class="table-responsive" id="data" style="margin-top: 10px">
                                    <?php
                                    $date = date("d-m-Y") . " - " . date("d-m-Y");
                                    ?>
                                    <label style="font-weight:bold;font-size: 18px">Report Pembelian <?php echo $date ?> </label>
                                    <table class="table mb40 table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Date</th>
                                                <th>Item</th>
                                                <th class="text-center">Qty</th>
                                                <th class="text-center">Price / Qty</th>
                                                <th class="text-center">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            $sumprice = 0;
                                            $date1 = date("Y-m-d");
                                            $date2 = date("Y-m-d");
                                            $query = mysql_query("select *,a.created_at as acreated_at from stocklog a, product b where
                                                    a.product_id=b.id and
                                                    a.type='+' and 
                                                    a.option='storage' and
                                                    a.tenant_id='" . $_SESSION['tenant'] . "' and 
                                                    a.created_at BETWEEN '$date1' AND '" . date("Y-m-d 00:00:00", strtotime($date2 . ' +1 day')) . "'                                      
                                                    order by a.id desc
");
                                            while ($row = mysql_fetch_array($query)) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $no ?></td>                                                    
                                                    <td><?php echo date("D, d-m-Y, H:i", strtotime($row['acreated_at'])); ?></td>
                                                    <td><?php echo $row['name'] ?></td>
                                                    <td class="text-center"><?php echo $row['value'] . " " . $row['unit'] ?></td>
                                                    <td class="text-right"><?php echo number_format($row['price'] / $row['value']) ?></td>
                                                    <td class="text-right"><?php echo number_format($row['price']) ?></td>
                                                </tr>
                                                <?php
                                                $sumprice+=$row['price'];
                                            }
                                            ?>  
                                            <tr>
                                                <td colspan="5" class="text-right"><strong>Total</strong></td>
                                                <td class="text-right"><?php echo number_format($sumprice) ?></td>
                                            </tr>
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
            $(document).ready(function() {
                $("#submit").click(function() {
                    $.ajax({
                        url: "Ajax/Report",
                        type: "post",
                        data: {
                            product: $("#product").val(),
                            from: $("#from").val(),
                            to: $("#to").val(),
                            type: $("#type").val(),
                            date: $("#date").val()
                        },
                        success: function(data) {
                            $("#data").html(data);
                        }
                    });
                });
                $("#date").change(function() {
                    if ($("#date").val() != "") {
                        $("#divdate").removeClass("collapse");
                    } else {
                        $("#divdate").addClass("collapse");
                    }
                });
            });
        </script>
    </body>
</html>
