jQuery(function($) {

	var purchase =0;
	var stampduty = 0;
	var totalPurchase = 0;
	var solicitor = 0;
	var broker = 0;
	var other = 0;
	var renovation = 0;
	var booking = 0;
	var valuation = 0;
	var afee = 0;
	var afeeYears = 0;
	var ltvRate = 0;
	var deposit = 0;
	var loan = 0;
	var nrYears = 0;
	var interestRate = 0;
	var morgPayment = 0;
	var singleMonthly = 0;
	var hmoRoomRent = 0;
	var hmoNoRooms = 0;
	var hmoMonthly = 0;
	var serviceCharge = 0;
	var groundRent = 0;
	var insurance = 0;
	var manageRate = 0;
	var manageCost = 0;
	var maintRate = 0;
	var maintCost = 0;
	var otherCharge = 0;
	var gross = 0;
	var net = 0;
	var roi = 0;

	function calculate_stamp_duty(){

		if (purchase < 125000) 
				{ stampduty = 0; }
		else if (purchase > 125000 && purchase <= 250000)
				{stampduty = (purchase-125000)*.02; }
		else if (purchase > 250000 && purchase <= 925000) 
				{stampduty = (125000*0.02) + (purchase-250000)*0.05; }
		else if (purchase > 925000 && purchase <= 1500000)
				{stampduty = (125000*0.02)+(675000*0.05)+(purchase-925000)*0.1; }
		else if (purchase > 1500000)
				{stampduty = (125000*0.02)+(675000*0.05)+(575000*0.1)+(purchase-1500000)*0.12; }

		if (stampduty > 0) {
		  $('#stamp-duty-calc').val(stampduty);
		  $('#stamp-duty').show();
		}
		else {
			$('#stamp-duty').hide();
		};
	}

	function calculate_loan_deposit() {
		deposit=purchase * ((100-ltvRate)/100); 
		loan=(purchase*1)-(deposit*1);
		if ( $('#yes').is(':checked') ) {
			loan = loan*1 + (afee*afeeYears); 
		};
		$('#deposit-calc').val(deposit);
		$('#loan-calc').val(loan);
		$('#morg-output').show();
	}

	function calculate_morg_repayment() {
		var morgTop = 0;
		var morgBottom = 0;
		var intRateFloat = 0;
		intRateFloat=interestRate/12/100

		if ( (purchase > 0) && (interestRate > 0) && (nrYears > 0) ) {
			if ( $('#interest').is(':checked')){	
				morgPayment=loan * interestRate/12/100; 
			}
			else {
				morgTop= loan * intRateFloat * Math.pow(1 + intRateFloat, nrYears*12);
				morgBottom= Math.pow(1 + intRateFloat, nrYears*12) -1;
				morgPayment=morgTop/morgBottom;
			};
			morgPayment=(Math.round(morgPayment*100)/100).toFixed(2);
			$('#morg-calc').val(morgPayment);
			$('#morg-pay').show();
		};
	}

	function calculate_totalPurchase () {
		totalPurchase = (solicitor*1) + (broker*1) + (other*1) + (renovation*1) + (stampduty*1) + (booking*1) + (valuation*1);

		if ( $('#cash').is(':checked')) {
			totalPurchase = totalPurchase + (purchase*1); 
		}
		else {
			totalPurchase = totalPurchase + (deposit*1);
			if ( $('#no').is(':checked') ) {
				totalPurchase = totalPurchase*1 + (afee*afeeYears); };
		};
		$('#total-invested-calc').val(totalPurchase);
		$('#total-investment').show(); 
	}

	function calculate_total_income () {
		if ( $('#hmo').is(':checked') ){
			hmoMonthly = hmoRoomRent*hmoNoRooms;
			$('#hmo-monthly-calc').val(hmoMonthly);
			$('#get-hmo-rent').show();

			totalRent = hmoMonthly * 12;
		}
		else
		{
			totalRent = singleMonthly * 12;
		}
		$('#total-income-calc').val(totalRent);
		$('#total-income').show(); 
	}

	function calculate_total_expense () {
		if ( manageRate > 0 ) {
			manageCost = manageRate/100 * totalRent;
			$('#management-fee-calc').val(manageCost);
			$('#man-calc').show();
		}
		else {
			manageCost = 0;
			$('#management-fee-calc').val(manageCost);
			$('#man-calc').hide();
		};
		if ( maintRate > 0 ) {
			maintCost = maintRate/100 * totalRent;
			$('#maintenance-cost-calc').val(maintCost);
			$('#repair-calc').show();
		}
		else {
			maintCost = 0;
			$('#maintenance-cost-calc').val(maintCost);
			$('#repair-calc').hide();
		};

		totalCosts = morgPayment*12 + serviceCharge*1 + groundRent*1 + insurance*1 + manageCost*1 + maintCost*1 + otherCharge*1;

		$('#total-expense-calc').val(totalCosts);
		$('#total-expenses').show(); 
	}

	function calculate_investment_figures () {

		gross = (totalRent/purchase) * 100;
		gross = (Math.round(gross*100)/100).toFixed(1);
		net = (totalRent-totalCosts)/purchase * 100;
		net = (Math.round(net*100)/100).toFixed(1);
		roi = (totalRent - totalCosts)/totalPurchase * 100;
		roi = (Math.round(roi*100)/100).toFixed(1);

		$('#gross-yield-calc').val(gross);
		$('#net-yield-calc').val(net);
		$('#roi-calc').val(roi);
		$('#investment-figures').show(); 
	}

	function calculate_all() {

		calculate_stamp_duty();
		calculate_loan_deposit();
		calculate_morg_repayment();
		calculate_totalPurchase();
		calculate_total_income();
		calculate_total_expense();
		calculate_investment_figures();
	}


	$('#stamp-duty').hide();
	$('#get-mortgage').hide();
	$('#get-hmo').hide();
	$('#get-hmo-rent').hide();
	$('#get-single').hide();
	$('#morg-output').hide();
	$('#morg-pay').hide();
	$('#man-calc').hide();
	$('#repair-calc').hide();
	$('#start-calc').hide();


	/*  Inputs for Property Purchase Costs */

	$('input[name="purchase-price"]').change(function() {  purchase = $(this).val(); calculate_all(); });
	$('input[name="solicitor"]').change(function(){ solicitor=$(this).val(); calculate_all();  }); 
	$('input[name="broker"]').change(function(){ broker=$(this).val(); calculate_all();  }); 
	$('input[name="other"]').change(function(){ other=$(this).val(); calculate_all();  }); 
	$('input[name="renovation"]').change(function(){ renovation=$(this).val(); calculate_all();  }); 

	/*  Inputs for Mortgage Details*/

	$('#mortgage').click(function(){ $('#get-mortgage').show(); $('#get-cash').hide(); $('#get-arrange').hide(); calculate_all(); });
	$('#cash').click(function(){ $('#get-cash').show; $('#get-mortgage').hide();  calculate_all(); });

	$('#yes').click(function(){ calculate_all(); });
	$('#no').click(function(){ calculate_all(); });

	$('#interest').click(function(){ calculate_all(); });
	$('#repayment').click(function(){ calculate_all(); });

	$('input[name="booking"]').change(function(){ booking=$(this).val(); calculate_all();  }); 
	$('input[name="valuation"]').change(function(){ valuation=$(this).val(); calculate_all();  }); 
	$('input[name="arrangement-fee"]').change(function(){ afee=$(this).val();  $('#get-arrange').show(); calculate_all(); }); 
	$('input[name="arrangement-years"]').change(function(){ afeeYears=$(this).val(); calculate_all();   }); 

	$('input[name="interest-rate"]').change(function(){  interestRate=$(this).val();calculate_all();  });	
	$('input[name="ltv"]').change(function(){  ltvRate=$(this).val(); calculate_all(); }); 
	$('input[name="loan-term"]').change(function(){  nrYears=$(this).val(); calculate_all(); }); 

	/* Inputs for Rental Details */

	$('#single').click(function(){ $('#get-single').show(); $('#get-hmo').hide();  calculate_all(); });
	$('#hmo').click(function(){ $('#get-hmo').show(); $('#get-hmo-rent').hide(); $('#get-single').hide(); calculate_all();  });

	$('input[name="nr-rooms"]').change(function(){  hmoNoRooms=$(this).val(); calculate_all(); }); 
	$('input[name="room-rent"]').change(function(){  hmoRoomRent=$(this).val(); calculate_all(); }); 
	$('input[name="monthly-rent"]').change(function(){  singleMonthly=$(this).val(); calculate_all(); }); 

	/* Inputs for Running Costs*/

	$('input[name="service-charge"]').change(function(){  serviceCharge=$(this).val(); calculate_all(); }); 
	$('input[name="ground-rent"]').change(function(){  groundRent=$(this).val(); calculate_all(); }); 
	$('input[name="insurance"]').change(function(){  insurance=$(this).val(); calculate_all(); }); 
	$('input[name="management-pct"]').change(function(){  manageRate=$(this).val(); calculate_all(); }); 
	$('input[name="maintenance-pct"]').change(function(){  maintRate=$(this).val(); calculate_all(); }); 
	$('input[name="other-costs"]').change(function(){  otherCharge=$(this).val(); calculate_all(); }); 


	$('#calculate').click(function(){ 

		calculate_all();
	});

	$('#start-over').click(function(){ 
		location.reload();
	});

});

