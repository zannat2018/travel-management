<?php session_start(); ?>
<?php if(!isset($_SESSION['type'])){
    header('Location: admin_login.php');
    }
 ?>
<?php include('../includes/config.php'); ?>
<?php
    if(isset($_GET['cnfrmid'])){
    	$id_1 = $_GET['id'];
        $id = $_GET['cnfrmid'];
        $client = $_GET['client'];
        $status = 1;
        $who = $_SESSION['name'];
        $sql = "UPDATE tblbooking SET status='$status', cncl_cnfrm_by='$who' WHERE BookingId=$id";
        $query = $db_config->query($sql);
        if($query==true){
            header('Location:booking_details.php?id='.$id_1);
            

                        // Multiple recipients
            $to = $client. ','. 'paponbd2016@gmail.com'; // note the comma

            // Subject
            $subject = 'Package Booking Conformation';

            // Message
            $message = '
            <!doctype html>
            <html>
              <head>
                <meta name="viewport" content="width=device-width" />
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <title>Travel Booking BD</title>
                <style>
                  /* -------------------------------------
                      GLOBAL RESETS
                  ------------------------------------- */
                  img {
                    border: none;
                    -ms-interpolation-mode: bicubic;
                    max-width: 100%; }

                  body {
                    background-color: #f6f6f6;
                    font-family: sans-serif;
                    -webkit-font-smoothing: antialiased;
                    font-size: 14px;
                    line-height: 1.4;
                    margin: 0;
                    padding: 0;
                    -ms-text-size-adjust: 100%;
                    -webkit-text-size-adjust: 100%; }

                  table {
                    border-collapse: separate;
                    mso-table-lspace: 0pt;
                    mso-table-rspace: 0pt;
                    width: 100%; }
                    table td {
                      font-family: sans-serif;
                      font-size: 14px;
                      vertical-align: top; }

                  /* -------------------------------------
                      BODY & CONTAINER
                  ------------------------------------- */

                  .body {
                    background-color: #f6f6f6;
                    width: 100%; }

                  /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
                  .container {
                    display: block;
                    Margin: 0 auto !important;
                    /* makes it centered */
                    max-width: 580px;
                    padding: 10px;
                    width: 580px; }

                  /* This should also be a block element, so that it will fill 100% of the .container */
                  .content {
                    box-sizing: border-box;
                    display: block;
                    Margin: 0 auto;
                    max-width: 580px;
                    padding: 10px; }

                  /* -------------------------------------
                      HEADER, FOOTER, MAIN
                  ------------------------------------- */
                  .main {
                    background: #ffffff;
                    border-radius: 3px;
                    width: 100%; }

                  .wrapper {
                    box-sizing: border-box;
                    padding: 20px; }

                  .content-block {
                    padding-bottom: 10px;
                    padding-top: 10px;
                  }

                  .footer {
                    clear: both;
                    Margin-top: 10px;
                    text-align: center;
                    width: 100%; }
                    .footer td,
                    .footer p,
                    .footer span,
                    .footer a {
                      color: #999999;
                      font-size: 12px;
                      text-align: center; }

                  /* -------------------------------------
                      TYPOGRAPHY
                  ------------------------------------- */
                  h1,
                  h2,
                  h3,
                  h4 {
                    color: #000000;
                    font-family: sans-serif;
                    font-weight: 400;
                    line-height: 1.4;
                    margin: 0;
                    Margin-bottom: 30px; }

                  h1 {
                    font-size: 35px;
                    font-weight: 300;
                    text-align: center;
                    text-transform: capitalize; }

                  p,
                  ul,
                  ol {
                    font-family: sans-serif;
                    font-size: 14px;
                    font-weight: normal;
                    margin: 0;
                    Margin-bottom: 15px; }
                    p li,
                    ul li,
                    ol li {
                      list-style-position: inside;
                      margin-left: 5px; }

                  a {
                    color: #3498db;
                    text-decoration: underline; }

                  /* -------------------------------------
                      BUTTONS
                  ------------------------------------- */
                  .btn {
                    box-sizing: border-box;
                    width: 100%; }
                    .btn > tbody > tr > td {
                      padding-bottom: 15px; }
                    .btn table {
                      width: auto; }
                    .btn table td {
                      background-color: #ffffff;
                      border-radius: 5px;
                      text-align: center; }
                    .btn a {
                      background-color: #ffffff;
                      border: solid 1px #3498db;
                      border-radius: 5px;
                      box-sizing: border-box;
                      color: #3498db;
                      cursor: pointer;
                      display: inline-block;
                      font-size: 14px;
                      font-weight: bold;
                      margin: 0;
                      padding: 12px 25px;
                      text-decoration: none;
                      text-transform: capitalize; }

                  .btn-primary table td {
                    background-color: #3498db; }

                  .btn-primary a {
                    background-color: #3498db;
                    border-color: #3498db;
                    color: #ffffff; }

                  /* -------------------------------------
                      OTHER STYLES THAT MIGHT BE USEFUL
                  ------------------------------------- */
                  .last {
                    margin-bottom: 0; }

                  .first {
                    margin-top: 0; }

                  .align-center {
                    text-align: center; }

                  .align-right {
                    text-align: right; }

                  .align-left {
                    text-align: left; }

                  .clear {
                    clear: both; }

                  .mt0 {
                    margin-top: 0; }

                  .mb0 {
                    margin-bottom: 0; }

                  .preheader {
                    color: transparent;
                    display: none;
                    height: 0;
                    max-height: 0;
                    max-width: 0;
                    opacity: 0;
                    overflow: hidden;
                    mso-hide: all;
                    visibility: hidden;
                    width: 0; }

                  .powered-by a {
                    text-decoration: none; }

                  hr {
                    border: 0;
                    border-bottom: 1px solid #f6f6f6;
                    Margin: 20px 0; }

                  /* -------------------------------------
                      RESPONSIVE AND MOBILE FRIENDLY STYLES
                  ------------------------------------- */
                  @media only screen and (max-width: 620px) {
                    table[class=body] h1 {
                      font-size: 28px !important;
                      margin-bottom: 10px !important; }
                    table[class=body] p,
                    table[class=body] ul,
                    table[class=body] ol,
                    table[class=body] td,
                    table[class=body] span,
                    table[class=body] a {
                      font-size: 16px !important; }
                    table[class=body] .wrapper,
                    table[class=body] .article {
                      padding: 10px !important; }
                    table[class=body] .content {
                      padding: 0 !important; }
                    table[class=body] .container {
                      padding: 0 !important;
                      width: 100% !important; }
                    table[class=body] .main {
                      border-left-width: 0 !important;
                      border-radius: 0 !important;
                      border-right-width: 0 !important; }
                    table[class=body] .btn table {
                      width: 100% !important; }
                    table[class=body] .btn a {
                      width: 100% !important; }
                    table[class=body] .img-responsive {
                      height: auto !important;
                      max-width: 100% !important;
                      width: auto !important; }}

                  /* -------------------------------------
                      PRESERVE THESE STYLES IN THE HEAD
                  ------------------------------------- */
                  @media all {
                    .ExternalClass {
                      width: 100%; }
                    .ExternalClass,
                    .ExternalClass p,
                    .ExternalClass span,
                    .ExternalClass font,
                    .ExternalClass td,
                    .ExternalClass div {
                      line-height: 100%; }
                    .apple-link a {
                      color: inherit !important;
                      font-family: inherit !important;
                      font-size: inherit !important;
                      font-weight: inherit !important;
                      line-height: inherit !important;
                      text-decoration: none !important; }
                    .btn-primary table td:hover {
                      background-color: #34495e !important; }
                    .btn-primary a:hover {
                      background-color: #34495e !important;
                      border-color: #34495e !important; } }

                </style>
              </head>
              <body class="">
                <table border="0" cellpadding="0" cellspacing="0" class="body">
                  <tr>
                    <td>&nbsp;</td>
                    <td class="container">
                      <div class="content">

                        <!-- START CENTERED WHITE CONTAINER -->
                        <span class="preheader">This is preheader text. Some clients will show this text as a preview.</span>
                        <table class="main">

                          <!-- START MAIN CONTENT AREA -->
                          <tr>
                            <td class="wrapper">
                              <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td>
                                    <p>Hi there,</p>
                                    <p>Your booking has been confirmed. Please check for more details pressing the button bellow.</p>
                                    <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                                      <tbody>
                                        <tr>
                                          <td align="left">
                                            <table border="0" cellpadding="0" cellspacing="0">
                                              <tbody>
                                                <tr>
                                                  <td> <a href="http://paponbd.000webhostapp.com/login.php" target="_blank">Check Your Conformation</a> </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <p>Thank you for being with us.</p>
                                    <p>Yours faithfully.</p>
                                    <p>Mr.Papon</p>
                                    <p>Package Dept.</p>
                                    <p>Travel Booking BD ltd.</p>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>

                        <!-- END MAIN CONTENT AREA -->
                        </table>

                        <!-- START FOOTER -->
                        <div class="footer">
                          <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td class="content-block">
                                <span class="apple-link">Travel Booking BD ltd, IDB Bhaban, Agargaon, Dhaka, 1207</span>
                              </td>
                            </tr>
                            <tr>
                              <td class="content-block powered-by">
                                Powered by <a href="http://paponbd.000webhostapp.com/">Travel Booking BD</a>.
                              </td>
                            </tr>
                          </table>
                        </div>
                        <!-- END FOOTER -->

                      <!-- END CENTERED WHITE CONTAINER -->
                      </div>
                    </td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
              </body>
            </html>

            ';

            // To send HTML mail, the Content-type header must be set
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';

            // Additional headers
            $headers[] = 'From: Travel Booking BD ltd <travelbookingbd@gmail.com>';
            $headers[] = 'Cc: birthdayarchive@example.com';
            $headers[] = 'Bcc: birthdaycheck@example.com';

            // Mail it
            mail($to, $subject, $message, implode("\r\n", $headers));
        }
    }

?>

<?php
    if(isset($_GET['cnclid'])){
        $id = $_GET['cnclid'];
        $id_1 = $_GET['id'];
        $status = 2;
        $who = $_SESSION['name'];
        $sql = "UPDATE tblbooking SET status='$status', cncl_cnfrm_by='$who' WHERE BookingId=$id";
        $query = $db_config->query($sql);
        if($query==true){
            header('Location:booking_details.php?id='.$id_1);
        }
    }
?>


<?php include('includes/topbar.php'); ?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <?php include('includes/leftsidebar.php'); ?>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                          <a href="upcomming_tours.php" class="btn btn-info">Upcomming</a>

                          <a href="ongoing_tours.php" class="btn btn-info">Ongoing</a>

                          <a href="cancelled_tours.php" class="btn btn-info">Cancelled</a>

                          <a href="upcomming_tours.php" class="btn btn-info">Expired</a>

                          <a href="pending_tours.php" class="btn btn-info">Pending</a>                        
                        </div>
                        <div class="body">
									<?php
										$booking_id = $_GET['id'];
                                        $sql = "SELECT tblbooking.BookingId, tblbooking.transaction_id, tblbooking.Comment, tblbooking.FromDate, tblbooking.ToDate, tblbooking.UpdationDate, tbltourpackages.PackageId, tbltourpackages.PackageName, tbltourpackages.duration, clients.FullName, clients.EmailId, clients.MobileNumber, tblbooking.status, tblbooking.cncl_cnfrm_by, clients.image FROM  tblbooking JOIN tbltourpackages ON tblbooking.PackageId=tbltourpackages.PackageId JOIN clients ON tblbooking.client_id=clients.id WHERE tblbooking.BookingId='$booking_id'";
                                        $query = $db_config->query($sql);
                                        while($result = $query->fetch_object()){
                                    ?>
                        	<form class="form-horizontal" method="post">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 form-control-label">
                                        <label>Booking ID</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-7">
                                        <div class="form-group">
                                            
                                                <input type="text" name="name"class="form-control" value="<?php echo $result->BookingId; ?>">
                                           
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 form-control-label">
                                        <label>Package Name</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-7">
                                        <div class="form-group">
                                            
                                                <input type="text" name="name"class="form-control" value="<?php echo $result->PackageName; ?>">
                                           
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 form-control-label">
                                        <label>Client Name</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-7">
                                        <div class="form-group">
                                            
                                                <input type="text" name="name"class="form-control" value="<?php echo $result->FullName; ?>">
                                           
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 form-control-label">
                                        <label>Client Email</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-7">
                                        <div class="form-group">
                                            
                                                <input type="text" name="email" class="form-control" value="<?php echo $result->EmailId; ?>">
                                           
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 form-control-label">
                                        <label>Client Phone</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-7">
                                        <div class="form-group">
                                            
                                                <input type="text" name="phone"class="form-control" value="<?php echo $result->MobileNumber; ?>">
                                           
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 form-control-label">
                                        <label>Transaction ID</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-7">
                                        <div class="form-group">
                                            
                                                <input type="text" name="phone"class="form-control" value="<?php echo $result->transaction_id; ?>">
                                           
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 form-control-label">
                                        <label>From Date</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-7">
                                        <div class="form-group">
                                            
                                                <input type="text" name="phone"class="form-control" value="<?php echo $result->FromDate; ?>">
                                           
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 form-control-label">
                                        <label>To Date</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-7">
                                        <div class="form-group">
                                            
                                                <input type="text" name="phone"class="form-control" value="<?php echo $result->ToDate; ?>">
                                           
                                        </div>
                                    </div>


                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 form-control-label">
                                        <label>Booking Status</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-7">
                                        <div class="form-group">
                                            
                                                <textarea class="form-control"><?php if($result->status == 0){echo "PENDING";}
                                                if($result->status == 1){echo "CONFIRMED by ".$result->cncl_cnfrm_by." at ".$result->UpdationDate;}
                                                if($result->status == 2){echo "CANCELLED by ".$result->cncl_cnfrm_by." at ".$result->UpdationDate;}
                                        ?></textarea>
                                           
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 form-control-label">
                                        <label>Tour Status</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-7">
                                        <div class="form-group">
                                            
                                                <input type="text" name="phone"class="form-control" value="<?php if($result->FromDate>date('m/d/Y')){echo 'Upcomming';}else if($result->ToDate<date('m/d/Y')){echo 'Expired';}else{echo 'Ongoing';} ?>">
                                           
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 form-control-label">
                                        <label>Duration</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-7">
                                        <div class="form-group">
                                            
                                                <input type="text" name="phone"class="form-control" value="<?php echo $result->duration; ?> Days">
                                           
                                        </div>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 form-control-label">
                                        <label>Comments</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-7">
                                        <div class="form-group">
                                            
                                                <textarea class="form-control"><?php echo $result->Comment; ?></textarea>
                                           
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix" hidden="">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>User Type</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            
                                                <select class="form-control" name="type" required>
                                                    <option value="" hidden>select type</option>
                                                    <option value="suAdmin">Super Admin</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="employee">Employee</option>
                                                </select>
                                           
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                    	<?php
                                        if($result->status==2){echo '<span style="color:red">CANCELLED</span>';}
                                        		if($result->status==1 && $result->ToDate<date('m/d/Y')){
                                        			echo '<span style="color:green">CONFIRMED</span>';
                                        		}
                                                if($result->status==1 && $result->ToDate>date('m/d/Y')){echo '<span style="color:green">CONFIRMED</span>';?>
                                                <a href="booking_details.php?id=<?php echo $result->BookingId; ?>&client=<?php echo $result->EmailId; ?>&cnclid=<?php echo $result->BookingId; ?>" onclick="return confirm('Do you really want to cancel booking')"><button class="btn btn-danger">CANCEL</button></a>
                                                <?php } 
                                                if($result->status==0 && $result->FromDate>date('m/d/Y')){
                                        ?><a href="booking_details.php?id=<?php echo $result->BookingId; ?>&cnfrmid=<?php echo $result->BookingId; ?>&client=<?php echo $result->EmailId; ?>" onclick="return confirm('Do you really want to confirm booking')"><button class="btn btn-info">CONFIRM</button></a>
                                        <a href="booking_details.php?id=<?php echo $result->BookingId; ?>&cnclid=<?php echo $result->BookingId; ?>" onclick="return confirm('Do you really want to cancel booking')"><button class="btn btn-danger">CANCEL</button></a>
                                        <?php } ?>
                                        <?php if($result->status==0 && $result->ToDate<date('m/d/Y')){
                                        	echo 'PENDING';
                                        } ?>
                                    </div>
                                </div>
                            </form>
                            <?php } ?>                               
                        </div>
                    </div>
                </div>
            </div>
                
            
            <div class="row clearfix">
            </div>
        </div>
    </section>
    
    <?php include('includes/footer.php'); ?>
    