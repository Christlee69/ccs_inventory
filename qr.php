<div class="content">
 <div class="col-lg-12">
<div class="panel panel-primary">
    <div class="panel-heading">Enter information to generate QR Code</div>
      <div class="panel-body">   
             <div class="input_field_wrapper">
  <div>
      <form method="post">
        <input type="text" name="item_id" value="" required />
      <input type="submit" class=" btn btn-primary" value="Generate QR Code" style=" margin:5px;">
      </form>
    </div>
</div>
</div></div></div>
 <div class="col-lg-12">
     <?php
     
 
//load the ar library
include 'phpqrcode/qrlib.php';
if(isset($_POST['qrcode'])){
//data to be stored in qr
$item =$_POST['qrcode'];
  
//file path
$location = "images/".rand().".png";
  
//other parameters
$ecc = 'H';
$pixel_size = 20;
$frame_size = 5;
  
// Generates QR Code and Save as PNG
QRcode::png($item, $file, $ecc, $pixel_size, $frame_size);
  
// Displaying the stored QR code if you want
echo "<div><h3>Generated QR Code for {".$item."} </h3><br><img src='".$file."' width='150'></div>";
}
?>
     </div>
 
		</div>