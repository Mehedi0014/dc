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
<section id="efficiency-development-programmes-area">

    <section class="container-wrapper-odd pt-5 pb-5">
        <div class="container my-2">
            <div class="heading-with-section-link">
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <h4 class="text-primary font-weight-bold edp-heading-box">Coaching/Counselling/Consulting (Online and In-Person):</h4>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <ul>
                            <a href="#bdtm"><li>Board of Directors & Top Management</li></a>
                            <a href="#cro"><li>Chief Risk Officer (CRO) with Team</li></a>
                            <a href="#cco"><li>Chief Compliance Officer (CCO) with Team</li></a>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <a href="#cao"><li>Chief Audit Officer (CAO) with Team</li></a>
                            <a href="#ms"><li>Management Satsang</li></a>
                            <a href="#piep"><li>Personal Interviews for Executive Promotions - Tips to Succeed</li></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="bdtm" class="container-wrapper-even">
        <div class="container">
            <div class="mb-4">
                <h3 class="text-center double-line-under-text">BOARD OF DIRECTORS & TOP MANAGEMENT TEAM</h3>
                <p class="pb-2">With changing characteristics of risks and lurking complexities of managing sources and uses of funds, the role of the Board of Directors and the Top Management Team of the Institutions has become demanding. The change in stance of running institutions from 'volume of net profits' to 'boosting self-resilience' to transform the Institutions towards ones those are 'distress-immune' and 'future-ready' has made their role further complicated in the sense that the decisions have turned hugely skill-intensive.</p>
                <p class="pb-2">It has hence become imperative for the Institutions to expose them to newer developments in the business environment as also to innovations on the techniques and tools to run such institutions.</p>
                <p class="pb-2">This initiative aims at filling this requirement adequately.</p>
            </div>


            <div class="row mb-4">
                <div class="col-md-6 mt-3">
                    <h5 class="h5">EXPECTED OUTCOMES FROM THE INTERACTION</h5>
                    <ul class="list-group">
                        <li class="mb-2"><i class="fa fa-forward"></i> Getting a sense on the Institution-specific developments in sync with changing scenario in the Economy and the markets.</li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Understanding their expected contributions to the running of the Institution in general and the Board proceedings in particular.</li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Navigating the brewing risks for the Institution and the possible modalities for their hedging.</li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Getting enlightened on the quality and coverage of various policy notes submitted to the Board for discussion and approval.</li>
                    </ul>
                </div>
                <div class="col-md-6 mt-3">
                    <h5 class="h5">INDICATIVE AREAS FOR INTERACTION</h5>
                    <ul class="list-group">
                        <li class="mb-2"><i class="fa fa-forward"></i> Changes All Around – A Brief Interaction</li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Change in Responsibilities and Accountability in sync with the changing environment and the newer risks brewing. </li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Adapting to Changes and creating an Enterprise-Wide Culture on Governance, Risks, Assurance, Conduct and Efficiency. </li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Making your Institution "Distress-Immune" and "Future-Ready"</li>
                    </ul>
                </div>
            </div>


            <div class="contact-info">
                <div class="h6 font-weight-bold">For other details please contact</div>
                <div><i class="fa fa-envelope-o"></i> Shri Abhishek Toshniwal: <a href="mailto:abhishek@disseminare.com">abhishek@disseminare.com</a></div>
                <div><i class="fa fa-volume-control-phone"></i> 9820301067</div>
            </div>            
        </div>
    </section>

    <section id="cro" class="container-wrapper-odd">
        <div class="container">
            <div class="mb-4">
                <h3 class="text-center double-line-under-text">CHIEF RISK OFFICER (CRO) with TEAM</h3>
                <p class="pb-2">With changing times, newer risks are brewing. Identifying and managing them have become nightmarish for the CROs and his/her Team members. Besides, the change in stance of being able to smell distress in advance and to be able to transform the Institutions towards ones those are 'distress-immune' and 'future-ready' has made their role further complicated in the sense that the job responsibilities have turned hugely skill-intensive.</p>
                <p class="pb-2">It has hence become imperative for the Institutions to expose them to newer developments in the business environment as also to innovations on the techniques and tools to run the Risk management functions responsibly.</p>
                <p class="pb-2">This initiative aims at filling this requirement adequately.</p>
            </div>


            <div class="row mb-4">
                <div class="col-md-6 mt-3">
                    <h5 class="h5">EXPECTED OUTCOMES FROM THE INTERACTION</h5>
                    <ul class="list-group">
                        <li class="mb-2"><i class="fa fa-forward"></i> Getting a sense on the Institution-specific developments in sync with changing scenario in the Economy and the markets.</li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Navigating the brewing risks for the Institution and the possible modalities for their hedging.</li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Getting enlightened on the quality and coverage of Risks Reporting Frameworks submitted to the Board for discussion and approval.</li>
                    </ul>
                </div>
                <div class="col-md-6 mt-3">
                    <h5 class="h5">INDICATIVE AREAS FOR INTERACTION</h5>
                    <ul class="list-group">
                        <li class="mb-2"><i class="fa fa-forward"></i> Changes All Around - Brewing of Newer Risks from the Business - A Brief Interaction</li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Revisiting the Risk Appetite, Risk Tolerance of your Institution and making the Frameworks dynamic</li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Adapting to Changes and creating an Enterprise-Wide Culture/sensitiveness on Risks </li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Contributing to the efforts of your Institution to make itself "Distress-Immune" and "Future-Ready"</li>
                    </ul>
                </div>
            </div>


            <div class="contact-info">
                <div class="h6 font-weight-bold">For other details please contact</div>
                <div><i class="fa fa-envelope-o"></i> Shri Abhishek Toshniwal: <a href="mailto:abhishek@disseminare.com">abhishek@disseminare.com</a></div>
                <div><i class="fa fa-volume-control-phone"></i> 9820301067</div>
            </div>            
        </div>
    </section>

    <section id="cco" class="container-wrapper-even">
        <div class="container">
            <div class="mb-4">
                <h3 class="text-center double-line-under-text">CHIEF Compliance OFFICER (CCO) with TEAM</h3>
                <p class="pb-2">WWith changing times, newer risks are brewing. Business Strategies and Models are changing fast with the help of technology. Regulatory and Supervisory stipulations are increasing. CCOs are finding the task of Identifying ways and means to handle the Compliance functions hard to manage. Regulatory Enforcement actions over suboptimal execution is surfacing as a big challenge for the CCOs.  Besides, the change in stance of being able to smell distress in advance and to be able to transform the Institutions towards ones those are 'distress-immune' and 'future-ready' has made their role further complicated in the sense that the job responsibilities have turned hugely skill-intensive.</p>
                <p class="pb-2">It has hence become imperative for the Institutions to expose them to newer developments in the business environment as also to innovations on the techniques and tools to run the Compliance management functions responsibly.</p>
                <p class="pb-2">This initiative aims at filling this requirement adequately.</p>
            </div>


            <div class="row mb-4">
                <div class="col-md-6 mt-3">
                    <h5 class="h5">EXPECTED OUTCOMES FROM THE INTERACTION</h5>
                    <ul class="list-group">
                        <li class="mb-2"><i class="fa fa-forward"></i> Getting a sense on the Institution-specific developments in sync with changing scenario in the Economy and the markets.</li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Navigating the brewing risks for the Institution and the complexities of internal controls as also regulatory guidelines and the possible modalities for their successful management.</li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Getting enlightened on the quality and coverage of undertaking the Compliance function and Compliance Reporting Frameworks submitted to the Board for discussion and approval.</li>
                    </ul>
                </div>
                <div class="col-md-6 mt-3">
                    <h5 class="h5">INDICATIVE AREAS FOR INTERACTION</h5>
                    <ul class="list-group">
                        <li class="mb-2"><i class="fa fa-forward"></i> Changes All Around - Brewing of Newer Risks from the Business - A Brief Interaction</li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Revisiting the intensity of Compliance function given higher levels of Risk Appetite, Risk Tolerance of your Institution carrying with them tougher and complicated internal controls and regulatory stipulations.</li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Adapting to Changes and creating an Enterprise-Wide Culture/sensitiveness on Compliance.</li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Contributing to the efforts of your Institution to make itself "Distress-Immune" and "Future-Ready"</li>
                    </ul>
                </div>
            </div>


            <div class="contact-info">
                <div class="h6 font-weight-bold">For other details please contact</div>
                <div><i class="fa fa-envelope-o"></i> Shri Abhishek Toshniwal: <a href="mailto:abhishek@disseminare.com">abhishek@disseminare.com</a></div>
                <div><i class="fa fa-volume-control-phone"></i> 9820301067</div>
            </div>            
        </div>
    </section>

    <section id="cao" class="container-wrapper-odd">
        <div class="container">
            <div class="mb-4">
                <h3 class="text-center double-line-under-text">CHIEF AUDIT OFFICER (CAO) with TEAM</h3>
                <p class="pb-2">With changing characteristics of risks and lurking complexities of managing sources and uses of funds, the role of the internal Audit Team has become complicated. On the back of use of technology, number and nature of transactions of the Institutions has become too complex to audit for their reasonableness. Attempts to defraud the institution and its customers by conduct-contaminated of its own personnel and those from outside has completely transformed the Audit function. The change in stance of running institutions from 'volume of net profits' to 'boosting self-resilience' to transform the Institutions towards ones those are 'distress-immune' and 'future-ready' has made their role further complicated in the sense that the whole functions has turned hugely skill-intensive.</p>
                <p class="pb-2">It has hence become imperative for the Institutions to expose them to newer developments in the business environment as also to innovations on the techniques and tools to run such institutions.</p>
                <p class="pb-2">This initiative aims at filling this requirement adequately.</p>
            </div>


            <div class="row mb-4">
                <div class="col-md-6 mt-3">
                    <h5 class="h5">EXPECTED OUTCOMES FROM THE INTERACTION</h5>
                    <ul class="list-group">
                        <li class="mb-2"><i class="fa fa-forward"></i> Getting a sense on the Institution-specific developments in sync with changing scenario in the Economy and the markets.</li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Understanding their expected contributions to the running of the Audit function optimally.</li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Navigating the brewing risks for the Institution and the possible modalities for their management from the Audit viewpoint.</li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Getting enlightened on the quality and coverage of various policy notes submitted to the Board for discussion and approval.</li>
                    </ul>
                </div>
                <div class="col-md-6 mt-3">
                    <h5 class="h5">INDICATIVE AREAS FOR INTERACTION</h5>
                    <ul class="list-group">
                        <li class="mb-2"><i class="fa fa-forward"></i> Changes All Around - A Brief Interaction</li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Change in Responsibilities and Accountability in sync with the changing environment and the newer risks brewing.</li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Adapting to Changes and creating an Enterprise-Wide Culture on internal Audit and its ramifications.</li>
                        <li class="mb-2"><i class="fa fa-forward"></i> Making your Institution "Distress-Immune" and "Future-Ready"</li>
                    </ul>
                </div>
            </div>


            <div class="contact-info">
                <div class="h6 font-weight-bold">For other details please contact</div>
                <div><i class="fa fa-envelope-o"></i> Shri Abhishek Toshniwal: <a href="mailto:abhishek@disseminare.com">abhishek@disseminare.com</a></div>
                <div><i class="fa fa-volume-control-phone"></i> 9820301067</div>
            </div>            
        </div>
    </section>

    <section id="ms" class="container-wrapper-even">
        <div class="container">
            <div class="mb-4">
                <h3 class="text-center double-line-under-text">MANAGEMENT SATSANG</h3>
                <p class="text-center mb-4">A Discourse on New Age Leadership Concerns</p>
                <ul class="list-group">
                    <li class="mb-2"><i class="fa fa-forward"></i> Boosting Self-Resilience of Body, Mind & Soul for Work & Home Balance</li>
                    <li class="mb-2"><i class="fa fa-forward"></i> Shedding Arrogance, Negative Attitude & Vindictiveness</li>
                    <li class="mb-2"><i class="fa fa-forward"></i> Hard Work, Loyalty & Earning Trust</li>
                    <li class="mb-2"><i class="fa fa-forward"></i> Adopting and Adapting Changes with being Agonised</li>
                </ul>
            </div>
        </div>
    </section>


    <section id="piep" class="container-wrapper-odd">
        <div class="container">
            <div class="mb-4">
                <h3 class="text-center h3 double-line-under-text">PERSONAL INTERVIEWS FOR EXECUTIVE PROMOTIONS - TIPS TO SUCCEED</h3>
            </div>
            <div class="mt-3">
                <ul class="list-group">
                    <li class="mb-2"><i class="fa fa-forward"></i> Current Issues in the Economy and the Financial Sector - What should be an ideal viewpoint</li>
                    <li class="mb-2"><i class="fa fa-forward"></i> What to reply that the Interviewer wants to hear?</li>
                    <li class="mb-2"><i class="fa fa-forward"></i> The Tone, Tenor and the Body Language</li>
                </ul>
            </div>
        </div>
    </section>


    <section class="container-wrapper-even pt-5 pb-5">
        <div class="container my-2">
            <h4 class="text-primary font-weight-bold text-center edp-heading-box">eLearning Courses:</h4>
            <div class="mt-3 mt-5">
                <ul class="list-group">
                    <li class="mb-2"><i class="fa fa-forward"></i> Supervisory and Regulatory Guidelines and Expectations in various areas of operation</li>
                    <li class="mb-2"><i class="fa fa-forward"></i> Functioning of an NBFC</li>
                    <li class="mb-2"><i class="fa fa-forward"></i> Functioning of Urban and Rural Cooperative Banks</li>
                    <li class="mb-2"><i class="fa fa-forward"></i> Assets Liabilities Management</li>
                    <li class="mb-2"><i class="fa fa-forward"></i> Board Oversight and Assurance Standards</li>
                    <li class="mb-2"><i class="fa fa-forward"></i> Keeping your Institution Future-Ready - An Agenda for the Personnel</li>
                    <li class="mb-2"><i class="fa fa-forward"></i> Integrated Treasury Operations</li>
                </ul>
            </div>
        </div>
    </section>






</section>
<!--== Team Area End ==-->

<?php include_once 'common/footer.php'; ?> 