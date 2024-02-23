<?php
    include('./config.php');
    session_start();

    if( $_SESSION['admin'] == 'login'){

?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Enviroment Map</title>
        <!-- <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="../assets/plugin/bootstable.js"></script>
        <link rel="stylesheet" href="../assets/css/style.css">
	</head>
    <body>               
        <nav class="navbar bg-light">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <img src="../assets/img/logo.png" alt="">
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class=""><a href="#">Sites</a></li>            
                    <li class=""><a href="./reset.php">Reset Password</a></li>
                    <li><a href="logout.php"> Sign Out</a></li>
                
                </ul>
            </div>
        </nav>
        <div class="container mt-3">
            <section class="trasholder_section">
                <div class="row">
                    <div class="title">
                        <h5>
                            Trashholder Values
                        </h5>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="label1">
                                Label 1
                            </label>
                            <input type="text" name="label1" id = "label1"  class = "form-control" value = "<?php echo $trashholders[0][16] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="label2">
                                Lavel 2
                            </label>
                            <input type="text" name="label2" id = "label2"  class = "form-control" value = "<?php echo $trashholders[0][17] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="label3">
                                Lavel 3
                            </label>
                            <input type="text" name="label3" id = "label3"  class = "form-control" value = "<?php echo $trashholders[0][18] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="label4">
                                L4vel 4
                            </label>
                            <input type="text" name="label4" id = "label4"  class = "form-control" value = "<?php echo $trashholders[0][19] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="green">
                                Level 1
                            </label>
                            <input type="text" name="green" id = "green"  class = "form-control" value = "<?php echo $trashholders[0][0] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="green">
                                Level 2
                            </label>
                            <input type="text" name="blue" id = "blue" class = "form-control" value = "<?php echo $trashholders[0][1] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="green">
                                Level 3
                            </label>
                            <input type="text" name="yellow" id = "yellow" class = "form-control" value = "<?php echo $trashholders[0][2] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="green">
                                Level 4
                            </label>
                            <input type="text" name="red" id ="red" class = "form-control" value = "<?php echo $trashholders[0][3] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="green_level">
                                Level 1 Color
                            </label>
                            <input type="color" name="green_level" id = "green_level"  class = "form-control" value = "<?php echo $trashholders[0][4] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="blue_level">
                                Level 2 Color
                            </label>
                            <input type="color" name="blue_level" id = "blue_level" class = "form-control" value = "<?php echo $trashholders[0][5] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="yellow_level">
                                Level 3 Color
                            </label>
                            <input type="color" name="yellow_level" id = "yellow_level" class = "form-control" value = "<?php echo $trashholders[0][6] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="red_level">
                                Level 4 Color
                            </label>
                            <input type="color" name="red_level" id ="red_level" class = "form-control" value = "<?php echo $trashholders[0][7] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="en_general">
                                Top Bar Gengeral Information
                            </label>
                            <textarea name="en_general" id="en_general" rows="3" class = "form-control" required><?php echo $trashholders[0][8]; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="en_fontSize">Font Size</label>
                            <input type="number" name="en_fontSize" id="en_fontSize" class = "form-control" min="0" value = "<?php echo $trashholders[0][9]; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="en_fontColor">
                                Font Color
                            </label>
                            <input type="color" name="en_fontColor" id = "en_fontColor" class = "form-control" value = "<?php echo $trashholders[0][10] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="en_fontStyle">Font Style</label>
                            <select name="en_fontStyle" id="en_fontStyle" class = 'form-control' >
                                <option value="bold" <?php if ($trashholders[0][11] == 'bold') echo "selected"; ?>>Bold</option>
                                <option value="italic" <?php if ($trashholders[0][11] == 'italic') echo "selected"; ?> >Italic</option>
                                <option value="none" <?php if ($trashholders[0][11] == 'none') echo "selected"; ?>>None</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ar_general">
                                Right Panel Gengeral Information
                            </label>
                            <textarea name="ar_general" id="ar_general" rows="3" class = "form-control" required><?php echo $trashholders[0][12]; ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ar_fontSize">Font Size</label>
                            <input type="number" name="ar_fontSize" id="ar_fontSize" class = "form-control" min="0" value = "<?php echo $trashholders[0][13]; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ar_fontColor">
                                Font Color
                            </label>
                            <input type="color" name="ar_fontColor" id = "ar_fontColor" class = "form-control" value = "<?php echo $trashholders[0][14] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="ar_fontStyle">Font Style</label>
                            <select name="ar_fontStyle" id="ar_fontStyle" class = 'form-control' >
                                <option value="bold" <?php if ($trashholders[0][15] == 'bold') echo "selected"; ?>>Bold</option>
                                <option value="italic" <?php if ($trashholders[0][15] == 'italic') echo "selected"; ?> >Italic</option>
                                <option value="none" <?php if ($trashholders[0][15] == 'none') echo "selected"; ?> >None</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class = 'mt-2'>
                    <button class = "btn btn-success" id ="submit">Submit</button>
                </div>
            </section>
            
           <section class="sites_section">
                <div class="table-responsive mt-3">
                    <table class ="table table-striped table-hover" id = "editableTable">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Sites Name
                                </th>
                                <th>
                                    Street
                                </th>
                                <th>
                                    Latitude
                                </th>
                                <th>
                                    Longtitude
                                </th>
                                <th>
                                    Measurement Value
                                </th>
                                <th>
                                    Date
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($indicators as $key => $item){
                                    echo '
                                        <tr>
                                            <td>
                                                '.($key+1).'
                                            </td>
                                            <td>
                                                '.$item[0].'
                                            </td>
                                            <td>
                                                '.$item[1].'
                                            </td>
                                            <td>
                                                '.$item[2].'
                                            </td>
                                            <td>
                                                '.$item[3].'
                                            </td>
                                            <td>
                                                '.$item[4].'
                                            </td>
                                            <td>
                                                '.$item[5].'
                                            </td>
                                        </tr>
                                    ';
                                }
                            ?>                          
                        </tbody>
                    </table>
                </div>
           </section>
         
        </div>

        <!-- <script src="../bootstrap/js/jquery.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script> -->
    </body>
<?php
    }
?>

<script>
    $(document).ready(function(){
        $('#submit').click(function(){
            $green = $('#green').val();
            $blue = $('#blue').val();
            $yellow = $('#yellow').val();
            $red = $('#red').val();

            $green_level = $('#green_level').val();
            $blue_level = $('#blue_level').val();
            $yellow_level = $('#yellow_level').val();
            $red_level = $('#red_level').val();

            $en_general = $('#en_general').val();
            $en_fontSize = $('#en_fontSize').val();
            $en_fontColor = $('#en_fontColor').val();
            $en_fontStyle = $('#en_fontStyle').val();
            
            $ar_general = $('#ar_general').val();
            $ar_fontSize = $('#ar_fontSize').val();
            $ar_fontColor = $('#ar_fontColor').val();
            $ar_fontStyle = $('#ar_fontStyle').val();

            $lable1 = $('#label1').val();
            $label2 = $('#label2').val();
            $label3 = $('#label3').val();
            $label4 = $('#label4').val();

            $.ajax({
                type: 'POST',
                url: 'config.php',
                dataType: 'json',
                data: {
                    id: 'trasholder_submit',
                    green: $green,
                    blue: $blue,
                    yellow: $yellow,
                    red: $red,      
                    green_level: $green_level,
                    blue_level: $blue_level,
                    yellow_level: $yellow_level,
                    red_level: $red_level,
                    en_general: $en_general,
                    en_fontSize: $en_fontSize,
                    en_fontColor: $en_fontColor,
                    en_fontStyle: $en_fontStyle,
                    ar_general: $ar_general,
                    ar_fontSize: $ar_fontSize,
                    ar_fontColor: $ar_fontColor,
                    ar_fontStyle: $ar_fontStyle,
                    label1: $lable1,
                    label2: $label2,
                    label3: $label3,
                    label4: $label4,
                    action: 'edit'
                },
                success: function(res){
                    console.log(res);
                }
            })
        });

        $('#editableTable').SetEditable({
            columnsEd: "5",
            onEdit: function(columnsEd) {               
                var empId = (columnsEd[0].childNodes[1].innerHTML).trim();   
                var site =  (columnsEd[0].childNodes[3].innerHTML).trim(); 
                var street = (columnsEd[0].childNodes[5].innerHTML).trim(); 
                var lat = (columnsEd[0].childNodes[7].innerHTML).trim(); 
                var lot = (columnsEd[0].childNodes[9].innerHTML).trim(); 
                var value = columnsEd[0].childNodes[11].innerHTML;    
                var date = (columnsEd[0].childNodes[13].innerHTML).trim(); 
                $.ajax({
                    type: 'POST',			
                    url : "config.php",	
                    dataType: "json",					
                    data: {
                        id:'sites', 
                        site:site,
                        street:street,
                        lat:lat,
                        lot:lot,
                        value:value,  
                        date: date, 
                        index: empId,              
                        action:'edit'
                    },			
                    success: function (response) {
                        console.log(response);
                        // $('#lastupdate').text(response);                        						
                    }					
                    
                });
            }           
        });  
    })
</script>

</html>