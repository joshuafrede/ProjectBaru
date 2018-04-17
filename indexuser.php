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

            <div class="contentpanel" style="background: white">
                <div class="row">
                    <div class="col-sm-12 col-md-12">                        
                        <?php
                        $querydashboard = mysql_query("select * from admin where id='" . $_SESSION['login'] . "'");
                        $resultdashboard = mysql_fetch_array($querydashboard);
                        if ($resultdashboard['title'] == "Stock Keeper") {
                            ?>
                            <img src="img/process/stockkeeper.png" width="100%">
                            <?php
                        } else if ($resultdashboard['title'] == "Cashier") {
                            ?>
                            <img src="img/process/cashier.png" width="100%">
                            <?php
                        } else if ($resultdashboard['title'] == "Kitchen & Bar") {
                            ?>
                            <img src="img/process/kitchen.png" width="100%">
                            <?php
                        } else {
                            ?>
                            <img src="img/process/ho.png" width="100%">
                            <img src="img/process/kitchen.png" width="100%">
                            <img src="img/process/stockkeeper.png" width="100%">
                            <img src="img/process/cashier.png" width="100%">
                            <?php
                        }
                        ?>                                                
                    </div><!-- col-sm-6 -->

                </div><!-- row -->
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
            $temptotal[$i - 1] = $row['total'];
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
