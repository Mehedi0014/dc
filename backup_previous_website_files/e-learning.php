<?php include_once 'common/header.php'; ?>
<?php
$sql_content1 = "SELECT * FROM `page` WHERE `alias` = 'e-learning-course' and status = '0'";
$res_content1 = mysqli_query($con, $sql_content1) or trigger_error("Query Failed! SQL: $sql_content1 - Error: " . mysqli_error(), E_USER_ERROR);
$row_content1 = mysqli_fetch_assoc($res_content1);
?>
<style>
    iframe{
        height: 278px;
        width: 100%;
    }
</style>
<!--== Page Header Area Start ==-->
<section id="page-header" style="background-image: url(<?php echo $base_url . $document_page_banner . $row_content1['banner_img']; ?>)">
    <div class="container">
        <div class="row">
            <!-- Page Title Start -->
            <div class="col-lg-12 text-center">
                <div class="page-title">
                    <h2>E-learning Course</h2>
                </div>

                <div class="page-breadcrum">
                    <ol>
                        <li><a href="<?php echo $base_url; ?>">Home</a></li>
<li class="active"><a href="#"><?php echo $row_content1['title'] ?></a></li>
                    </ol>
                </div>
            </div>
            <!-- Page Title End -->
        </div>
    </div>
</section>
<!--== Page Header Area End ==-->
<div style="margin-top:100px; margin-bottom: 60px;" class="learning sec">
<div class="container">
    
<div class="row">
<div class="col-md-12 col-lg-12-col-xs-12 ">
<div class="accordian-sec">
    <div class="table-responsive">
        <table class="table">
        <tbody>
            <tr>
				<!-- <th width=0%><input type="checkbox" name="checkbox"/></th> -->
					<td width=100%>
						<button class="accordion">Module 1 - Introduction to Banking Products and Working Capital(2Hrs)</button>

						<div class="panel">
							<div class="col-lg-12 col-md-12">

								<table id="customers">
									<tbody>
										<tr>
											<th>Sr. No.</th>
											<th>Topics covered</th>
										</tr>
										<tr>
											<td>A</td>
											<td>Introduction and Banking products</td>
										</tr>
										<tr>
											<td>1</td>
											<td>Introduction</td>
										</tr>
										<tr>
											<td>1.1</td>
											<td>SME market</td>
										</tr>
										<tr>
											<td>1.2</td>
											<td>SME customer profile</td>
										</tr>
										<tr>
											<td>1.3</td>
											<td>Role & responsibility of adding value to SME customer by RM</td>
										</tr>
										<tr>
											<td></td>
											<td></td>
										</tr>
										<tr>
											<th>B</th>
											<th>Credit Products </th>
										</tr>
										<tr>
											<td>1</td>
											<td>Funding requirement of SME clients</td>
										</tr>
										<tr>
											<td>1.1</td>
											<td>Working capital loan </td>
										</tr>
										<tr>
											<td>a</td>
											<td>Working capital loan - Example (Fund based) </td>
										</tr>
										<tr>
											<td>b</td>
											<td>Working capital loan - Example (Non Fund based)</td>
										</tr>
										<tr>
											<td>1.2</td>
											<td>Term loan product</td>
										</tr>
										<tr>
											<td>a</td>
											<td>Term loan product</td>
										</tr>
										<tr>
											<td>b</td>
											<td>Term Loan - Example (Short/Medium term)</td>
										</tr>
										<tr>
											<td>1.3</td>
											<td>Term Loan - Example (Short/Medium term)</td>
										</tr>
										<tr>
											<th>C</th>
											<th>Term Loan - Example (Short/Medium term)</th>
										</tr>
										<tr>
											<td>1</td>
											<td>1. Working Capital</td>
										</tr>
										<tr>
											<td>1.1</td>
											<td>1. a. Working capital – Definition</td>
										</tr>
										<tr>
											<td>1.2</td>
											<td>1. b. Working capital – Characteristics</td>
										</tr>
										<tr>
											<td>2</td>
											<td>Pre-production phase</td>
										</tr>
										<tr>
											<td>3</td>
											<td>Pre-production phase</td>
										</tr>
										<tr>
											<td>4</td>
											<td>Start of Sales</td>
										</tr>
									</tbody>
								</table>                             

							</div>
						</div>
					</td>
				
					<td width=10% style="text-align:right;">Play</td>
				</tr>
				
				<tr>
				<td width=100%>
				<button class="accordion">Module 2 - Financial Statement Analysis (3 Hr) </button>

					<div class="panel">
					<div class="col-lg-12 col-md-12">

					<table id="customers">
						<tbody>
							<tr>
								<th>Sr. No.</th>
								<th>Topics covered</th>
							</tr>
							<tr>
								<td>A</td>
								<td>Qualitative analysis of borrower</td>
							</tr>
							<tr>
								<td>1</td>
								<td>Judgment of Intention</td>
							</tr>
							<tr>
								<td>1.1</td>
								<td>Borrower Intention (Business credentials, Reputation, Business Importance, Collateral security and Business need)</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Business model evaluation</td>
							</tr>
							<tr>
								<td>1.4</td>
								<td>Debtor Creditor list</td>
							</tr>
							<tr>
								<td>1.5</td>
								<td>Detecting Inflated/Deflated sales</td>
							</tr>
							
							<tr>
								<td>2</td>
								<td>Checking Financial statement position</td>
							</tr>
							<tr>
								<td>2.1</td>
								<td>Ratio Analysis and its implications</td>
							</tr>
							<tr>
								<td>2.2</td>
								<td>Cash Flow Analysis and its implications</td>
							</tr>
							<tr>
								<td>2.3</td>
								<td>Understanding company Perfomance and capability to repay the loan</td>
							</tr>

							
						</tbody>
					</table>                             

						</div>
					</div>
				</td>
				<td width=10% style="text-align:right;">Play</td>
				</tr>
				
				<tr>
				<td width=100%>
				<button class="accordion">Module 3 - Borrower Selection (3 Hr) </button>

					<div class="panel">
					<div class="col-lg-12 col-md-12">

					<table id="customers">
						<tbody>
							<tr>
                			<th>Sr. No.</th>
                			<th>Topics covered</th>
                    		</tr>
                    		<tr>
                    			<td>A</td>
                    			<td>Qualitative analysis of borrower</td>
                    		</tr>
                    		<tr>
                    			<td>1</td>
                    			<td>Judgment of Intention</td>
                    		</tr>
                    		<tr>
                    			<td>1.1</td>
                    			<td>Borrower Intention (Business credentials, Reputation, Business Importance, Collateral security and Business need)</td>
                    		</tr>
                    		<tr>
                    			<td>2</td>
                    			<td>Business model evaluation</td>
                    		</tr>
                    		<tr>
                    			<td>2.2</td>
                    			<td>Assessing borrower’s business model (Economic outlook, Industry factors, Business processes)</td>
                    		</tr>
                    		<tr>
                    			<th>B</th>
                    			<th>Quantitive analysis of borrower</th>
                    		</tr>
                    		
                    		<tr>
                    			<td>1</td>
                    			<td>Document verification checklist & verification of documents</td>
                    		</tr>
                    		<tr>
                    			<td>1.1</td>
                    			<td>Loan application form</td>
                    		</tr>
                    		<tr>
                    			<td>1.2</td>
                    			<td>Audited financials along with auditors and directors report</td>
                    		</tr>
                                    
                                    <tr>
                    			<td>1.3</td>
                    			<td>Tax audit report</td>
                    		</tr>
                                    
                                    <tr>
                    			<td>1.4</td>
                    			<td>Bank statement</td>
                    		</tr>
                                    
                                    <tr>
                    			<td>1.5</td>
                    			<td>GST return</td>
                    		</tr>
                                    
                                    <tr>
                    			<td>1.6</td>
                    			<td>List of debtors and creditors</td>
                    		</tr>
                    		<tr>
                    			<td>1.7</td>
                    			<td>Proposed Business plan</td>
                    		</tr>
                                    <tr>
                    			<td>1.8</td>
                    			<td>Security related documents</td>
                    		</tr>
                                    
                                    <tr>
                    			<th>C</th>
                    			<th>Personal net worth statement of the borrower</th>
                    		</tr>

							
						</tbody>
					</table>                             

						</div>
					</div>
				</td>
				<td width=10% style="text-align:right;">Play</td>
				</tr>
				
				<tr>
				<td width=100%>
				<button class="accordion">Module 4 - Fund Based Working Capital (3Hr)</button>

					<div class="panel">
					<div class="col-lg-12 col-md-12">

					<table id="customers">
						<tbody>
						    <tr>
                    			<th>Sr. No.</th>
                    			<th>Topics covered</th>
                    		</tr>
                    		<tr>
                    			<td>1</td>
                    			<td>What is working capital</td>
                    		</tr>
                    		<tr>
                    			<td>1.1</td>
                    			<td>A. Working capital cycle</td>
                    		</tr>
                    		<tr>
                    			<td>1.2</td>
                    			<td>Working capital cycle for manufacturer</td>
                    		</tr>
                    		<tr>
                    			<td>1.3</td>
                    			<td>Working capital cycle for service provider</td>
                    		</tr>
                    		<tr>
                    			<td>1.4</td>
                    			<td>Cash cycle</td>
                    		</tr>
                    		<tr>
                    			<td>1.5</td>
                    			<td>B. Working capital characteristics</td>
                    		</tr>
                    		
                    		<tr>
                    			<td>2</td>
                    			<td>B. Working capital characteristics</td>
                    		</tr>
                    		<tr>
                    			<td>3</td>
                    			<td>B. Working capital characteristics</td>
                    		</tr>
                    		<tr>
                    			<td>3.1</td>
                    			<td>A Meaning of Gross working capital</td>
                    		</tr>
                                    
                            <tr>
                    			<td>3.2</td>
                    			<td>A Meaning of Gross working capital </td>
                    		</tr>
                                    
                            <tr>
                    			<td>3.3</td>
                    			<td>C Meaning of working capital GAP </td>
                    		</tr>
                                    
                            <tr>
                    			<td>3.4</td>
                    			<td>D Meaning of Net Working Capital  </td>
                    		</tr>
                                    
                            <tr>
                    			<td>3.5</td>
                    			<td>Exercise on calculation of different items / components of working capital and how these can be used for working capital assessment </td>
                    		</tr>
                                    
                            <tr>
                    			<td>3.6</td>
                    			<td>Finished goods </td>
                    		</tr>
                            <tr>
                    			<td>3.7</td>
                    			<td>Drawing power calculation </td>
                    		</tr>
                            <tr>
                    			<td>3.8</td>
                    			<td>Reading of stock and book debt statement</td>
                    		</tr>
                    		
                            <tr>
                    			<td>4</td>
                    			<td>Understanding the importance of current ratio in working capital assessment </td>
                    		</tr>
                    		
                            <tr>
                    			<td>4.1</td>
                    			<td>Meaning of current ratio  </td>
                    		</tr>
                    		
                             <tr>
                    			<td>4.2</td>
                    			<td>How to interpret change in current ratio  </td>
                    		</tr>
                    		
                            <tr>
                    			<td>4.3</td>
                    			<td>How to handle decrease or increase of current ratio in working capital proposal  </td>
                    		</tr>
                                    
                            <tr>
                    			<td>5</td>
                    			<td>Different methods of assessment of fund based working capital  </td>
                    		</tr>
                                    
                            <tr>
                    			<td>5.1</td>
                    			<td>Concept of MPBF method</td>
                    		</tr>
                                    
                            <tr>
                    			<td>5.2</td>
                    			<td>Different methods under MPBF method </td>
                    		</tr>
                                    
                            <tr>
                    			<td>5.3</td>
                    			<td>How to find out working capital requirement from the balance sheet of a borrower by using MPBF method </td>
                    		</tr>
                                    
                            <tr>
                    			<td>5.4</td>
                    			<td>Concept of Turnover method </td>
                    		</tr>
                                    
                            <tr>
                    			<td>5.5</td>
                    			<td>How to calculate the turn over method very quickly </td>
                    		</tr>
                                    
                            <tr>
                    			<td>5.6</td>
                    			<td>Concept of cash budget method </td>
                    		</tr>
                                    
                            <tr>
                    			<td>5.7</td>
                    			<td>How to carry out assessment of fund based working capital through cash budget method </td>
                    		</tr>
                                    
                            <tr>
                    			<td>5.8</td>
                    			<td>Case study on turn over method and cash budget method </td>
                    		</tr>
                                    
                            <tr>
                    			<td>5.1</td>
                    			<td>Assessment of Packing credit</td>
                    		</tr>
                                    
                            <tr>
                    			<td>5.11</td>
                    			<td>Assessment of Post shipment Credit</td>
                    		</tr>
                                    
                            <tr>
                    			<td>6</td>
                    			<td>Discussion on entire process of working capital assessment </td>
                    		</tr>
                                    
                            <tr>
                    			<td>6.1</td>
                    			<td>Sourcing: Things to be done in sourcing </td>
                    		</tr>
                                    
                            <tr>
                    			<td>6.2</td>
                    			<td>Credit appraisal: Important points which must be present in the credit appraisal for working capital </td>
                    		</tr>
                                    
                            <tr>
                    			<td>6.3</td>
                    			<td>Process involved in disbursement </td>
                    		</tr>
                                    
                            <tr>
                    			<td>6.4</td>
                    			<td>Process involved in monitoring and accounts operation </td>
                    		</tr>
                                    
                            <tr>
                    			<td>6.5</td>
                    			<td>Process involved in renewal or exit of working capital accounts </td>
                    		</tr>
                                    
                            <tr>
                    			<td>7</td>
                    			<td>Different products for fund based working capital:</td>
                    		</tr>
                                    
                            <tr>
                    			<td>7.1</td>
                    			<td>Cash credit </td>
                    		</tr>
                                    
                            <tr>
                    			<td>7.2</td>
                    			<td>Overdraft </td>
                    		</tr>
                                    
                            <tr>
                    			<td>7.3</td>
                    			<td>Working Capital Demand Loan </td>
                    		</tr>
                                    
                            <tr>
                    			<td>7.4</td>
                    			<td>Bill Discounting  </td>
                    		</tr>
                                    
                            <tr>
                    			<td>7.5</td>
                    			<td>How to use different products for meeting customers need </td>
                    		</tr>
                            
							
						</tbody>
					</table>                             

						</div>
					</div>
				</td>
				<td width=10% style="text-align:right;">Play</td>
				</tr>
				
				<tr>
				<td width=100%>
				<button class="accordion">Module 5 - Non Fund Based Working Capital (3 Hr)</button>

					<div class="panel">
					<div class="col-lg-12 col-md-12">

					<table id="customers">
						<tbody>
						    <tr>
                    			<th>Sr. No.</th>
                    			<th>Topics covered</th>
                    		</tr>
                    		<tr>
                    			<td>1.1</td>
                    			<td>Importance of Non Fund Based Facility </td>
                    		</tr>
                    		<tr>
                    			<td>1.2</td>
                    			<td>Types of Non Fund Based Facillity: LC and BG </td>
                    		</tr>
                    		<tr>
                    			<td>1.3</td>
                    			<td>Differences between LC and BG </td>
                    		</tr>
                    		<tr>
                    			<td>1.4</td>
                    			<td>Assessment of Import LC </td>
                    		</tr>
                    		<tr>
                    			<td>1.5</td>
                    			<td>Assessment of Inland LC</td>
                    		</tr>
                    		<tr>
                    			<td>1.6</td>
                    			<td>Assessment of seasonal LC</td>
                    		</tr>
                    		
                    		<tr>
                    			<td>2.1</td>
                    			<td>Types of BG</td>
                    		</tr>
                    		<tr>
                    			<td>2.2</td>
                    			<td>Requirement of different types of BG</td>
                    		</tr>
                    		<tr>
                    			<td>2.3</td>
                    			<td>Assessment of Bid Bond </td>
                    		</tr>
                                    
                                    <tr>
                    			<td>2.4</td>
                    			<td>Assessment of Mobilisation advance </td>
                    		</tr>
                                    
                                    <tr>
                    			<td>2.5</td>
                    			<td>Assessment of performance guarantee</td>
                    		</tr>
                                    
                                    <tr>
                    			<td>2.6</td>
                    			<td>Assessment of performance guarantee for defect liability period </td>
                    		</tr>
                                    
                                    <tr>
                    			<td>2.7</td>
                    			<td>Assessment of guarantee for credit purchase </td>
                    		</tr>
                    		<tr>
                    			<td>3.1</td>
                    			<td>Risk associated with LC operation </td>
                    		</tr>
                                    <tr>
                    			<td>3.2</td>
                    			<td>Money Laundering risk associated with LC operation </td>
                    		</tr>
                                    
                                    <tr>
                    			<td>3.3</td>
                    			<td>Risk associated with BG Operation </td>
                    		</tr>
                                    
                                      <tr>
                    			<td>3.4</td>
                    			<td>Master quiz</td>
                    		</tr>
                            
							
						</tbody>
					</table>                             

						</div>
					</div>
				</td>
				<td width=10% style="text-align:right;">Play</td>
				</tr>
				
				
				<tr>
				<td width=100%>
				<button class="accordion">Module 6 - Term Loan Products (3Hr)</button>

					<div class="panel">
					<div class="col-lg-12 col-md-12">

					<table id="customers">
						<tbody>
						    <tr>
                    			<th>Sr. No.</th>
                    			<th>Topics covered</th>
                    		</tr>
                    		<tr>
                    			<td>1</td>
                    			<td>Term Loan Products</td>
                    		</tr>
                    		<tr>
                    			<td>2</td>
                    			<td>Fund Based Loan Products</td>
                    		</tr>
                    		<tr>
                    			<td>3</td>
                    			<td>Term Loan - Tenure-wise Classification</td>
                    		</tr>
                    		<tr>
                    			<td>4</td>
                    			<td>Term Loan - Purpose-wise Classification</td>
                    		</tr>
                    		<tr>
                    			<td>5</td>
                    			<td>Term Loan For Capacity Expansion</td>
                    		</tr>
                    		<tr>
                    			<td>6</td>
                    			<td>Term loan - Funding Margin Money for Working Capital</td>
                    		</tr>
                    		
                    		<tr>
                    			<td>7</td>
                    			<td>Term loan: Funding Other Non Current Assets</td>
                    		</tr>
                    		<tr>
                    			<td>8</td>
                    			<td>Term Loan Assessment - Capacity Expansion</td>
                    		</tr>
                    		<tr>
                    			<td>9</td>
                    			<td>Term Loan Assessment  - Identify Purpose</td>
                    		</tr>
                                    
                                    <tr>
                    			<td>10</td>
                    			<td>Term Loan Assessment - Project Cost Determination </td>
                    		</tr>
                                    
                                    <tr>
                    			<td>11</td>
                    			<td>Term Loan Assessment - Validation of Project Cost</td>
                    		</tr>
                                    
                                    <tr>
                    			<td>12</td>
                    			<td>Term Loan Assessment - Validation of Project Cost </td>
                    		</tr>
                                    
                                    <tr>
                    			<td>13</td>
                    			<td>Term Loan Assessment - Verification of Project Cash Flows</td>
                    		</tr>
                    		<tr>
                    			<td>14</td>
                    			<td>Term Loan Assessment - Sensitivity Analysis</td>
                    		</tr>
                                    <tr>
                    			<td>15</td>
                    			<td>Term Loan Assessment - Process Cycle </td>
                    		</tr>
                            
							
						</tbody>
					</table>                             

						</div>
					</div>
				</td>
				<td width=10% style="text-align:right;">Play</td>
				</tr>
				
				
				<tr>
				<td width=100%>
				<button class="accordion">Module 7 - CMA (3 Hr)</button>

					<div class="panel">
					<div class="col-lg-12 col-md-12">

					<table id="customers">
						<tbody>
						    <tr>
                    			<th>Sr. No.</th>
                    			<th>Topics covered</th>
                    		</tr>
                    		<tr>
                    			<td>1.1</td>
                    			<td>Different sub forms of CMA Form </td>
                    		</tr>
                    		<tr>
                    			<td>1.2</td>
                    			<td>Form II components</td>
                    		</tr>
                    		<tr>
                    			<td>1.3</td>
                    			<td>How to fill up Form II from P&L Statement </td>
                    		</tr>
                    		<tr>
                    			<td>1.4</td>
                    			<td>Checklist of additional information required from clients for filling up Form II of CMA Form </td>
                    		</tr>
                    		<tr>
                    			<td>1.5</td>
                    			<td>How to build up projections of Form II </td>
                    		</tr>
                    		<tr>
                    			<td>2.1</td>
                    			<td>Form III components </td>
                    		</tr>
                    		
                    		<tr>
                    			<td>2.2</td>
                    			<td>How to fill up Form III from Balance Sheet </td>
                    		</tr>
                    		<tr>
                    			<td>2.3</td>
                    			<td>Checklist of additional information required for filling up Form III </td>
                    		</tr>
                    		<tr>
                    			<td>2.4</td>
                    			<td>How to arrive at projections of Form III </td>
                    		</tr>
                                    
                                    <tr>
                    			<td>3.1</td>
                    			<td>Analysis of Form IV  </td>
                    		</tr>
                                    
                                    <tr>
                    			<td>3.2</td>
                    			<td>Analysis of Form VI </td>
                    		</tr>
                                    
                                    <tr>
                    			<td>3.3</td>
                    			<td>Assessment of MPBF from From V  </td>
                    		</tr>
                                    
                                    <tr>
                    			<td>3.4</td>
                    			<td>Master quiz </td>
                    		</tr>
                    		<tr>
                    			<td>3.5</td>
                    			<td>Adjustment that need to be made in case of fabricated Balance sheet</td>
                    		</tr>
						</tbody>
					</table>                             

						</div>
					</div>
				</td>
				<td width=10% style="text-align:right;">Play</td>
				</tr>
				
				<tr>
				<td width=100%>
				<button class="accordion">Module 8 - Security Creation& Credit Process (3Hr)</button>

					<div class="panel">
					<div class="col-lg-12 col-md-12">

					<table id="customers">
						<tbody>
    						    <tr>
                        			<th>Sr. No.</th>
                        			<th>Topics covered</th>
                        		</tr>
                        		<tr>
                        			<td>1</td>
                        			<td>Concept of security creation </td>
                        		</tr>
                        		<tr>
                        			<td>2</td>
                        			<td>Types of securities</td>
                        		</tr>
                        		<tr>
                        			<td>3</td>
                        			<td>Different methods of security creation</td>
                        		</tr>
                        		<tr>
                        			<td>4</td>
                        			<td>Process of security creation: Lien, Pledge, Hypothecation and Mortgage (Equitable, Registered)</td>
                        		</tr>
                        		<tr>
                        			<td>5</td>
                        			<td>Dos and Don’ts of Security Creation</td>
                        		</tr>
                        		<tr>
                        			<td>6</td>
                        			<td>Credit Process – Introduction</td>
                        		</tr>
                        		
                        		<tr>
                        			<td>7</td>
                        			<td>Pre Disbursement stages</td>
                        		</tr>
                        		<tr>
                        			<td>8</td>
                        			<td>Post Disbursement stages</td>
                        		</tr>
						</tbody>
					</table>                             

						</div>
					</div>
				</td>
				<td width=10% style="text-align:right;">Play</td>
				</tr>
				
				
				<tr>
				<td width=100%>
				<button class="accordion">Module 9 – Operational Risk (3 Hr)</button>

					<div class="panel">
					<div class="col-lg-12 col-md-12">

					<table id="customers">
						<tbody>
    						    <tr>
                        			<th>Sr. No.</th>
                        			<th>Topics covered</th>
                        		</tr>
                        		<tr>
                        			<td>1</td>
                        			<td>Introduction to Risk Management of Bank  </td>
                        		</tr>
                        		<tr>
                        			<td>2</td>
                        			<td>Position of Operational Risk in the overall risk management of bank </td>
                        		</tr>
                        		<tr>
                        			<td>3</td>
                        			<td>History of introduction of Operational Risk under Basel norms </td>
                        		</tr>
                        		<tr>
                        			<td>4</td>
                        			<td>Characteristics of Operational Risk and How Operational Risk is different from other types of risk </td>
                        		</tr>
                        		<tr>
                        			<td>5</td>
                        			<td>Supervisory frame work of Operational Risk </td>
                        		</tr>
                        		<tr>
                        			<td>6</td>
                        			<td>RBI circulars of Operational Risk </td>
                        		</tr>
                        		
                        		<tr>
                        			<td>7</td>
                        			<td>Importance of Operational Risk awareness of Bank Process </td>
                        		</tr>
                        		<tr>
                        			<td>8</td>
                        			<td>Operational Risk Reporting Structure of Banks </td>
                        		</tr>
                                        
                                <tr>
                        			<td>9</td>
                        			<td>List of Operational Risk Events as per Basel Guidelines </td>
                        		</tr>
                                        
                                <tr>
                        			<td>10</td>
                        			<td>List of Operational Risk events for liability products </td>
                        		</tr>
                                        
                                <tr>
                        			<td>11</td>
                        			<td>List of Operational Risk events for asset products </td>
                        		</tr>
                                        
                                <tr>
                        			<td>12</td>
                        			<td>List of Operational Risk events for treasury functions </td>
                        		</tr>
                                        
                                <tr>
                        			<td>13</td>
                        			<td>List of Operational Risk events for support services </td>
                        		</tr>
						</tbody>
					</table>                             

						</div>
					</div>
				</td>
				<td width=10% style="text-align:right;">Play</td>
				</tr>
				
				
				<tr>
				<td width=100%>
				<button class="accordion">Module 10 – FOREX Operations (4 Hr)</button>

					<div class="panel">
					<div class="col-lg-12 col-md-12">

					<table id="customers">
						<tbody>
    						    <tr>
                        			<th>Sr. No.</th>
                        			<th>Topics covered</th>
                        		</tr>
                        		<tr>
                        			<td>1</td>
                        			<td>Overview of FOREX business in India and its importance</td>
                        		</tr>
                        		<tr>
                        			<td></td>
                        			<td>Authorized dealers role in forex business  (Forex branch structure, AD branches and its functions)</td>
                        		</tr>
                        		<tr>
                        			<td></td>
                        			<td>Liberalization, Privatization and Globalization effects on Forex Transaction in India</td>
                        		</tr>
                        		<tr>
                        			<td></td>
                        			<td>Role of various association and regulators involved in regulating forex business and international trade (MOCI, MOF, DGFT, Customs, RBI, FEDAI in brief)</td>
                        		</tr>
                        		<tr>
                        			<td></td>
                        			<td>Role of FOREX Officers</td>
                        		</tr>
                        		<tr>
                        			<td></td>
                        			<td>FTP overview</td>
                        		</tr>
                        		
                        		<tr>
                        			<td>2</td>
                        			<td>Basics of FOREX </td>
                        		</tr>
                        		<tr>
                        			<td></td>
                        			<td>Nostro-Vostro concepts </td>
                        		</tr>
                                        
                                <tr>
                        			<td></td>
                        			<td>Exchange rate mechanism</td>
                        		</tr>
                                        
                                <tr>
                        			<td></td>
                        			<td>International Payment system</td>
                        		</tr>
                                        
                                <tr>
                        			<td></td>
                        			<td>Balance of payment</td>
                        		</tr>
                                        
                                <tr>
                        			<td></td>
                        			<td>Current and Capital account transaction</td>
                        		</tr>
                                        
                                <tr>
                        			<td>3</td>
                        			<td>Export Regulations</td>
                        		</tr>
                                        
                                <tr>
                        			<td></td>
                        			<td>Introduction, Realization/ Repatriation of proceeds of Goods/Software & Services, Manner & Receipt of Payment, Foreign Currency Accounts in India for Exporters, Export of Currency,</td>
                        		</tr>
                                        
                                <tr>
                        			<td>4</td>
                        			<td>Receipt of Advance against Exports</td>
                        		</tr>
                                        
                                <tr>
                        			<td></td>
                        			<td>Period for submission of export documents</td>
                        		</tr>
                                        
                                <tr>
                        			<td></td>
                        			<td>Advance remittances received for exports under large turnkey projects.</td>
                        		</tr>
                                        
                                <tr>
                        			<td>5</td>
                        			<td>EDPMS</td>
                        		</tr>
                                        
                                <tr>
                        			<td>6</td>
                        			<td>Import Regulations </td>
                        		</tr>
                                        
                                <tr>
                        			<td></td>
                        			<td>Introduction, General Guidelines, Obligation of Purchaser of Foreign Exchange, Time Limit for settlement of Import Payments, Time limit for Import of Books, Extension of Time, Import of Foreign Exchange, Import of Indian Rupees, Receipt of Import Bills/ Documents by the importer directly from the overseas supplier, by the importer directly from the overseas supplier in case of specified sector, By the Banker directly from the overseas supplier</td>
                        		</tr>
                                        
                                <tr>
                        			<td></td>
                        			<td>Imports  under license </td>
                        		</tr>
                                        
                                <tr>
                        			<td></td>
                        			<td>Evidence of Import, Evidence of Import in lieu of Bill of Entry, Follow up for Evidence of Import Verification & Preservation of Bill of Entries.</td>
                        		</tr>
                                        
                                <tr>
                        			<td></td>
                        			<td>IDPMS  </td>
                        		</tr>
                                        
                                <tr>
                        			<td>7</td>
                        			<td>Types of documents in Trade Finance</td>
                        		</tr>
                                        
                                <tr>
                        			<td></td>
                        			<td>Shipping Bill, SDF/GR/SOFTEX/PP forms, Commercial invoice, Packing list  </td>
                        		</tr>
                                        
                                <tr>
                        			<td></td>
                        			<td>Bill of lading / AWB/HAWB/MAWB, Certificate of origin, Bill of entry etc.</td>
                        		</tr>
                                        
                                <tr>
                        			<td>8</td>
                        			<td>Periodical Returns and Statements submitted to Regulatory bodies</td>
                        		</tr>
                                        
                                <tr>
                        			<td></td>
                        			<td>XOS, BEF, R- Return, Pending export documents against Advance remittances, Statement of unhedged foreign currency exposure ( UFCE )</td>
                        		</tr>
						</tbody>
					</table>                             

						</div>
					</div>
				</td>
				<td width=10% style="text-align:right;">Play</td>
				</tr>
				
				
				<tr>
				<td width=100%>
				<button class="accordion">Module 11 –AI, Blockchain (3 Hr)</button>

					<div class="panel">
					<div class="col-lg-12 col-md-12">

					<table id="customers">
						<tbody>
    						    <tr>
                        			<th>Sr. No.</th>
                        			<th>Topics covered</th>
                        		</tr>
                        		<tr>
                        			<td>1</td>
                        			<td>Introduction to AI Concepts </td>
                        		</tr>
                        		<tr>
                        			<td>2</td>
                        			<td>Machine Learning and Big Data Analytics</td>
                        		</tr>
                        		<tr>
                        			<td>3</td>
                        			<td>Examples of AI & ML in Banking - Use Cases</td>
                        		</tr>
                        		<tr>
                        			<td>4</td>
                        			<td>AI & ML - Opportunities for the Banking Industry - Competitive advantages. </td>
                        		</tr>
                        		<tr>
                        			<td>5</td>
                        			<td>AI & ML - Industry Risks </td>
                        		</tr>
                        		<tr>
                        			<td>6</td>
                        			<td>Case Study - AI & ML in Banking</td>
                        		</tr>
                        		
                        		<tr>
                        			<td>7</td>
                        			<td>Strategic Imperatives - The starting point</td>
                        		</tr>
                        		<tr>
                        			<td>8</td>
                        			<td>Roadmap for Implementation</td>
                        		</tr>
                                        
                                <tr>
                        			<td>9</td>
                        			<td>What is Blockchain?</td>
                        		</tr>
                                        
                                <tr>
                        			<td>10</td>
                        			<td>Examples of Blockchain technology implementation</td>
                        		</tr>
                                        
                                <tr>
                        			<td>11</td>
                        			<td>Blockchain - How it is transforming industries? Benefits to banking industry</td>
                        		</tr>
                                        
                                <tr>
                        			<td>12</td>
                        			<td>Blockchain - Risks for the Banking and Finance Industry?</td>
                        		</tr>
                                        
                                <tr>
                        			<td>13</td>
                        			<td>Case Study - Blockchain in Banking</td>
                        		</tr>
                                <tr>
                        			<td>14/td>
                        			<td>Strategic Imperatives - The starting point</td>
                        		</tr>
                                        
                                <tr>
                        			<td>15</td>
                        			<td>Strategic Imperatives - The starting point</td>
                        		</tr>
						</tbody>
					</table>                             

						</div>
					</div>
				</td>
				<td width=10% style="text-align:right;">Play</td>
				</tr>
        </tbody>
        </table>    
    </div>

<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  /* margin: 4px 2px; */
  margin-right: auto;
  margin-left: auto;
  cursor: pointer;
  display: block;
  align: center;
  
}
.button2 {width: 50%;}
</style>

<a href="buy_course.php" class="button button2">To get the courses click here</a><br/>











</div>
</div>
</div>
</div>
</div>

<?php include_once 'common/footer.php'; ?> 