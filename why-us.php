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
        <div class="row mb-3">            
            <div class="col-md-4">
                <div class="why-us-heading-box">
                    <span class="text-center">17 years</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="why-us-heading-box">
                    <span class="text-center">70+ Partner Financial Institutions</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="why-us-heading-box">                    
                    <span class="text-center">2 Lakhs+ officials trained</span>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-12 text-center top-text mt-5">
                <h4 class="text-primary font-weight-bold pb-2">Disseminare has established itself as a niche global brand in the banking and finance sector over the past 17 years.</h4>
            </div>
        </div>




        <div class="row mt-4">
            <div class="col-12">
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
                    Founder and lead trainer, <strong>Prof. Praloy Majumder</strong>, widely known as the <em>"Risk Guru"</em>, brings over <strong>30 years of training experience</strong> at India's most reputable institutions.
                </p>
                <p class="pb-3">
                <span class="htmlEntitiesForParagraph"><strong>&raquo;</strong></span>
                    Disseminare's <strong>management and advisory team</strong> includes industry leaders from prestigious institutions such as <strong>IITs, IIMs, and former RBI CGMs</strong>, committed to shaping a better future for learners.
                </p>
                <p class="pb-3">
                <span class="htmlEntitiesForParagraph"><strong>&raquo;</strong></span>
                    For the past 17 years, Disseminare has been the <strong>preferred training partner</strong> for leading financial institutions across <strong>India, Bangladesh, and the Middle East</strong>.
                </p>
                <p class="pb-3">
                <span class="htmlEntitiesForParagraph"><strong>&raquo;</strong></span>
                    Disseminare is the only trusted private institution to be inducted as the training partner at the <strong>Reserve Bank of India</strong> (India's Central Regulatory Institution) and <strong>NABARD</strong> (for their Regional Rural Banks).
                </p>
                <p class="pb-3">
                <span class="htmlEntitiesForParagraph"><strong>&raquo;</strong></span>
                Disseminare provides flexible learning through <strong>multiple channels: classroom training</strong> with both open and customized sessions, and virtual training options including <strong>VILT</strong> (Virtual Instructor-Led Training) and <strong>self-paced courses and certifications</strong>.
                </p>
                <p class="pb-3">
                <span class="htmlEntitiesForParagraph"><strong>&raquo;</strong></span>
                Disseminare is also one of the <strong>accredited training institutes</strong> by Indian Institute of Banking & Finance <strong>(IIBF)</strong> for Debt Recovery Agent <strong>(DRA)</strong> training which is mandatory training for collection/recovery officials.
                </p>
                <p class="pb-3">
                <span class="htmlEntitiesForParagraph"><strong>&raquo;</strong></span>
                It boasts a pool of <strong>70+ trainers</strong> across multiple locations and has the capability to provide training in <strong>vernacular languages</strong>. 
                </p>
            </div>
        </div>
    </div>
</section>
<!--== Team Area End ==-->

<?php include_once 'common/footer.php'; ?> 