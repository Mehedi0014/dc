<?php include_once 'common/header.php'; ?>
<?php
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'courses' and status = '0'";
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
                    <h2>Past Assignments</span></h2>
                </div>

                <div class="page-breadcrum">
                    <ol>
                        <li><a href="<?php echo $base_url; ?>">Home</a></li>

                        <li class="active"><a href="<?php echo $base_url; ?>all_courses.php">All Courses/ Past Assigment</a></li>
                    </ol>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Header Area End ==-->

<!--== Service Area Start ==-->
<section id="blog-page" class="section-padding">
    <div class="container">
        <div class="row">
            <h2>Past Assignment</h2>
            <br>
        </div>
        
                    <div class="row">
            <br>
            <h4>Year 2019</h4>
            <br>
            <br>

                <table class="table table-bordered table-striped">
	<thead>
		<tr height="21">
			<th height="21" width="164">Date</th>
			<th width="355">Program Title</th>
			<th width="99">Location</th>
		</tr>
	</thead>
	<tbody>
		<tr height="21">
			<td height="21">11th April 2019</td>
			<td>Basic Credit</td>
			<td></td>
		</tr>
		<tr height="21">
			<td height="21">16th April 2019</td>
			<td>Analytical framework for selection of borrowers</td>
			<td></td>
		</tr>
		<tr height="21">
			<td height="21">30th April 2019</td>
			<td>Analysis of Financial Statement</td>
			<td></td>
		</tr>
		<tr height="21">
			<td height="21">08th May 2019</td>
			<td>Fund Based Working Capital</td>
			<td></td>
		</tr>
		
	</tbody>
</table>

        </div>
        
            <div class="row">
            <br>
            <h4>Year 2018</h4>
            <br>
            <br>

                    <table class="table table-bordered table-striped">
	<thead>
		<tr height="21">
			<th height="21" width="164">Date</th>
			<th width="355">Program Title</th>
			<th width="99">Location</th>
		</tr>
	</thead>
	<tbody>
		<tr height="21">
			<td height="21">2-3 April 2018</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">9-10 April 2018</td>
			<td>CRAN Writing Skills</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">21st April 2018</td>
			<td>Project Finance</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">26th to 28th April 2018</td>
			<td>Supply Chain Finance</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">7th to 17th May</td>
			<td>Gold Loan Valuation - Induction Program</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">4-5 May 2018</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">7-8 May 2018</td>
			<td>CRAN Writing Skills</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">8-9 May 2018</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">10-11 May 2018</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">9-10 May 2018</td>
			<td>CRAN Writing Skills</td>
			<td>Bangalore</td>
		</tr>
		<tr height="21">
			<td height="21">11-12 May 2018</td>
			<td>Understanding Balance sheet</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">14-15 May 2018</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Bangalore</td>
		</tr>
		<tr height="21">
			<td height="21">15th May 2018</td>
			<td>Advanced Corporate Credit</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">17-18 May 2018</td>
			<td>Understanding Balance sheet</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">14-15 May 2018</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">18-19 May 2018</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">18-19 May 2018</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Ahmedabad</td>
		</tr>
		<tr height="21">
			<td height="21">2nd June 2018</td>
			<td>Cam Writing Skills</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">4-5 June 2018</td>
			<td>Credit Skills on Secured Lending</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">4-5 June 2018</td>
			<td>Credit Skills on Secured Lending</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">4-5 June 2018</td>
			<td>Credit Skills on Secured Lending</td>
			<td>Bangalore</td>
		</tr>
		<tr height="21">
			<td height="21">4-5 June 2018</td>
			<td>Credit Skills on Secured Lending</td>
			<td>Ahmedabad</td>
		</tr>
		<tr height="21">
			<td height="21">2nd to 12th July 2018</td>
			<td>Gold Loan Valuation - Induction Program</td>
			<td>Indore</td>
		</tr>
		<tr height="21">
			<td height="21">2-3 July 2018</td>
			<td>SME Credit skills</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">7th July 2018</td>
			<td>Anti Money Laundering</td>
			<td>Varanasi</td>
		</tr>
		<tr height="21">
			<td height="21">9-10th July 2018</td>
			<td>SME Credit skills</td>
			<td>Chennai</td>
		</tr>
		<tr height="21">
			<td height="21">11-12th July 2018</td>
			<td>SME Credit skills</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">19-20th July 2018</td>
			<td>Affordable Housing Credit</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">7th Aug 2018</td>
			<td>GST</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">8th to 14th Aug 2018</td>
			<td>Gold Loan Valuation - Induction Program</td>
			<td>Kolkata</td>
		</tr>
		<tr height="21">
			<td height="21">13th to 19th Aug 2018</td>
			<td>Gold Loan Valuation - Induction Program</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">20th Aug 2018</td>
			<td>Ind AS</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">3rd to 9th Sept 2018</td>
			<td>Gold Loan Valuation - Induction Program</td>
			<td>Bhubaneswar</td>
		</tr>
		<tr height="21">
			<td height="21">6th Sept 2018</td>
			<td>Working Capital products</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">7-8th Sept 2018</td>
			<td>CRAN Writing Skills</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">18th to 21st Sept 2018</td>
			<td>Credit Skills Induction workshop</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">24th to 30th Sept 2018</td>
			<td>Gold Loan Valuation - Induction Program</td>
			<td>Ahmedabad</td>
		</tr>
		<tr height="21">
			<td height="21">1 to 7th Oct 2018</td>
			<td>Gold Loan Valuation - Induction Program</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">3rd Oct 2018</td>
			<td>Working Capital products</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">6th Oct 2018</td>
			<td>Credit Skills</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">2nd, 5th, 10th Oct 2018</td>
			<td>Credit Risk - Key Concepts</td>
			<td>Pune</td>
		</tr>
		<tr height="21">
			<td height="21">8th - 9th Oct 2018</td>
			<td>Credit workshop for Mortgage lending</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">10th - 11th Oct 2018</td>
			<td>Credit workshop for Mortgage lending</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">11th - 12th Oct 2018</td>
			<td>Retail Collection</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">12th - 13th Oct 2018</td>
			<td>CRAN Writing Skills</td>
			<td>Ahmedabad</td>
		</tr>
		<tr height="21">
			<td height="21">15th - 16th Oct 2018</td>
			<td>Affordable Housing Credit</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">16th Oct 2018</td>
			<td>Export Import Finance</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">22 to 28 Oct 2018</td>
			<td>Gold Loan Valuation - Induction Program</td>
			<td>Pune</td>
		</tr>
		<tr height="21">
			<td height="21">23 to 29 Oct 2018</td>
			<td>Gold Loan Valuation - Induction Program</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">25th Oct 2018</td>
			<td>Export Import Finance</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">26th Oct 2018</td>
			<td>Export Import Finance</td>
			<td>Hyderabad</td>
		</tr>
		<tr height="21">
			<td height="21">29th to 4th Nov 2018</td>
			<td>Gold Loan Valuation - Induction Program</td>
			<td>Bangalore</td>
		</tr>
		<tr height="21">
			<td height="21">29th to 4th Nov 2018</td>
			<td>Gold Loan Valuation - Induction Program</td>
			<td>Mumbai</td>
		</tr>
	</tbody>
</table>


        </div>
            <div class="row">
            <br>
            <h4>Year 2017</h4>
            <br>
            <br>

                    <table class="table table-bordered table-striped">
	<tbody>
		<tr height="21">
			<th height="21" width="109">Date</th>
			<th width="355">Program Title</th>
			<th width="88">Location</th>
		</tr>
		<tr height="21">
			<td height="21">7th April</td>
			<td>Education sector - Industry Analysis</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">10 &amp; 11&nbsp; April</td>
			<td>Personal Discussion Skills</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">10 &amp; 11&nbsp; April</td>
			<td>Personal Discussion Skills</td>
			<td>Ahmedabad</td>
		</tr>
		<tr height="21">
			<td height="21">19 &amp; 20 April</td>
			<td>Early Warning Signal</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">28 &amp; 29 April</td>
			<td>Operational Risk</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">29th April</td>
			<td>Personal Discussion Skills</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">1 to 6 May</td>
			<td>Credit Skill Induction</td>
			<td>Hyderabad</td>
		</tr>
		<tr height="21">
			<td height="21">8 &amp; 9 May</td>
			<td>Basel 2</td>
			<td>Chennai</td>
		</tr>
		<tr height="21">
			<td height="21">8 to 18 May</td>
			<td>Credit Induction&nbsp;</td>
			<td>Bangalore</td>
		</tr>
		<tr height="21">
			<td height="21">15th May</td>
			<td>Basel</td>
			<td>Chennai</td>
		</tr>
		<tr height="21">
			<td height="21">16 &amp; 18 May</td>
			<td>Credit Induction&nbsp;</td>
			<td>Chennai</td>
		</tr>
		<tr height="21">
			<td height="21">15 to 20 May</td>
			<td>Credit Skill Induction</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">22 to 31 May</td>
			<td>Credit Induction&nbsp;</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">24 to 27 May</td>
			<td>Renewable energy</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">25 to 31 May</td>
			<td>Credit Induction&nbsp;</td>
			<td>Lucknow</td>
		</tr>
		<tr height="21">
			<td height="21">1 to 10 June</td>
			<td>Credit Induction&nbsp;</td>
			<td>Lucknow</td>
		</tr>
		<tr height="21">
			<td height="21">3rd June</td>
			<td>Agri Credit</td>
			<td>Chandigarh</td>
		</tr>
		<tr height="21">
			<td height="21">5th June</td>
			<td>Agri Credit</td>
			<td>Ahmedabad</td>
		</tr>
		<tr height="21">
			<td height="21">7-8 June</td>
			<td>Understanding Balance Sheet</td>
			<td>Bangalore</td>
		</tr>
		<tr height="21">
			<td height="21">8-9 June</td>
			<td>Understanding Balance Sheet</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">12th June</td>
			<td>Agri Credit</td>
			<td>Indore</td>
		</tr>
		<tr height="21">
			<td height="21">12 &amp; 13 June</td>
			<td>Understanding Balance Sheet</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">14 &amp; 15 June</td>
			<td>Understanding Balance Sheet</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">13 &amp; 14 June</td>
			<td>Credit &amp; Risk Management</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">15 &amp; 16 June</td>
			<td>Healthcre sector - Industry series</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">16 to 21 June</td>
			<td>Credit Induction&nbsp;</td>
			<td>Kolkata</td>
		</tr>
		<tr height="21">
			<td height="21">17 to 21 June</td>
			<td>Credit Induction&nbsp;</td>
			<td>Jaipur</td>
		</tr>
		<tr height="21">
			<td height="21">17 th June</td>
			<td>Agri Credit</td>
			<td>Hyderabad</td>
		</tr>
		<tr height="21">
			<td height="21">19th June</td>
			<td>Agri Credit</td>
			<td>Jaipur</td>
		</tr>
		<tr height="21">
			<td height="21">20th June</td>
			<td>Operational Risk</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">21st June</td>
			<td>Early Warning Signal</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">23 to 24 June</td>
			<td>Big Data Analytics</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">24 to 28 June</td>
			<td>Credit Induction&nbsp;</td>
			<td>Ahmedabad</td>
		</tr>
		<tr height="21">
			<td height="21">31st to 5th July</td>
			<td>Credit Induction&nbsp;</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">10 &amp; 11 July</td>
			<td>Understanding Balance Sheet</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">10 &amp; 11 July</td>
			<td>Early Warning Signal</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">14th July</td>
			<td>Credit Skills</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">17 to 21 July</td>
			<td>Credit Skills</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">17 &amp; 18 July</td>
			<td>Effective Personal Discussion</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">24 to 28 July</td>
			<td>Credit Induction&nbsp;</td>
			<td>Kolkata</td>
		</tr>
		<tr height="21">
			<td height="21">28th July</td>
			<td>Credit Skills</td>
			<td>Kochi</td>
		</tr>
		<tr height="21">
			<td height="21">1 &amp; 2 Aug</td>
			<td>SME Credit for Relationahip Manager</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">7 &amp; 8 Aug</td>
			<td>SME Credit for Relationahip Manager</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">10 &amp; 11 Aug</td>
			<td>Effective Personal Discussion</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">11th Aug</td>
			<td>Note Writing</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">18 &amp; 19 Aug</td>
			<td>Effective Personal Discussion</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">22nd Aug</td>
			<td>Note Writing</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">5 &amp; 6 Sept</td>
			<td>Credit &amp; PD skills</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">7 &amp; 8 Sept</td>
			<td>SME Credit for Relationahip Manager</td>
			<td>Chennai</td>
		</tr>
		<tr height="21">
			<td height="21">12 &amp; 13 Sept</td>
			<td>CRAN Writing Skills</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">12 &amp; 13 Sept</td>
			<td>CRAN Writing Skills</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">19 th Sept</td>
			<td>LAP Credit</td>
			<td>Aluva</td>
		</tr>
		<tr height="21">
			<td height="21">26 to 28 Sept</td>
			<td>Operational Risk Program</td>
			<td>Bangalore</td>
		</tr>
		<tr height="21">
			<td height="21">6th Oct</td>
			<td>Note Writing</td>
			<td>Chennai</td>
		</tr>
		<tr height="21">
			<td height="21">9 &amp; 10 Oct</td>
			<td>Early Warning Signal</td>
			<td>Chennai</td>
		</tr>
		<tr height="21">
			<td height="21">11 &amp; 12 Oct</td>
			<td>Early Warning Signal</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">13th Oct</td>
			<td>LAP Credit</td>
			<td>Lonavala</td>
		</tr>
		<tr height="21">
			<td height="21">24 &amp; 25 Oct</td>
			<td>Early Warning Signal</td>
			<td>Kolkata</td>
		</tr>
		<tr height="21">
			<td height="21">4 &amp; 6 Nov</td>
			<td>Mortgage Credit &amp; Risk</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">6 &amp; 7 Nov</td>
			<td>Credit &amp; PD skills</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">9 &amp; 10 Nov</td>
			<td>Advanced Financial analysis</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">9 &amp; 10 Nov</td>
			<td>Advanced Credit</td>
			<td>Aluva</td>
		</tr>
		<tr height="21">
			<td height="21">11th Nov</td>
			<td>Credit Administration Skills</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">13 &amp; 14 Nov</td>
			<td>Understanding Balance sheet</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">14 &amp; 15 Nov</td>
			<td>Early Warning Signal</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">18th Nov</td>
			<td>Advanced Credit</td>
			<td>Aluva</td>
		</tr>
		<tr height="21">
			<td height="21">25th Nov</td>
			<td>Credit Administration Skills</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">27 &amp; 28 Nov</td>
			<td>Basic Credit</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">1 &amp; 2 Dec</td>
			<td>Advanced Financial analysis</td>
			<td>Pune</td>
		</tr>
		<tr height="21">
			<td height="21">5 &amp; 6 Dec</td>
			<td>Credit &amp; PD skills</td>
			<td>Chennai</td>
		</tr>
		<tr height="21">
			<td height="21">7 &amp; 8 Dec</td>
			<td>Advanced Financial analysis</td>
			<td>Bangalore</td>
		</tr>
		<tr height="21">
			<td height="21">7 &amp; 8 Dec</td>
			<td>Advanced Financial analysis</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">9th Dec</td>
			<td>Credit Administration Skills</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">11 &amp; 12 Dec</td>
			<td>Advanced Financial analysis</td>
			<td>Kolkata</td>
		</tr>
		<tr height="21">
			<td height="21">12 &amp; 14 Dec</td>
			<td>Ind AS impact on Credit Assessment</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">15 &amp; 16 Dec</td>
			<td>Mortgage Credit &amp; Risk</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">15 &amp; 16 Dec</td>
			<td>Mortgage Credit &amp; Risk</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">5 &amp; 6 Jan</td>
			<td>Mortgage Credit &amp; Risk</td>
			<td>Bangalore</td>
		</tr>
		<tr height="21">
			<td height="21">9 &amp; 10 jan</td>
			<td>Ind AS impact on Credit Assessment</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">12 &amp; 13 Jan</td>
			<td>Early Warning Signal</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">1 &amp; 2 Feb</td>
			<td>Ind AS impact on Credit Assessment</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">5 &amp; 6 Feb</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">8 &amp; 9 Feb</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">5 &amp; 6 Feb</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Chennai</td>
		</tr>
		<tr height="21">
			<td height="21">9 &amp; 10 Feb</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Chennai</td>
		</tr>
		<tr height="21">
			<td height="21">10th Feb</td>
			<td>Credit Administration Skills</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">9-10 Feb</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Chandigarh</td>
		</tr>
		<tr height="21">
			<td height="21">9-10 Feb</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">12 &amp; 13 Feb</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">12 &amp; 13 Feb</td>
			<td>Ind AS impact on Credit Assessment</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">8 &amp; 9 Feb</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Pune</td>
		</tr>
		<tr height="21">
			<td height="21">14 &amp; 15 Feb</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Pune</td>
		</tr>
		<tr height="21">
			<td height="21">14 &amp; 15 Feb</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Bangalore</td>
		</tr>
		<tr height="21">
			<td height="21">14 &amp; 15 Feb</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Ahmedabad</td>
		</tr>
		<tr height="21">
			<td height="21">14 &amp; 15 Feb</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Mumbai</td>
		</tr>
		<tr height="21">
			<td height="21">16 &amp; 17 Feb</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Ludhiana</td>
		</tr>
		<tr height="21">
			<td height="21">16 &amp; 17 Feb</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">19 &amp; 20 Feb</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Delhi</td>
		</tr>
		<tr height="21">
			<td height="21">19 &amp; 20 Feb</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Jaipur</td>
		</tr>
		<tr height="21">
			<td height="21">21 &amp; 22 Feb</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Kolkata</td>
		</tr>
		<tr height="21">
			<td height="21">21 &amp; 22 Feb</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Surat</td>
		</tr>
		<tr height="21">
			<td height="21">9 &amp; 10 March</td>
			<td>Credit Risk Manangement for Small Business Banking</td>
			<td>Lucknow</td>
		</tr>
		<tr height="21">
			<td height="21">6 to 8 March</td>
			<td>Market Risk</td>
			<td>Bangalore</td>
		</tr>
		<tr height="21">
			<td height="21">21st March</td>
			<td>Advanced Credit Risk</td>
			<td>Ghandinagar</td>
		</tr>
	</tbody>
</table>


        </div>
    </div>
</section>



<!--== Service Area End ==-->
<?php include_once 'common/footer.php'; ?> 