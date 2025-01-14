<?php include_once 'common/header.php'; ?>
<?php
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'why-us' and status = '0'";
$res_content1 = mysqli_query($con, $sql_content1) or trigger_error("Query Failed! SQL: $sql_content1 - Error: " . mysqli_error(), E_USER_ERROR);
$row_content1 = mysqli_fetch_assoc($res_content1);
?>
<!--== Page Header Area Start ==-->
<section id="page-header" style="background-image: url(<?php echo $base_url . $document_page_banner . $row_content1['banner_img']; ?>)">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12 text-center">
                <div class="page-title">
                    <h2><?php echo $row_content1['title'] ?></h2>
                </div>

                <div class="page-breadcrum">
                    <ol>
                        <li><a href="<?php echo $base_url; ?>">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li class="active"><a href="<?php echo $base_url; ?>management.php"><?php echo $row_content1['title'] ?></a></li>
                    </ol>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Header Area End ==-->

<!--== Team Area Start ==-->
<section id="why-us-area" class="section-padding">
    






    <div class="container my-2">
        <h2 class="text-center mb-4">Why Us?</h2>
        <div class="row">
            <div class="col-12 text-center">
                <h4 class="text-primary font-weight-bold">17 years ----- 70+ partner financial institutions ------- 5 Lakhs+ officials trained</h4>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <p>
                    Disseminare has established itself as a niche global brand in the banking and finance sector over the past 17 years.
                </p>
                <br>
                <div class="mb-4">
                    <h5 class="mb-2">
                        The only training company to have collaborated with a diverse clientele, including:
                    </h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Financial Regulators:</strong> RBI, NABARD</li>
                        <li class="list-group-item"><strong>Private Banks:</strong> HDFC, ICICI, Kotak, Axis, and more</li>
                        <li class="list-group-item"><strong>Public Sector Banks:</strong> Bank of Baroda, Canara Bank, and others</li>
                        <li class="list-group-item"><strong>NBFCs:</strong> Tata Capital, Aditya Birla Capital, etc.</li>
                        <li class="list-group-item"><strong>Foreign Banks:</strong> HSBC, Bank Muscat, Bank Dhofar among others</li>
                        <li class="list-group-item"><strong>Small Finance Banks:</strong> Equitas Small Finance Bank, etc.</li>
                        <li class="list-group-item"><strong>Premier Business Schools:</strong> IIM Calcutta, IIM Udaipur, etc.</li>
                        <li class="list-group-item"><strong>KPO/Collection Agencies:</strong> CBSL, Startek, and more</li>
                </ul>
                </div>
                <p class="pb-3">
                    <span class="htmlEntitiesForParagraph"><strong>&raquo;</strong></span>
                    Founder and lead trainer, <strong>Prof. Praloy Majumder</strong>, widely known as the <em>"Risk Guru"</em>, brings over 30 years of training experience at India’s most reputable institutions.
                </p>
                <p class="pb-3">
                <span class="htmlEntitiesForParagraph"><strong>&raquo;</strong></span>
                    Disseminare’s management and advisory team includes industry leaders from prestigious institutions such as IITs, IIMs, and former RBI CGMs, committed to shaping a better future for learners.
                </p>
                <p class="pb-3">
                <span class="htmlEntitiesForParagraph"><strong>&raquo;</strong></span>
                    For the past 17 years, Disseminare has been the preferred training partner for leading financial institutions across India, Bangladesh, and the Middle East.
                </p>
                <p class="pb-3">
                <span class="htmlEntitiesForParagraph"><strong>&raquo;</strong></span>
                    Disseminare is the only trusted private institution to be inducted as the training partner at the <strong>Reserve Bank of India</strong> (India's Central Regulatory Institution) and <strong>NABARD</strong> (for their Regional Rural Banks).
                </p>
            </div>
        </div>
    </div>













</section>
<!--== Team Area End ==-->

<?php include_once 'common/footer.php'; ?> 