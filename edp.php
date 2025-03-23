<?php include_once 'common/header.php'; ?>
<?php
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'efficiency_development_programmes' and status = '0'";
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

        <div class="row mb-4">
            <div class="col-12 text-center top-text">
                <h4 class="text-primary font-weight-bold pb-2">New Initiative - Efficiency Development Programmes for:</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-center">
                <ul>
                    <li>GM-CGM</li>
                    <li>CM-AGM-DGM</li>
                    <li>Scale I to III Officers</li>
                    <li>Fresh-Recruited Officers</li>
                </ul>
            </div>
            <div class="col-md-6 text-center">
                <ul>
                    <li>Members of Faculty</li>
                    <li>State Heads of the Institution</li>
                    <li>Branch Heads in a State</li>
                </ul>
            </div>
        </div>











        <div class="row mb-4">
            <div class="col-12 text-center top-text">
                <h4 class="text-primary font-weight-bold pb-2">Coaching/Counselling/Consulting (Online and In-Person):</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-bdtm-list" data-toggle="list" href="#list-bdtm" role="tab" aria-controls="bdtm">Board of Directors & Top Management</a>
                    <a class="list-group-item list-group-item-action" id="list-crot-list" data-toggle="list" href="#list-crot" role="tab" aria-controls="crot">Chief Risk Officer (CRO) with Team</a>
                </div>
            </div>
            <div class="col-8">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-bdtm" role="tabpanel" aria-labelledby="list-bdtm-list">
                        <h2>BOARD OF DIRECTORS & TOP MANAGEMENT TEAM</h2>
                        <p>
                            With changing characteristics of risks and lurking complexities of managing sources and uses of funds, the role of the Board of Directors and the Top Management Team of the Institutions has become demanding. The change in stance of running institutions from 'volume of net profits' to 'boosting self-resilience' to transform the Institutions towards ones those are 'distress-immune' and 'future-ready' has made their role further complicated in the sense that the decisions have turned hugely skill-intensive.
                        </p>
                        <p>
                            It has hence become imperative for the Institutions to expose them to newer developments in the business environment as also to innovations on the techniques and tools to run such institutions.
                        </p>
                        <p>This initiative aims at filling this requirement adequately.</p>

                        <h3>EXPECTED OUTCOMES FROM THE INTERACTION</h3>
                        <ul class="list-group">
                            <li>Getting a sense on the Institution-specific developments in sync with changing scenario in the Economy and the markets.</li>
                            <li>Understanding their expected contributions to the running of the Institution in general and the Board proceedings in particular.</li>
                            <li>Navigating the brewing risks for the Institution and the possible modalities for their hedging.</li>
                            <li>Getting enlightened on the quality and coverage of various policy notes submitted to the Board for discussion and approval.</li>
                        </ul>

                        <h3>INDICATIVE AREAS FOR INTERACTION</h3>
                        <ul class="list-group">
                            <li>Changes All Around – A Brief Interaction</li>
                            <li>Change in Responsibilities and Accountability in sync with the changing environment and the newer risks brewing.</li>
                            <li>Adapting to Changes and creating an Enterprise-Wide Culture on Governance, Risks, Assurance, Conduct and Efficiency.</li>
                            <li>Making your Institution "Distress-Immune" and "Future-Ready"</li>
                        </ul>
                        <em>For other details please contact – Shri Abhishek Toshniwal (abhishek@disseminare.com) (9820301067)</em>
                    </div>

                    <div class="tab-pane fade" id="list-crot" role="tabpanel" aria-labelledby="list-crot-list">
                    <h2>BOARD OF DIRECTORS & TOP MANAGEMENT TEAM</h2>
                        <p>
                            With changing characteristics of risks and lurking complexities of managing sources and uses of funds, the role of the Board of Directors and the Top Management Team of the Institutions has become demanding. The change in stance of running institutions from 'volume of net profits' to 'boosting self-resilience' to transform the Institutions towards ones those are 'distress-immune' and 'future-ready' has made their role further complicated in the sense that the decisions have turned hugely skill-intensive.
                        </p>
                        <p>
                            It has hence become imperative for the Institutions to expose them to newer developments in the business environment as also to innovations on the techniques and tools to run such institutions.
                        </p>
                        <p>This initiative aims at filling this requirement adequately.</p>

                        <h3>EXPECTED OUTCOMES FROM THE INTERACTION</h3>
                        <ul class="list-group">
                            <li>Getting a sense on the Institution-specific developments in sync with changing scenario in the Economy and the markets.</li>
                            <li>Understanding their expected contributions to the running of the Institution in general and the Board proceedings in particular.</li>
                            <li>Navigating the brewing risks for the Institution and the possible modalities for their hedging.</li>
                            <li>Getting enlightened on the quality and coverage of various policy notes submitted to the Board for discussion and approval.</li>
                        </ul>

                        <h3>INDICATIVE AREAS FOR INTERACTION</h3>
                        <ul class="list-group">
                            <li>Changes All Around – A Brief Interaction</li>
                            <li>Change in Responsibilities and Accountability in sync with the changing environment and the newer risks brewing.</li>
                            <li>Adapting to Changes and creating an Enterprise-Wide Culture on Governance, Risks, Assurance, Conduct and Efficiency.</li>
                            <li>Making your Institution "Distress-Immune" and "Future-Ready"</li>
                        </ul>
                        <em>For other details please contact – Shri Abhishek Toshniwal (abhishek@disseminare.com) (9820301067)</em>
                    </div>
                </div>
            </div>
        </div>






















        <div class="row mt-4">
            <div class="col-12">
                <div class="mb-4">
                    <h5 class="mb-2">
                        The only training company to have collaborated with a diverse clientele, including:
                    </h5>


                    <div class="row">
                        <div class="col-md-6">
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
                        <div class="col-md-6">
                            <img src="<?php echo $base_url; ?>upload/why-us/03.jpg" class="rounded mx-auto d-block" alt="...">
                        </div>
                    </div>



                    
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