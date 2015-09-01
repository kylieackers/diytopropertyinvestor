<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package ThemeGrill
 * @subpackage Radiate
 * @since Radiate 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="title_bar">
		<h1>Property Investor Calculator</h1>
		<p>Helping property investors calculate the yeild and return of an investment property with the click of a button</p>
	</div>

	<div class="fieldset_box">
		<fieldset id="purchase costs"> 
			<legend> Property Purchase Costs </legend>
			<div class="input_box">
				<label class="title">Property purchase price: </label>
					<span>&pound
					<input required class="value" type="number" name="purchase_price" id="purchase_price">
					</span>
			</div>

			<div class="input_box">
				<label class="title">Solicitor's Fees: </label>
				&pound <input class="value" type="number" name="solicitor" id="solicitors_fee" >
			</div>

			<div class="input_box">
				<label class="title">Broker's Fees: </label>
				&pound <input class="value" type="number" name="broker" id="brokers_fee" >
			</div>

			<div class="input_box">
				<label class="title">Other Fees: </label>
				&pound <input class="value" type="number" name="other" id="other_fee">
			</div>

			<div class="input_box">
				<label class="title">Renovation Costs: </label>
				&pound <input class="value" type="number" name="renovation" id="renovation">
			</div>

			<div class="input_box">
			<div id=stamp_duty>
				<label class="title">Stamp Duty: </label>
				&pound <input class="value" type="number" id="stamp_duty_calc" name="stamp duty" readonly>
			</div>
			</div>
		</fieldset>	

		<fieldset id="mortgage_details"> 

			<legend> Mortgage Details </legend>

			<div class="radio_box">
				<span class="title">Mortgage or Cash: </span>
				<label><input type="radio" name="leverage" id="mortgage" />&nbspMortgage&nbsp</label>
				<label><input type="radio" name="leverage" id="cash" />&nbspCash</label>
			</div>

			<div id="get_mortgage">

				<div class="input_box">
					<label class="title">Booking Fee: </label>
					&pound <input class="value" type="number" name="booking" id="booking fee" >
				</div>

				<div class="input_box">
					<label class="title">Valuation Fee: </label>
					&pound <input class="value" type="number" name="valuation" id="valuation fee" >
				</div>

				<div class="input_box">
					<label class="title">Arrangement Fee: </label>
					&pound <input class="value" type="number" name="arrangement_fee" id="arrangement fee">
				</div>

				<div id="get_arrange">
					<div class="input_box">
						<label class="title">Arrangement Years: </label>
						&nbsp&nbsp <input class="value" type="number" name="arrangement years" id="arrangement years">
					</div>

					<div class="radio_box">
						<span class="title">Add arrangement fee to mortgage?: </span>
						<label><input type="radio" name="add" id="yes" />&nbspYes&nbsp</label>
						<label><input type="radio" name="add" id="no" />&nbspNo</label>
					</div>
				</div>

				<div class="input_box">
					<label class="title">Interest Rate %: </label>
					<input type="number" name="interest rate" id="interest rate">
				</div>
	
				<div class="input_box">
					<label class="title">Loan To Value %: </label>
					<input type="number" name="ltv" id="ltv">
				</div>
	
				<div class="input_box">
					<label class="title">Loan Term (years): </label>
					<input class="value" type="number" name="loan_term" id="loan_term" >
				</div>

				<div class="radio_box">
					<span class="title">Mortgage Type: </span>
					<label><input type="radio" name="m_type" id="interest" />&nbspInterest&nbsp</label>
					<label><input type="radio" name="m_type" id="repayment" />&nbspRepayment</label>
				</div>
	
				<div id="morg_output">
					<div class="input_box">
						<label class="title">Deposit: </label> 
						&pound <input class="value" type="number" id="deposit_calc" readonly>
					</div>

					<div class="input_box">
						<label class="title">Loan Amount: </label> 
						&pound <input class="value" type="number" id="loan_calc" readonly> 
					</div>
				</div>

				<div id="morg_pay">
					<label class="title">Monthly Mortgage Repayment: </label> 
					&pound <input class="value" type="number" id="morg_calc" readonly>
				</div>
			</div>
		</fieldset>	

		<fieldset id="total_investment"> 
			<legend>Total Investment </legend>
			&pound <input type="number" id="total_invested_calc" name="total_invest" readonly>
		</fieldset>	
	</div>

	<div class="fieldset_box">
		<fieldset id="rental_details"> 
			<legend> Rental Details </legend>
			<div class="radio_box">
				<span class="title">Single Let or HMO?</span>
				<label><input type="radio" name="let_type" id="single" />&nbspSingle Let&nbsp</label>
				<label><input type="radio" name="let_type" id="hmo" />&nbspHMO</label>
			</div>
			<div id="get_hmo">
				<div class="input_box">
					<label class="title">Number of Rooms: </label>
					<input class="value" type="number" name="nr_rooms" id="nr_rooms">
				</div>

				<div class="input_box">
					<label class="title">Room Rent: </label>
					&pound <input class="value" type="number" name="room rent" id="room rent">
				</div>

				<div id="get_hmo_rent">
					<label class="title">Monthly Rent: </label>
					&pound <input type="number" name="hmo monthly rent" id="hmo_monthly_calc" readonly>
				</div>
			</div>
			<div id="get_single" >
				<label class="title">Monthly Rent: </label>
				&pound <input type="number" name="monthly rent" id="monthly rent">
			</div>

		</fieldset>	

		<fieldset id="total_income"> 
			<legend> Total Annual Income </legend>
			&pound <input type="number" id="total_income_calc" name="total_in" readonly>
		</fieldset>	
	</div>

	<div class="fieldset_box">
		<fieldset id="running_costs"> 
			<legend> Running Costs </legend>
			
			<div class="input_box">
				<label class="title">Annual Service Charge: </label>
				&pound <input type="number" name="service charge" id="service charge">
			</div>

			<div class="input_box">
				<label class="title">Annual Ground Rent: </label>
				&pound <input type="number" name="ground rent" id="ground rent">
			</div>

			<div class="input_box">
				<label class="title">Annual Insurance Costs: </label>
				&pound <input type="number" name="insurance" id="insurance">
			</div>

			<div class="input_box">
				<label class="title">Management Fee %: </label>
				<input type="number" name="management pct" id="management pct">
			</div>

			<div class="input_box">
				<label class="title">Repairs Contingency %: </label>
				<input type="number" name="maintenance pct" id="maintenance pct">
			</div>

			<div class="input_box">
				<label class="title">Other Costs: </label>
				&pound <input type="number" name="other costs" id="other costs">
			</div>

			<div id="man_calc">
				<label class="title">Annual Management Fee: </label> 
				&pound <input type="number" id="management_fee_calc" readonly>
			</div>

			<div id="repair_calc">
				<label class="title">Annual Repair Costs: </label> 
				&pound <input type="number" id="maintenance_cost_calc" readonly>
			</div>

		</fieldset>	

		<fieldset id="total_expenses"> 
			<legend> Total Annual Expenses </legend>
			&pound <input type="number" id="total_expense_calc" readonly>
		</fieldset>	
	</div>

	<div id="investment_figures"> 
		<h1> Investment Figures </h1>
		<div id="output_box">
			<label class="title" >Gross Yield: </label>
			<input type="number" id="gross_yield_calc" readonly>%
		</div>
		<div id="output_box">
			<label class="title" >Net Yield: </label>
			<input type="number" id="net_yield_calc" readonly>%
		</div>
		<div id="output_box">
			<label class="title">Return on Investment (ROI): </label> 
			<input type="number" id="roi_calc" readonly>%
		</div>
	</div>

	<div id="sub">
		<input type="button" value="Calculate!" name="calc" id="calculate" class="button" value="toggle">
		<input type="button" value="Start Over!" name="start" id="start_over" class="button">
	</div>


	<div class="social2">
		<a href="https://twitter.com/share" class="twitter-share-button" data-via="kylieackers" data-size="large">Tweet</a>
		<script>
			!function(d,s,id){
				var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
				if(!d.getElementById(id)){
					js=d.createElement(s);
					js.id=id;js.src=p+'://platform.twitter.com/widgets.js';
					fjs.parentNode.insertBefore(js,fjs);
				}}
				(document, 'script', 'twitter-wjs');
		</script>
	<?php edit_post_link( __( 'Edit', 'radiate' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
	</div> <!-- .social2 -->
</article><!-- #post-## -->
