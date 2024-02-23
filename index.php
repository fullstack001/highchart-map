<?php
 include('./config.php');
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Enviroment Map</title>
        <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/style.css">
        </head>
    <body>

        <script src="./bootstrap/js/jquery.min.js"></script>
        <script src="./bootstrap/js/bootstrap.min.js"></script>
        <script src="./code/highmaps.js"></script>
        <script src="./code/modules/tiledwebmap.js"></script>
        <script src="./code/modules/exporting.js"></script>
        <script src="./code/modules/offline-exporting.js"></script>
        <script src="./code/modules/accessibility.js"></script>
        <script src="./code/modules/marker-clusters.js"></script>
        <script src="./code/modules/coloraxis.js"></script>
        <script src="./code/modules/accessibility.js"></script>

        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <div class="container-fluid ">
                <div class="general">
                    <div class="en_general" style="font-size: <?php echo $trashholders[0][9] ?>px; color: <?php echo $trashholders[0][10] ?>; font-style: <?php if($trashholders[0][11] == 'italic') {echo 'italic';} elseif($trashholders[0][11] == 'none') {echo 'normal';} ?>; font-weight: <?php if($trashholders[0][11] == 'bold') {echo 'bold';} elseif($trashholders[0][11] == 'none') {echo 'normal';}?>;">
                        <?php echo $trashholders[0][8] ?>
                    </div>                  
                </div>
            <a class="navbar-brand ml-auto" href="javascript:void(0)">
                    <img src="./assets/img/logo.png" alt="">
                </a>
           
            </div>
        </nav>

        <div class="container-fluid ">
            <div class="row">                
                <div class="col-md-10 responsive">
                    <div id="container"></div>
                    <div class="indicators">
                        <div class="d-flex desktop_version">
                            <div class="indicator_area" style = "background-color:  <?php echo $trashholders[0][4] ?>"></div>
                            <div class="indicator_area" style = "background-color:  <?php echo $trashholders[0][5] ?>"></div>
                            <div class="indicator_area" style = "background-color:  <?php echo $trashholders[0][6] ?>"></div>
                            <div class="indicator_area" style = "background-color:  <?php echo $trashholders[0][7] ?>"></div>
                        </div>
                        <div class="d-flex desktop_version">
                            <div class="indicator_area text-center bg-white">
                                <?php echo $trashholders[0][0] ?>
                            </div>
                            <div class="indicator_area text-center bg-white">
                                <?php echo $trashholders[0][1] ?>
                            </div>
                            <div class="indicator_area text-center bg-white">
                                <?php echo $trashholders[0][2] ?>
                            </div>
                            <div class="indicator_area text-center bg-white">
                                <?php echo $trashholders[0][3] ?>
                            </div>
                        </div>

                        <div class="d-flex mobile_none text-center">
                            <div class="indicator_area" style = "background-color:  <?php echo $trashholders[0][4] ?>">
                                <?php echo $trashholders[0][16] ?>
                            </div>
                            <div class="indicator_area" style = "background-color:  <?php echo $trashholders[0][5] ?>">
                                <?php echo $trashholders[0][17] ?>
                            </div>
                            <div class="indicator_area" style = "background-color:  <?php echo $trashholders[0][6] ?>">
                                <?php echo $trashholders[0][18] ?>
                            </div>
                            <div class="indicator_area" style = "background-color:  <?php echo $trashholders[0][7] ?>">
                                <?php echo $trashholders[0][19] ?>
                            </div>                                                           
                        </div>
                        
                    </div>

                </div>
                <div class="col-md-2">
                    <div class="trasholders desktop_version">
                        <div class="trasholder" style = "background-color:  <?php echo $trashholders[0][4] ?>">
                            <?php echo $trashholders[0][16] ?>
                        </div>

                        <div class="trasholder" style = "background-color:  <?php echo $trashholders[0][5] ?>">
                            <?php echo $trashholders[0][17] ?>
                        </div>

                        <div class="trasholder" style = "background-color:  <?php echo $trashholders[0][6] ?>">
                            <?php echo $trashholders[0][18] ?>
                        </div>
                        <div class="trasholder" style = "background-color:  <?php echo $trashholders[0][7] ?>">
                            <?php echo $trashholders[0][19] ?>
                        </div>                      
                    </div>

                    <div class="general mt-5" id="mobile_general">                        
                        <div class="ar_general mt-3" style="font-size: <?php echo $trashholders[0][13] ?>px; color: <?php echo $trashholders[0][14] ?>; font-style: <?php if($trashholders[0][15] == 'italic') {echo 'italic';} elseif($trashholders[0][15] == 'none') {echo 'normal';} ?>; font-weight: <?php if($trashholders[0][15] == 'bold') {echo 'bold';} elseif($trashholders[0][15] == 'none') {echo 'normal';} ?>;">
                            <?php echo $trashholders[0][12] ?>
                        </div>
                    </div>
                   
                    
                </div>
            </div>
        </div>

        <script type="text/javascript">

            $(document).ready(function(){
               

                var mapData = <?php echo json_encode($indicators); ?>;
                var trasholders = <?php echo json_encode($trashholders); ?>;
                var mobile_general = $('#mobile_general');
            
                let mapArray = [];
                let maxArray = [0];
                for(let i = 0; i < trasholders[0].length; i++ ){
                    let min = 0;
                    let max = 0;                      
                    
                    if(i == (trasholders[0].length-1)){
                        let temp = trasholders[0][i].split('-');                          
                        min = Number(temp[0]);
                        max = Number(temp[1]);
                        maxArray.push(max);
                    }else{
                        let temp = trasholders[0][i].split('-');
                        let temp1 = trasholders[0][i+1].split('-');
                        min = Number(temp[0]);
                        max = Number(temp1[0]);
                        maxArray.push(max);
                    }
                }

                

                for (let index = 0; index < mapData.length; index++) {
                    
                    let color = '';
                    for(let i = 0; i < 4; i++ ){
                        let min = 0;
                        let max = 0;                      
                        
                        if(i == 3){
                            let temp = trasholders[0][i].split('-');                          
                            min = Number(temp[0]);
                            max = Number(temp[1]);
                        }else{
                            let temp = trasholders[0][i].split('-');
                            let temp1 = trasholders[0][i+1].split('-');
                            min = Number(temp[0]);
                            max = Number(temp1[0]);
                        }
                       
                       if(min <=  mapData[index][4] && mapData[index][4] <= max){
                        
                            if(i == 0){
                                color = '<?php echo $trashholders[0][4] ?>';
                            }else if( i == 1){
                                color = '<?php echo $trashholders[0][5] ?>';
                            }else if( i == 2){
                                color = '<?php echo $trashholders[0][6] ?>';
                            }else if( i == 3){
                                color = '<?php echo $trashholders[0][7] ?>';
                            }                 
                       }                     
                    }

                   
                    let temp = mapData[index][5];
                    temp = (temp.split('T'))[0];
                    temp = (temp.split('-'))[2] + '-' + (temp.split('-'))[1] + '-'+ (temp.split('-'))[0];

                    const site = {
                        name: mapData[index][0],              
                        street: mapData[index][1],                        
                        lon: Number(mapData[index][3]),
                        lat: Number(mapData[index][2]),
                        avg: Number(mapData[index][4]),
                        color: color,
                        date: temp
                    };
                    mapArray.push(site);                    
                }

                mapArray.forEach(function (p) {
                    p.hasc = p.avg;
                });

                var expBtnVisible = true;
          
                var click = 0;

            // Create the chart
                Highcharts.mapChart('container', {
                    chart: {
                        margin: 0,
                        // map: topology
                    },
                    title: {
                        text: ''
                    },
                    subtitle: {
                        text: ''
                    },
                    navigation: {   
                        buttonOptions: {
                            align: 'left',
                            theme: {
                                stroke: '#e6e6e6'
                            }
                        }
                    },
                    mapNavigation: {
                        enabled: true,
                        buttonOptions: {
                            alignTo: 'spacingBox'
                        }
                    },
                    mapView: {
                        center: [51.52825230225700, 25.32695224480200],
                        zoom: 12
                    },
                    tooltip: {
                        // enabled: false,
                        // pointFormat: 'Location: {point.name} <br/> {point.street} <br/> Date: {point.date} <br/> <b> Avg Value: {point.avg} v/m </b>'
                        useHTML: true,
                        borderWidth: 0,
                        borderRadius: 0,
                        shadow: true,                        
                        animation: true,
                        pointFormat: '<div class="custom-tootip" style="position: absolute; z-index: 1000; background-color: #fff; top: -45px; left: -90px; padding: 5px;">Location: {point.name} <br/> {point.street} <br/> Date: {point.date} <br/> <b> Avg Value: {point.avg} v/m </b></div>',                               
                        clusterFormat: 'Clusterd points: {point.clusterPointsAmount}'

                    },      
                    exporting: {
                        enabled: true,     
                        menuItemDefinitions:{
                            about: {                               
                                onclick: function () {                                    
                                    click++;                                  
                                    if(click % 2 == 1){
                                        mobile_general.css('display', 'block');
                                        
                                    }else{
                                        mobile_general.css('display', 'none');
                                    }
                                },
                                text: 'About'
                            }
                        },
                        buttons: {
                            contextButton:{
                                enabled: true,
                                menuItems: ['viewFullscreen', 'about']
                            }
                        }
                    },              
                    plotOptions: {
                        mappoint: {
                            dataLabels: {
                                enabled: false
                            },
                            cluster: {
                                enabled: true,
                                allowOverlap: false,
                                dataLabels: {
                                    style: {
                                        fontSize: '9px'
                                    },
                                    y: -1
                                },
                                animation: {
                                    duration: 450
                                },
                                layoutAlgorithm: {
                                    type: 'grid',
                                    gridSize: 70
                                },
                                marker: {
                                    symbol: 'cluster',                                  
                                    fillColor: '<?php echo $trashholders[0][4] ?>'
                                },
                                zones: [{
                                    from: 1,
                                    to: 4,
                                    marker: {
                                        radius: 13
                                    }
                                }, {
                                    from: 5,
                                    to: 9,
                                    marker: {
                                        radius: 15
                                    }
                                }, {
                                    from: 10,
                                    to: 15,
                                    marker: {
                                        radius: 17
                                    }
                                }, {
                                    from: 16,
                                    to: 20,
                                    marker: {
                                        radius: 19
                                    }
                                }, {
                                    from: 21,
                                    to: 100,
                                    marker: {
                                        radius: 21
                                    }
                                }]
                            }
                        }
                    },
                    series: [
                        {
                            type: 'tiledwebmap',
                            name: 'Basemap Tiles',
                            provider: {
                                type: 'OpenStreetMap'
                            },
                            showInLegend: false
                        }, {
                            type: 'mappoint',
                            name: '',
                            enableMouseTracking: true,
                            accessibility: {
                                // point: {
                                //     descriptionFormat: '{#if isCluster}' +
                                //             'Grouping of {clusterPointsAmount} points.' +
                                //             '{else}' +
                                //             '{name}, country code: {country}.' +
                                //             '{/if}'
                                // }
                            },
                            colorKey: 'clusterPointsAmount',
                            joinBy: 'hasc',
                            dataLabels: {                              
                                enabled: true,
                                useHTML: true,                               
                                format: '<div class="data-label"><div style="color: {point.color}; font-weight: 800; position: absolute; left: -9px; top: -10px; font-size: 18px; z-index: 10;">M</div></div>',                               
                            },
                            marker: {
                                symbol: 'url(http://37.27.41.21/assets/img/device.png)',
                                width: 30,
                                height: 35                                
                            },
                            data: mapArray,                
                        }, 
                    ]
                });                   
                                
               
            });      
		</script>
	</body>
</html>
