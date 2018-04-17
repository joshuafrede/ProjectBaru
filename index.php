<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include("head.php") ?>
    </head>

    <body>
        <!-- Preloader -->
        <div id="preloader">
            <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
        </div>

        <section>           

            <?php include("heading.php") ?>

            <div class="contentpanel">
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="panel panel-success panel-stat">
                            <div class="panel-heading">

                                <div class="stat" style='margin: 0;max-width: 100%'>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <img src="images/is-money.png" alt="" />
                                        </div>
                                        <div class="col-xs-8">
                                            <small class="stat-label">This Month Income</small>
                                            <?php
                                            $query = mysql_query("select sum(total) as total from bon where created_at >  '" . date("Y-m-01 00:00:00") . "'");
                                            $result = mysql_fetch_array($query);
                                            ?>
                                            <h3 style='margin: 0'>Rp <?php echo number_format($result['total']) ?></h3>
                                        </div>
                                    </div><!-- row -->

                                    <div class="mb15"></div>

                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">Last Week</small>
                                            <?php
                                            $query = mysql_query("select sum(total) as total from bon where created_at >  '" . date("Y-m-d 00:00:00", strtotime("-1 week")) . "'");
                                            $result = mysql_fetch_array($query);
                                            ?>
                                            <h4 style='margin: 0'>Rp <?php echo number_format($result['total']) ?></h4>
                                        </div>

                                        <div class="col-xs-6">
                                            <?php
                                            $query = mysql_query("select sum(total) as total from bon where created_at >  '" . date("Y-m-01 00:00:00", strtotime("-1 month +1 day")) . "' and created_at < '" . date("Y-m-t 00:00:00", strtotime("-1 month")) . "'");
                                            $result = mysql_fetch_array($query);
                                            ?>
                                            <small class="stat-label">Last Month</small>
                                            <h4 style='margin: 0'>Rp <?php echo number_format($result['total']) ?></h4>
                                        </div>
                                    </div><!-- row -->

                                </div><!-- stat -->

                            </div><!-- panel-heading -->
                        </div><!-- panel -->
                    </div><!-- col-sm-6 -->
                    <div class="col-sm-6 col-md-6">
                        <div class="panel panel-danger panel-stat">
                            <div class="panel-heading">

                                <div class="stat" style='margin: 0;max-width: 100%'>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <img src="images/is-money.png" alt="" />
                                        </div>
                                        <div class="col-xs-8">
                                            <small class="stat-label">This Month Expenses</small>
                                            <?php
                                            $query = mysql_query("select sum(price) as total from stocklog where created_at >  '" . date("Y-m-01 00:00:00") . "'");
                                            $result = mysql_fetch_array($query);
                                            ?>
                                            <h3 style='margin: 0'>Rp <?php echo number_format($result['total']) ?></h3>
                                        </div>
                                    </div><!-- row -->

                                    <div class="mb15"></div>

                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">Last Week</small>
                                            <?php
                                            $query = mysql_query("select sum(price) as total from stocklog where created_at >  '" . date("Y-m-d 00:00:00", strtotime("-1 week")) . "'");
                                            $result = mysql_fetch_array($query);
                                            ?>
                                            <h4 style='margin: 0'>Rp <?php echo number_format($result['total']) ?></h4>
                                        </div>

                                        <div class="col-xs-6">
                                            <?php
                                            $query = mysql_query("select sum(price) as total from stocklog where created_at >  '" . date("Y-m-01 00:00:00", strtotime("-1 month +1 day")) . "' and created_at < '" . date("Y-m-t 00:00:00", strtotime("-1 month")) . "'");
                                            $result = mysql_fetch_array($query);
                                            ?>
                                            <small class="stat-label">Last Month</small>
                                            <h4 style='margin: 0'>Rp <?php echo number_format($result['total']) ?></h4>
                                        </div>
                                    </div><!-- row -->

                                </div><!-- stat -->

                            </div><!-- panel-heading -->
                        </div><!-- panel -->
                    </div><!-- col-sm-6 -->
                </div><!-- row -->
                <div class="row">

                    <div class="col-sm-6">

                        <div class="table-responsive">
                            <table class="table table-bordered mb30">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Top 10 Ordered Menu</th>
                                        <th>Orders</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $query = mysql_query("SELECT name,count(a.id) as total from bonlog a, recipe b where a.recipe_id=b.id and

                                    a.created_at >  '" . date("Y-m-01 00:00:00") . "'
                                    GROUP BY b.id
                                    ORDER BY total desc");
                                    while ($row = mysql_fetch_array($query)) {
                                        $no++;
                                        ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo number_format($row['total']) ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div><!-- table-responsive -->

                    </div><!-- col-sm-7 -->

                    <div class="col-sm-6">
                        <div class = "col-sm-12 col-md-12" style='padding:0'>
                            <div class = "row">
                                <div class = "col-xs-6">
                                    <div class = "panel panel-warning panel-alt widget-today">
                                        <div class = "panel-heading text-center">
                                            <i class = "fa fa-calendar-o"></i>
                                        </div>
                                        <div class = "panel-body text-center">
                                            <h3 class = "today"><?php echo date("l, d F Y") ?></h3>
                                        </div><!--panel-body-->
                                    </div><!--panel-->
                                </div>

                                <div class = "col-xs-6">
                                    <div class = "panel panel-info panel-alt widget-time">
                                        <div class = "panel-heading text-center">
                                            <i class = "glyphicon glyphicon-time"></i>
                                        </div>
                                        <div class = "panel-body text-center">
                                            <h3 class = "today"><?php echo date("H:i A") ?> WIB</h3>
                                        </div><!--panel-body-->
                                    </div><!--panel-->
                                </div>
                            </div>
                        </div><!--col-sm-6-->
                    </div><!-- col-sm-6 -->
                </div><!-- row -->       
                <div class='row'>
                    <div class="col-sm-6 mb30">
                        <div class='panel'>
                            <div class="panel-heading">
                                <h4 class="panel-title text-center">Income This Month</h4>
                            </div>
                            <div class='panel-body'>                            
                                <!--                                <h5 class="subtitle mb10 text-center">Income This Month</h5>-->
                                <!--                                <p class="mb15">For other point types, you can define a callback function to draw the symbol. Some common symbols are available in the symbol plugin.</p>-->
                                <div id="basicchart1" style="width: 100%; height: 300px; padding: 0px; position: relative;">
                                </div>                        
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb30 collapse">
                        <div class='panel'>
                            <div class="panel-heading">
                                <h4 class="panel-title text-center">This Month Comments</h4>
                            </div>
                            <div class='panel-body'>                            
                                <!--                                <h5 class="subtitle mb10 text-center">This Month Comments</h5>-->
                                <!--                                <p class="mb15">For other point types, you can define a callback function to draw the symbol. Some common symbols are available in the symbol plugin.</p>-->
                                <div id="piechart" style="width: 100%; height: 300px; padding: 0px; position: relative;">
                                </div>                        
                            </div>
                        </div>
                    </div>
                </div>

            </div><!--contentpanel-->

        </div><!--mainpanel-->

        <div class = "rightpanel">
            <!--Nav tabs-->
            <ul class = "nav nav-tabs nav-justified">
                <li class = "active"><a href = "#rp-alluser" data-toggle = "tab"><i class = "fa fa-users"></i></a></li>
                <li><a href = "#rp-favorites" data-toggle = "tab"><i class = "fa fa-heart"></i></a></li>
                <li><a href = "#rp-history" data-toggle = "tab"><i class = "fa fa-clock-o"></i></a></li>
                <li><a href = "#rp-settings" data-toggle = "tab"><i class = "fa fa-gear"></i></a></li>
            </ul>

            <!--Tab panes-->
            <div class = "tab-content">
                <div class = "tab-pane active" id = "rp-alluser">
                    <h5 class = "sidebartitle">Online Users</h5>
                    <ul class = "chatuserlist">
                        <li class = "online">
                            <div class = "media">
                                <a href = "#" class = "pull-left media-thumb">
                                    <img alt = "" src = "images/photos/userprofile.png" class = "media-object">
                                </a>
                                <div class = "media-body">
                                    <strong>Eileen Sideways</strong>
                                    <small>Los Angeles, CA</small>
                                </div>
                            </div><!--media-->
                        </li>
                        <li class = "online">
                            <div class = "media">
                                <a href = "#" class = "pull-left media-thumb">
                                    <img alt = "" src = "images/photos/user1.png" class = "media-object">
                                </a>
                                <div class = "media-body">
                                    <span class = "pull-right badge badge-danger">2</span>
                                    <strong>Zaham Sindilmaca</strong>
                                    <small>San Francisco, CA</small>
                                </div>
                            </div><!--media-->
                        </li>
                        <li class = "online">
                            <div class = "media">
                                <a href = "#" class = "pull-left media-thumb">
                                    <img alt = "" src = "images/photos/user2.png" class = "media-object">
                                </a>
                                <div class = "media-body">
                                    <strong>Nusja Nawancali</strong>
                                    <small>Bangkok, Thailand</small>
                                </div>
                            </div><!--media-->
                        </li>
                        <li class = "online">
                            <div class = "media">
                                <a href = "#" class = "pull-left media-thumb">
                                    <img alt = "" src = "images/photos/user3.png" class = "media-object">
                                </a>
                                <div class = "media-body">
                                    <strong>Renov Leongal</strong>
                                    <small>Cebu City, Philippines</small>
                                </div>
                            </div><!--media-->
                        </li>
                        <li class = "online">
                            <div class = "media">
                                <a href = "#" class = "pull-left media-thumb">
                                    <img alt = "" src = "images/photos/user4.png" class = "media-object">
                                </a>
                                <div class = "media-body">
                                    <strong>Weno Carasbong</strong>
                                    <small>Tokyo, Japan</small>
                                </div>
                            </div><!--media-->
                        </li>
                    </ul>

                    <div class = "mb30"></div>

                    <h5 class = "sidebartitle">Offline Users</h5>
                    <ul class = "chatuserlist">
                        <li>
                            <div class = "media">
                                <a href = "#" class = "pull-left media-thumb">
                                    <img alt = "" src = "images/photos/user5.png" class = "media-object">
                                </a>
                                <div class = "media-body">
                                    <strong>Eileen Sideways</strong>
                                    <small>Los Angeles, CA</small>
                                </div>
                            </div><!--media-->
                        </li>
                        <li>
                            <div class = "media">
                                <a href = "#" class = "pull-left media-thumb">
                                    <img alt = "" src = "images/photos/user2.png" class = "media-object">
                                </a>
                                <div class = "media-body">
                                    <strong>Zaham Sindilmaca</strong>
                                    <small>San Francisco, CA</small>
                                </div>
                            </div><!--media-->
                        </li>
                        <li>
                            <div class = "media">
                                <a href = "#" class = "pull-left media-thumb">
                                    <img alt = "" src = "images/photos/user3.png" class = "media-object">
                                </a>
                                <div class = "media-body">
                                    <strong>Nusja Nawancali</strong>
                                    <small>Bangkok, Thailand</small>
                                </div>
                            </div><!--media-->
                        </li>
                        <li>
                            <div class = "media">
                                <a href = "#" class = "pull-left media-thumb">
                                    <img alt = "" src = "images/photos/user4.png" class = "media-object">
                                </a>
                                <div class = "media-body">
                                    <strong>Renov Leongal</strong>
                                    <small>Cebu City, Philippines</small>
                                </div>
                            </div><!--media-->
                        </li>
                        <li>
                            <div class = "media">
                                <a href = "#" class = "pull-left media-thumb">
                                    <img alt = "" src = "images/photos/user5.png" class = "media-object">
                                </a>
                                <div class = "media-body">
                                    <strong>Weno Carasbong</strong>
                                    <small>Tokyo, Japan</small>
                                </div>
                            </div><!--media-->
                        </li>
                        <li>
                            <div class = "media">
                                <a href = "#" class = "pull-left media-thumb">
                                    <img alt = "" src = "images/photos/user4.png" class = "media-object">
                                </a>
                                <div class = "media-body">
                                    <strong>Renov Leongal</strong>
                                    <small>Cebu City, Philippines</small>
                                </div>
                            </div><!--media-->
                        </li>
                        <li>
                            <div class = "media">
                                <a href = "#" class = "pull-left media-thumb">
                                    <img alt = "" src = "images/photos/user5.png" class = "media-object">
                                </a>
                                <div class = "media-body">
                                    <strong>Weno Carasbong</strong>
                                    <small>Tokyo, Japan</small>
                                </div>
                            </div><!--media-->
                        </li>
                    </ul>
                </div>
                <div class = "tab-pane" id = "rp-favorites">
                    <h5 class = "sidebartitle">Favorites</h5>
                    <ul class = "chatuserlist">
                        <li class = "online">
                            <div class = "media">
                                <a href = "#" class = "pull-left media-thumb">
                                    <img alt = "" src = "images/photos/user2.png" class = "media-object">
                                </a>
                                <div class = "media-body">
                                    <strong>Eileen Sideways</strong>
                                    <small>Los Angeles, CA</small>
                                </div>
                            </div><!--media-->
                        </li>
                        <li>
                            <div class = "media">
                                <a href = "#" class = "pull-left media-thumb">
                                    <img alt = "" src = "images/photos/user1.png" class = "media-object">
                                </a>
                                <div class = "media-body">
                                    <strong>Zaham Sindilmaca</strong>
                                    <small>San Francisco, CA</small>
                                </div>
                            </div><!--media-->
                        </li>
                        <li>
                            <div class = "media">
                                <a href = "#" class = "pull-left media-thumb">
                                    <img alt = "" src = "images/photos/user3.png" class = "media-object">
                                </a>
                                <div class = "media-body">
                                    <strong>Nusja Nawancali</strong>
                                    <small>Bangkok, Thailand</small>
                                </div>
                            </div><!--media-->
                        </li>
                        <li class = "online">
                            <div class = "media">
                                <a href = "#" class = "pull-left media-thumb">
                                    <img alt = "" src = "images/photos/user4.png" class = "media-object">
                                </a>
                                <div class = "media-body">
                                    <strong>Renov Leongal</strong>
                                    <small>Cebu City, Philippines</small>
                                </div>
                            </div><!--media-->
                        </li>
                        <li class = "online">
                            <div class = "media">
                                <a href = "#" class = "pull-left media-thumb">
                                    <img alt = "" src = "images/photos/user5.png" class = "media-object">
                                </a>
                                <div class = "media-body">
                                    <strong>Weno Carasbong</strong>
                                    <small>Tokyo, Japan</small>
                                </div>
                            </div><!--media-->
                        </li>
                    </ul>
                </div>
                <div class = "tab-pane" id = "rp-history">
                    <h5 class = "sidebartitle">History</h5>
                    <ul class = "chatuserlist">
                        <li class = "online">
                            <div class = "media">
                                <a href = "#" class = "pull-left media-thumb">
                                    <img alt = "" src = "images/photos/user4.png" class = "media-object">
                                </a>
                                <div class = "media-body">
                                    <strong>Eileen Sideways</strong>
                                    <small>Hi hello, ctc?... would you mind if I go to your...</small>
                                </div>
                            </div><!--media-->
                        </li>
                        <li>
                            <div class = "media">
                                <a href = "#" class = "pull-left media-thumb">
                                    <img alt = "" src = "images/photos/user2.png" class = "media-object">
                                </a>
                                <div class = "media-body">
                                    <strong>Zaham Sindilmaca</strong>
                                    <small>This is to inform you that your product that we...</small>
                                </div>
                            </div><!--media-->
                        </li>
                        <li>
                            <div class = "media">
                                <a href = "#" class = "pull-left media-thumb">
                                    <img alt = "" src = "images/photos/user3.png" class = "media-object">
                                </a>
                                <div class = "media-body">
                                    <strong>Nusja Nawancali</strong>
                                    <small>Are you willing to have a long term relat...</small>
                                </div>
                            </div><!--media-->
                        </li>
                    </ul>
                </div>
                <div class = "tab-pane pane-settings" id = "rp-settings">

                    <h5 class = "sidebartitle mb20">Settings</h5>
                    <div class = "form-group">
                        <label class = "col-xs-8 control-label">Show Offline Users</label>
                        <div class = "col-xs-4 control-label">
                            <div class = "toggle toggle-success"></div>
                        </div>
                    </div>

                    <div class = "form-group">
                        <label class = "col-xs-8 control-label">Enable History</label>
                        <div class = "col-xs-4 control-label">
                            <div class = "toggle toggle-success"></div>
                        </div>
                    </div>

                    <div class = "form-group">
                        <label class = "col-xs-8 control-label">Show Full Name</label>
                        <div class = "col-xs-4 control-label">
                            <div class = "toggle-chat1 toggle-success"></div>
                        </div>
                    </div>

                    <div class = "form-group">
                        <label class = "col-xs-8 control-label">Show Location</label>
                        <div class = "col-xs-4 control-label">
                            <div class = "toggle toggle-success"></div>
                        </div>
                    </div>

                </div><!--tab-pane-->

            </div><!--tab-content-->
        </div><!--rightpanel-->


    </section>


    <?php include("script.php") ?>
    <script>
<?php
$query = mysql_query("select distinct name as date, sum(total) as total from bon where created_at >=  '" . date("Y-m-01 00:00:00") . "' and created_at <=  '" . date("Y-m-t 00:00:00") . "'  group by name order by name");
$tempstring = "";
$max = mysql_num_rows($query);
$no = 1;
$tempdate = array();
$temptotal = array();
for ($i = 1; $i <= date("t"); $i++) {
    $tempdate[] = $i;
    $temptotal[] = 0;
}
while ($row = mysql_fetch_array($query)) {
    for ($i = 1; $i <= date("t"); $i++) {
        if (date("j", strtotime($row['date'])) == $i) {
            $temptotal[$i-1] = $row['total'];
        }
    }
}
for ($i = 1; $i <= date("t"); $i++) {
    if ($i == date("t")) {
        $tempstring.="[" . $tempdate[$i] . "," . $temptotal[$i] . "]";
    } else {
        $tempstring.="[" . $tempdate[$i] . "," . $temptotal[$i] . "],";
    }
}
?>
//        var firefox = [[0, 5], [1, 8], [2, 6], [3, 11], [4, 7], [5, 13], [6, 9], [7, 8], [8, 10], [9, 9], [10, 13]];
        var chrome = [<?php echo $tempstring ?>];

        var plot2 = jQuery.plot(jQuery("#basicchart1"),
                [
//                    {data: firefox,
//                        label: "Firefox",
//                        color: "#D9534F",
//                        points: {
//                            symbol: "square"
//                        }
//                    },
                    {data: chrome,
                        label: "Income",
                        color: "#428BCA",
                        lines: {
                            fill: true
                        },
                        points: {
                            symbol: 'diamond',
                            lineWidth: 2
                        }
                    }
                ],
                {
                    series: {
                        lines: {
                            show: true,
                            lineWidth: 2
                        },
                        points: {
                            show: true
                        },
                        shadowSize: 0
                    },
                    legend: {
                        position: 'nw'
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        borderColor: '#ddd',
                        borderWidth: 1,
                        labelMargin: 10,
                        backgroundColor: '#fff'
                    },
                    yaxis: {tickFormatter: function numberWithCommas(x) {
                            return x.toString().replace(/\B(?=(?:\d{3})+(?!\d))/g, ",");
                        }, color: '#eee'
                    },
                    xaxis: {
                        color: '#eee',
                        ticks: 20
                    }
                });

        var previousPoint2 = null;
        jQuery("#basicchart1").bind("plothover", function(event, pos, item) {
            jQuery("#x").text(pos.x.toFixed(2));
            jQuery("#y").text(pos.y.toFixed(2));

            if (item) {
                if (previousPoint2 != item.dataIndex) {
                    previousPoint2 = item.dataIndex;

                    jQuery("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                            y = item.datapoint[1].toFixed(2);

                    showTooltip(item.pageX, item.pageY,
                            item.series.label + " of " + x + " = " + y);
                }

            } else {
                jQuery("#tooltip").remove();
                previousPoint2 = null;
            }

        });

        jQuery("#basicchart1").bind("plotclick", function(event, pos, item) {
            if (item) {
                plot2.highlight(item.series, item.datapoint);
            }
        });

        /***** PIE CHART *****/
<?php
$query = mysql_query("select sum(anger) as anger,sum(disgust) as disgust,sum(fear) as fear,sum(joy) as joy,sum(sadness) as sadness from comment where merchant_id='" . $_SESSION['merchant'] . "' and created_at >  '" . date("Y-m-01 00:00:00") . "'");
$result = mysql_fetch_array($query);
?>
        var piedata = [
            {label: "Anger", data: [[1, <?php echo $result['anger'] ?>]], color: '#D9534F'},
            {label: "Disgust", data: [[1, <?php echo $result['disgust'] ?>]], color: '#1CAF9A'},
            {label: "Fear", data: [[1, <?php echo $result['fear'] ?>]], color: '#F0AD4E'},
            {label: "Joy", data: [[1, <?php echo $result['joy'] ?>]], color: '#428BCA'},
            {label: "Sadness", data: [[1, <?php echo $result['sadness'] ?>]], color: '#5BC0DE'}
        ];

        jQuery.plot('#piechart', piedata, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    label: {
                        show: true,
                        radius: 2 / 3,
                        formatter: labelFormatter,
                        threshold: 0.1
                    }
                }
            },
            grid: {
                hoverable: true,
                clickable: true
            }
        });

        function labelFormatter(label, series) {
            return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
        }



        function labelFormatter(label, series) {
            return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
        }
    </script>
</body>
</html>
