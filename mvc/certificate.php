<br>
<?php
$client_id  = $slug2;
$sells_id   = get_info("sms_sells","sells_id","WHERE client_id=$client_id");
$user_id    = get_info("sms_clients","user_id","WHERE client_id=$client_id");

if ($user_id == $logged_user_id) {
    if($sells_id==""){echo "No records found"; exit();}
?>

<?php
    //sells records
    $qs 				= mysqli_query($con,"SELECT * FROM sms_sells WHERE sells_id=$sells_id");
    $rs 				= mysqli_fetch_assoc($qs);
    $add_date 			= $rs['add_date'];
    $sells_price 		= $rs['sells_price'];
    $sells_price_word 	= $rs['sells_price_word'];
    $bike_id 			= $rs['bike_id'];

    //client records
    $qc 					= mysqli_query($con,"SELECT * FROM sms_clients WHERE client_id=$client_id");
    $rc 					= mysqli_fetch_assoc($qc);
    $client_name 			= $rc['client_name'];
    $client_gurdian_name 	= $rc['client_gurdian_name'];
    $client_mother_name 	= $rc['client_mother_name'];
    $client_village 		= $rc['client_village'];
    $client_po 				= $rc['client_po'];
    $client_ps 				= $rc['client_ps'];

    $location_id 	= $rc['location_id'];
    $location_name 	= get_info("sms_locations","location_name","WHERE location_id=".$rc["location_id"]);


    //bike records
    $qb = mysqli_query($con,"SELECT * FROM sms_bikes WHERE bike_id=$bike_id");
    $rb = mysqli_fetch_assoc($qb);

    $brand_id 			= $rb['brand_id'];
    $brand_name 		=  get_info("sms_brands","brand_name","WHERE brand_id=".$rb["brand_id"]);
    $brand_manufcturer 	= get_info("sms_brands","brand_manufcturer","WHERE brand_id=".$rb["brand_id"]);

    $model_id 	= $rb['model_id'];
    $model_name =  get_info("sms_models","model_name","WHERE model_id=".$rb["model_id"]);

    $bike_chassis_no 	= $rb['bike_chassis_no'];
    $bike_engine_no 	= $rb['bike_engine_no'];
    $bike_color 		= $rb['bike_color'];
    $bike_yom 			= $rb['bike_yom'];
    $bike_weight 		= $rb['bike_weight'];
    $bike_cc 			= $rb['bike_cc'];
?>


<a href="<?php echo $site_url; ?>/print/certificate-print.php?client_id=<?php echo $client_id;?>" target="_blank"><button type="button" class="btn btn-danger" style="float: right; margin-right: 9px;">Print</button></a>
<button type="button" class="btn btn-primary" id="downloadPdfButton">Download PDF</button>

<br><br>
<div class="container" id="certificate">
<center><h3>প্রত্যয়ন পত্র। </h3></center>

বরাবর<br><br>

রেজিস্ট্রেশন কর্তৃপক্ষ<br><br><br><br>

বিষয়: চেসিস নম্বর ................................................................................................................ ইঞ্জিন নম্বর .....................................................................................<br><br>

মডেল ও সিসি .......................... সম্বলিত মোটরসাইকেল রেজিস্ট্রেশন করণ প্রসঙ্গে ! <br><br><br><br>

উপযুক্ত বিষয়ের প্রেক্ষিতে আপনার সদয় অবগতির জন্য জানানো যাচ্ছে যে, বিষয়ে উল্লেখিত চেসিস ও ইঞ্জিন নম্বর সম্বলিত মোটর সাইকেলটি 
<br>জনাব .......................................................................................................... <br><br>

পিতা ..................................................................................................................................... 
ঠিকানা .........................................................................................................
...........................................................................................................................................
এর নিকট আমার প্রতিস্থানের মাধ্যমে বিক্রয় করা হয়েছে। 
বিক্রিত মোটর সাইকেলটি রেজিস্ট্রেশনের নিমিত্তে যে সকল কাগজ পত্র ও বিক্রয় পর্যায়ে কাস্টমস কর্তৃক সত্যায়িত ........................ টাকার ভ্যাট চালান ক্রেতার বরাবরে সরবরাহ করা হয়েছে উহা আমাদের মাধ্যমে সরবরাহ করা হয়েছে এবং বিক্রিত কগজপত্র ও কাস্টমস কর্তৃক সত্যায়িত ভ্যাট চালানটি সঠিক আছে ! <br><br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;উক্ত মোটর সাইকেলটি রেজিস্ট্রেশনের নিমিত্তে সরবরাহকৃত কাগজপত্র ও সত্যায়িত ভ্যাট চালানের বিষয়ে কোন প্রকার জতিলটা সৃষ্টি হলে সকল দায়-দায়িত্ব নিম্নসাক্ষরকারী বহন করিবে বিআরটিএ কতৃপক্ষ নহে !
</div>

<?php
}else{
  echo "You don't have permission to change this";
  //exit;
}
?>


<script>
    document.getElementById('downloadPdfButton').addEventListener('click', function () {
        // Select the certificate div
        var element = document.getElementById('certificate');

        // Use html2pdf library to convert HTML to PDF
        html2pdf(element);

        // Optional: You can add more options, e.g., to set the filename
        // var opt = {
        //     margin: 10,
        //     filename: 'certificate.pdf',
        //     image: { type: 'jpeg', quality: 0.98 },
        //     html2canvas: { scale: 2 },
        //     jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        // };
        // html2pdf(element, opt);
    });
</script>