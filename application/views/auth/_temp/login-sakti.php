<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SAKTI-LAMONGAN</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pemda">
    <meta name="author" content="Darto">
	<link id="favicon" rel="shortcut icon" href="<?php echo base_url(); ?>userfiles/favicon.png" type="image/png">
    <link href="<?php echo base_url(); ?>theme/assets/less/styles.less" rel="stylesheet/less" media="all">
    <!-- <link rel="stylesheet" href="assets/css/styles.min.css?=120"> -->
    <!--<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>

    -->

    
 <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="<?php echo base_url(); ?>theme/assets/js/less.js"></script>

</head>
<body style="background-color: #C0C0C0;top: 0px;  padding: 0px; margin: 0px">
<div class="container"  style ="max-width: 1024px;">
	<div class="row">
		<div class="col-md-12" style="background-color:#FFF; text-align:center;"><br />
				<img src="<?php echo base_url(); ?>assets/img/logo.jpg" style="width:75px;"><br />
				<strong style="color:#ff9900; font-size:18pt;font-face: Calibri;">Selamat Datang</strong><br />
				<strong style="color:#2D4054; font-size:16pt;font-face: Calibri;">Aplikasi SIKLUS RSUD Dr. Soegiri Lamongan</strong><br />
				&nbsp;
		</div>


		<div class="col-md-12" style="min-height:400px;background-position: center top; background-repeat: repeat; background-attachment: scroll; background-image: url('<?php echo base_url(); ?>data/bgdepan.jpeg'); color:##6f6f6f; text-align:center;">
		<div class="row">
			<br />&nbsp;
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="verticalcenter">
					<div class="panel panel-primary">
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-4"><img src="<?php echo base_url(); ?>data/bar-chart.png" style="width:75px;"></div>
								<div class="col-sm-8" style="text-align:left">
									<strong style="font-size:16pt; color:#F26101; font-face: Calibri; font-weight:bold">e-APBD</strong></a><br />
									<strong  style="font-size:9pt;font-face: Calibri;">Penyusunan RKA, APBD dan DPA Organisasi Perangkat Daerah</strong>
								</div>
							</div><br>						
							<span  style="font-size:12pt;font-face: Calibri;">SILAKAN LOGIN</span>
		                    <form action="<?php echo base_url(); ?>auth/login" class="form-horizontal" method="post" id="form-login" name="form-login">
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
		                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
		                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
									</div>
								</div>
							</div>
							<!--
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-th-list"></i></span>
										<select name="loginperiode" id="loginperiode" class="form-control">
                                	<?PHP
									$startdate = 2015;
									
									$blnskr = date("M");
									if ($blnskr > 10)
									{
										$enddate = date("Y") + 1;
									}
									else
									{
										$enddate = date("Y") ;
									}

									$years = range ($startdate,$enddate);
									
                                    foreach($years as $year)
									{
										if($year == date("Y")){
											$selected = "selected";
										}else{
											$selected = "";
										}
									?>
                                    <option value="<?PHP echo $year;?>" <?PHP echo $selected;?>><?PHP echo $year;?></option>
                                    <?PHP
									}
									?>
										 </select>
									</div>
								</div>
							</div>-->
							<div class="clearfix">            
	                            <div class="pull-right">
	                                <label>            
	                                    <input 	type="checkbox"             
	                                            style="margin-bottom: 20px"            
	                                            name="rememberme"            
	                                            id="rememberme"             
	                                            value="1" /> Remember Me                   
	                                </label>
		                        </div>
			    
				            </div>                        
					        <input type="submit" class="btn btn-primary btn-block" value="Log In">
							</form>
						</div>					
					</div>
				</div>
			<div class="col-sm-4"></div>	
		</div>
		</div>
		</div>
			<div class="col-sm-12" style="background-color:#FFF; text-align:center;">
				<strong  style="font-size:11pt;font-face: Calibri;">Copyright 2017<br />
				BPKAD - KABUPATEN LAMONGAN<br />
				All Right Reserved</strong>
			</div>
</div>
</div>

<script lang="javascript">
    $(document).ready(function(){
        $('#username').focus();
        
        //Form Login            
        $('#form-login').submit(function(){        
            $.ajax({
                url:"<?php echo site_url()?>auth/login",
                type:"POST",
                data:$('#form-login').serialize(),
                cache: false,
                success:function(respon){
                    var obj = $.parseJSON(respon);
                    if(obj.status==1){
                        window.open("<?php echo site_url()?>dashboard","_self")
                    }else{
                        $('#form-pesan').html(pesan_err(obj.error));
                    }
                }
            });
            return false;
        });
        
        $('#btn-submit').click(function(){
            $('#form-login').submit();
        });
        
        $(document).bind("ajaxSend", function() {
            $("#spinner").show();
        }).bind("ajaxStop", function() {
            $("#spinner").hide();
        }).bind("ajaxError", function() {
            $("#spinner").hide();
        });            
    });
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>theme/assets/js/jquery-1.10.2.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>theme/assets/js/bootstrap.min.js"></script> 
</body>
</html>



