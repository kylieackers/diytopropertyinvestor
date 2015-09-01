<?php
/**
 * The template for displaying a single page.
 */
?>
	<article class="calculator-main">

		<div class="calc-header">
			<h1 class="page-title">Property Investor Calculator</h1>
			<p>Helping property investors calculate the yeild and return of an investment property with the click of a button.</p>
		</div>

		<div class="fieldset-box">
			<fieldset class="main-box"> 
				<legend> Property Purchase Costs </legend>
				<div class="input-box">
					<label class="title">Property purchase price: </label>
						<span>&pound
						<input required class="value" type="number" name="purchase-price" id="purchase-price">
						</span>
				</div>

				<div class="input-box">
					<label class="title">Solicitor's Fees: </label>
					&pound <input class="value" type="number" name="solicitor" id="solicitors-fee" >
				</div>

				<div class="input-box">
					<label class="title">Broker's Fees: </label>
					&pound <input class="value" type="number" name="broker" id="brokers-fee" >
				</div>

				<div class="input-box">
					<label class="title">Other Fees: </label>
					&pound <input class="value" type="number" name="other" id="other-fee">
				</div>

				<div class="input-box">
					<label class="title">Renovation Costs: </label>
					&pound <input class="value" type="number" name="renovation" id="renovation">
				</div>

				<div class="input-box" id="stamp-duty">
					<div> 
						<label class="title">Stamp Duty: </label>
						&pound <input class="value" type="number" id="stamp-duty-calc" name="stamp duty" readonly>
					</div>
				</div>
			</fieldset>	

			<fieldset class="main-box"> 

				<legend> Mortgage Details </legend>

				<div class="radio-box">
					<span class="title">Mortgage or Cash: </span>
					<label><input type="radio" name="leverage" id="mortgage" />&nbspMortgage&nbsp</label>
					<label><input type="radio" name="leverage" id="cash" />&nbspCash</label>
				</div>

				<div class="input-box" id="get-mortgage">

					<div class="input-box">
						<label class="title">Booking Fee: </label>
						&pound <input class="value" type="number" name="booking" id="booking-fee" >
					</div>

					<div class="input-box">
						<label class="title">Valuation Fee: </label>
						&pound <input class="value" type="number" name="valuation" id="valuation-fee" >
					</div>

					<div class="input-box">
						<label class="title">Arrangement Fee: </label>
						&pound <input class="value" type="number" name="arrangement-fee" id="arrangement-fee">
					</div>

					<div class="input-box">
						<div class="input-box">
							<label class="title">Arrangement Years: </label>
							&nbsp&nbsp <input class="value" type="number" name="arrangement-years" id="arrangement-years">
						</div>

						<div class="radio-box">
							<span class="title">Add arrangement fee to mortgage?: </span>
							<label><input type="radio" name="add" id="yes" />&nbspYes&nbsp</label>
							<label><input type="radio" name="add" id="no" />&nbspNo</label>
						</div>
					</div>

					<div class="input-box">
						<label class="title">Interest Rate %: </label>
						<input type="number" name="interest-rate" id="interest-rate">
					</div>
	
					<div class="input-box">
						<label class="title">Loan To Value %: </label>
						<input type="number" name="ltv" id="ltv">
					</div>
	
					<div class="input-box">
						<label class="title">Loan Term (years): </label>
						<input class="value" type="number" name="loan-term" id="loan-term" >
					</div>

					<div class="radio-box">
						<span class="title">Mortgage Type: </span>
						<label><input type="radio" name="m-type" id="interest" />&nbspInterest&nbsp</label>
						<label><input type="radio" name="m-type" id="repayment" />&nbspRepayment</label>
					</div>
	
					<div class="input-box">
						<div class="input-box">
							<label class="title">Deposit: </label> 
							&pound <input class="value" type="number" id="deposit-calc" readonly>
						</div>

						<div class="input-box">
							<label class="title">Loan Amount: </label> 
							&pound <input class="value" type="number" id="loan-calc" readonly> 
						</div>
					</div>

					<div class="input-box">
						<label class="title">Mortgage Repayment: </label> 
						&pound <input class="value" type="number" id="morg-calc" readonly>
					</div>
				</div>
			</fieldset>	

			<fieldset class="total"> 
				<legend>Total Investment </legend>
				&pound <input type="number" id="total-invested-calc" name="total-invest" readonly>
			</fieldset>	
		</div>

		<div class="fieldset-box">
			<fieldset class="main-box"> 
				<legend> Rental Details </legend>
				<div class="radio-box">
					<span class="title">Single Let or HMO?</span>
					<label><input type="radio" name="let-type" id="single" />&nbspSingle Let&nbsp</label>
					<label><input type="radio" name="let-type" id="hmo" />&nbspHMO</label>
				</div>
				<div id="get-hmo">
					<div class="input-box">
						<label class="title">Number of Rooms: </label>
						<input class="value" type="number" name="nr-rooms" id="nr-rooms">
					</div>
	
					<div class="input-box">
						<label class="title">Room Rent: </label>
						&pound <input class="value" type="number" name="room-rent" id="room-rent">
					</div>
		
					<div class="input-box" id="get-hmo-rent">
						<label class="title">Monthly Rent: </label>
						&pound <input type="number" name="hmo-monthly-rent" id="hmo-monthly-calc" readonly>
					</div>
				</div>
				<div id="get-single" >
					<label class="title">Monthly Rent: </label>
					&pound <input type="number" name="monthly-rent" id="monthly-rent" >
				</div>
	
			</fieldset>	
			
			<fieldset class="total"> 
				<legend> Total Annual Income </legend>
				&pound <input type="number" id="total-income-calc" name="total-in" readonly>
			</fieldset>	
		</div>

		<div class="fieldset-box">
			<fieldset id="running-costs"> 
				<legend> Running Costs </legend>
			
				<div class="input-box">
					<label class="title">Annual Service Charge: </label>
					&pound <input type="number" name="service-charge" id="service-charge">
				</div>

				<div class="input-box">
					<label class="title">Annual Ground Rent: </label>
					&pound <input type="number" name="ground-rent" id="ground-rent">
				</div>

				<div class="input-box">
					<label class="title">Annual Insurance Costs: </label>
					&pound <input type="number" name="insurance" id="insurance">
				</div>

				<div class="input-box">
					<label class="title">Management Fee %: </label>
					<input type="number" name="management-pct" id="management-pct">
				</div>

				<div class="input-box">
					<label class="title">Repairs Contingency %: </label>
					<input type="number" name="maintenance-pct" id="maintenance-pct">
				</div>

				<div class="input-box">
					<label class="title">Other Costs: </label>
					&pound <input type="number" name="other-costs" id="other-costs">
				</div>

				<div class="input-box" id="man-calc">
					<label class="title">Annual Management Fee: </label> 
					&pound <input type="number" id="management-fee-calc" readonly>
				</div>

				<div class="input-box" id="repair-calc">
					<label class="title">Annual Repair Costs: </label> 
					&pound <input type="number" id="maintenance-cost-calc" readonly>
				</div>

			</fieldset>	

			<fieldset class="total"> 
				<legend> Total Annual Expenses </legend>
				&pound <input type="number" id="total-expense-calc" readonly>
			</fieldset>	
		</div>

		<div class="result-box">
				<h1 class="page-title">Investment Figures</h1>

				<div class="output-box">
					<label class="title" >Gross Yield: </label>
					<div class="percent">
						<input type="number" id="gross-yield-calc" readonly>&#37;
					</div>
				</div>
				<div class="output-box">
					<label class="title" >Net Yield: </label>
					<div class="percent">
						<input type="number" id="net-yield-calc" readonly>&#37;
					</div>
				</div>
				<div class="output-box">
					<label class="title">Return on Investment (ROI): </label> 
					<div class="percent">
						<input type="number" id="roi-calc" readonly>&#37;
					</div>
				</div>
				<div class="button-box">
					<input type="button" value="Calculate!" name="calc" id="calculate" class="button" value="toggle">
					<input type="button" value="Start Over!" name="start" id="start-over" class="button">
				</div>
		</div>



	</article>

