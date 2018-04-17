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
                                <div class="table-responsive">
                                    <table class="table mb40 table-bordered" id='table1'>
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Supplier</th>
                                                <th>Price</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            $query = mysql_query("select *,a.unit as aunit from supplierlog a,supplier c, product b where a.product_id=b.id and a.supplier_id=c.id order by b.name");
                                            while ($row = mysql_fetch_array($query)) {
                                                $no++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>                                                    
                                                    <td><?php echo $row['name'] ?></td>
                                                    <td><?php echo $row['price'] ?> / 
                                                        <?php
                                                        if ($row['aunit'] == "")
                                                            echo $row['unit'];
                                                        else
                                                            echo $row['aunit'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $querydalem = mysql_query("select *,b.id as id from supplierlog a, supplier b where a.supplier_id=b.id and a.product_id='" . $row['id'] . "'");
                                                        while ($rowdalem = mysql_fetch_array($querydalem)) {
                                                            echo "<a href='Account/Supplier/SupplierLog/" . $rowdalem['id'] . "'>" . str_pad($rowdalem['id'], 5, '0', STR_PAD_LEFT) . " - " . $rowdalem['name'] . "</a>";
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
