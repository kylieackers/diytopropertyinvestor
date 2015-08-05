jQuery(document).ready(function($) {

	var purchase =0;
	var stampduty = 0;
	var total_purchase = 0;
	var solicitor = 0;
	var broker = 0;
	var other = 0;
	var renovation = 0;
	var booking = 0;
	var valuation = 0;
	var afee = 0;
	var afee_years = 0;
	var ltv_rate = 0;
	var deposit = 0;
	var loan = 0;
	var nr_years = 0;
	var interest_rate = 0;
	var morg_payment = 0;
	var single_monthly = 0;
	var hmo_room_rent = 0;
	var hmo_no_rooms = 0;
	var hmo_monthly = 0;
	var service_charge = 0;
	var ground_rent = 0;
	var insurance = 0;
	var manage_rate = 0;
	var manage_cost = 0;
	var maint_rate = 0;
	var maint_cost = 0;
	var other_charge = 0;
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
		  $('#stamp_duty_calc').val(stampduty);
		  $('#stamp_duty').show();
		}
		else {
			$('#stamp_duty').hide();
		};
	}

	function calculate_loan_deposit() {
		deposit=purchase * ((100-ltv_rate)/100); 
		loan=(purchase*1)-(deposit*1);
		if ( $('#yes').is(':checked') ) {
			loan = loan*1 + (afee*afee_years); 
		};
		$('#deposit_calc').val(deposit);
		$('#loan_calc').val(loan);
		$('#morg_output').show();
	}

	function calculate_morg_repayment() {
		var morg_top = 0;
		var morg_bottom = 0;
		var int_rate_float = 0;
		int_rate_float=interest_rate/12/100

		if ( (purchase > 0) && (interest_rate > 0) && (nr_years > 0) ) {
			if ( $('#interest').is(':checked')){	
				morg_payment=loan * interest_rate/12/100; 
			}
			else {
				morg_top= loan * int_rate_float * Math.pow(1 + int_rate_float, nr_years*12);
				morg_bottom= Math.pow(1 + int_rate_float, nr_years*12) -1;
				morg_payment=morg_top/morg_bottom;
			};
			morg_payment=(Math.round(morg_payment*100)/100).toFixed(2);
			$('#morg_calc').val(morg_payment);
			$('#morg_pay').show();
		};
	}

	function calculate_total_purchase () {
		total_purchase = (solicitor*1) + (broker*1) + (other*1) + (renovation*1) + (stampduty*1) + (booking*1) + (valuation*1);

		if ( $('#cash').is(':checked')) {
			total_purchase = total_purchase + (purchase*1); 
		}
		else {
			total_purchase = total_purchase + (deposit*1);
			if ( $('#no').is(':checked') ) {
				total_purchase = total_purchase*1 + (afee*afee_years); };
		};
		$('#total_invested_calc').val(total_purchase);
		$('#total_investment').show(); 
	}

	function calculate_total_income () {
		if ( $('#hmo').is(':checked') ){
			hmo_monthly = hmo_room_rent*hmo_no_rooms;
			$('#hmo_monthly_calc').val(hmo_monthly);
			$('#get_hmo_rent').show();

			total_rent = hmo_monthly * 12;
		}
		else
		{
			total_rent = single_monthly * 12;
		}
		$('#total_income_calc').val(total_rent);
		$('#total_income').show(); 
	}

	function calculate_total_expense () {
		if ( manage_rate > 0 ) {
			manage_cost = manage_rate/100 * total_rent;
			$('#management_fee_calc').val(manage_cost);
			$('#man_calc').show();
		}
		else {
			manage_cost = 0;
			$('#management_fee_calc').val(manage_cost);
			$('#man_calc').hide();
		};
		if ( maint_rate > 0 ) {
			maint_cost = maint_rate/100 * total_rent;
			$('#maintenance_cost_calc').val(maint_cost);
			$('#repair_calc').show();
		}
		else {
			maint_cost = 0;
			$('#maintenance_cost_calc').val(maint_cost);
			$('#repair_calc').hide();
		};

		total_costs = morg_payment*12 + service_charge*1 + ground_rent*1 + insurance*1 + manage_cost*1 + maint_cost*1 + other_charge*1;

		$('#total_expense_calc').val(total_costs);
		$('#total_expenses').show(); 
	}

	function calculate_investment_figures () {

		gross = (total_rent/purchase) * 100;
		gross = (Math.round(gross*100)/100).toFixed(1);
		net = (total_rent-total_costs)/purchase * 100;
		net = (Math.round(net*100)/100).toFixed(1);
		roi = (total_rent - total_costs)/total_purchase * 100;
		roi = (Math.round(roi*100)/100).toFixed(1);

		$('#gross_yield_calc').val(gross);
		$('#net_yield_calc').val(net);
		$('#roi_calc').val(roi);
		$('#investment_figures').show(); 
	}

	function calculate_all() {

		calculate_stamp_duty();
		calculate_loan_deposit();
		calculate_morg_repayment();
		calculate_total_purchase();
		calculate_total_income();
		calculate_total_expense();
		calculate_investment_figures();
	}

	function header_image_effect() {
		var scrollPosition = jQuery(window).scrollTop();
		jQuery('#parallax-bg').css('top', (0 - (scrollPosition * .2)) + 'px');
	}	


	
	if( radiateScriptParam.radiate_image_link == ''){
		var divheight = jQuery('.header-wrap').height()+'px';
		jQuery('body').css({ "margin-top": divheight });
	}

	jQuery(".header-search-icon").click(function(){
		jQuery("#masthead .search-form").toggle('slow');
	});
		
	jQuery(window).bind('scroll', function(e) {
		//header_image_effect();
	});


	$('#get_mortgage').hide();
	$('#get_hmo').hide();
	$('#get_hmo_rent').hide();
	$('#get_single').hide();
	$('#stamp_duty').hide();
	$('#morg_output').hide();
	$('#morg_pay').hide();
	$('#man_calc').hide();
	$('#repair_calc').hide();
	$('#start_calc').hide();


	/*  Inputs for Property Purchase Costs */

	$('input[name="purchase_price"]').change(function() {  purchase = $(this).val(); calculate_all(); });
	$('input[name="solicitor"]').change(function(){ solicitor=$(this).val(); calculate_all();  }); 
	$('input[name="broker"]').change(function(){ broker=$(this).val(); calculate_all();  }); 
	$('input[name="other"]').change(function(){ other=$(this).val(); calculate_all();  }); 
	$('input[name="renovation"]').change(function(){ renovation=$(this).val(); calculate_all();  }); 

	/*  Inputs for Mortgage Details*/

	$('#mortgage').click(function(){ $('#get_mortgage').show(); $('#get_cash').hide(); $('#get_arrange').hide(); calculate_all(); });
	$('#cash').click(function(){ $('#get_cash').show; $('#get_mortgage').hide();  calculate_all(); });

	$('#yes').click(function(){ calculate_all(); });
	$('#no').click(function(){ calculate_all(); });

	$('#interest').click(function(){ calculate_all(); });
	$('#repayment').click(function(){ calculate_all(); });

	$('input[name="booking"]').change(function(){ booking=$(this).val(); calculate_all();  }); 
	$('input[name="valuation"]').change(function(){ valuation=$(this).val(); calculate_all();  }); 
	$('input[name="arrangement_fee"]').change(function(){ afee=$(this).val();  $('#get_arrange').show(); calculate_all(); }); 
	$('input[name="arrangement years"]').change(function(){ afee_years=$(this).val(); calculate_all();   }); 

	$('input[name="interest rate"]').change(function(){  interest_rate=$(this).val();calculate_all();  });	
	$('input[name="ltv"]').change(function(){  ltv_rate=$(this).val(); calculate_all(); }); 
	$('input[name="loan_term"]').change(function(){  nr_years=$(this).val(); calculate_all(); }); 

	/* Inputs for Rental Details */

	$('#single').click(function(){ $('#get_single').show(); $('#get_hmo').hide();  calculate_all(); });
	$('#hmo').click(function(){ $('#get_hmo').show(); $('#get_hmo_rent').hide(); $('#get_single').hide(); calculate_all();  });

	$('input[name="nr_rooms"]').change(function(){  hmo_no_rooms=$(this).val(); calculate_all(); }); 
	$('input[name="room rent"]').change(function(){  hmo_room_rent=$(this).val(); calculate_all(); }); 
	$('input[name="monthly rent"]').change(function(){  single_monthly=$(this).val(); calculate_all(); }); 

	/* Inputs for Running Costs*/

	$('input[name="service charge"]').change(function(){  service_charge=$(this).val(); calculate_all(); }); 
	$('input[name="ground rent"]').change(function(){  ground_rent=$(this).val(); calculate_all(); }); 
	$('input[name="insurance"]').change(function(){  insurance=$(this).val(); calculate_all(); }); 
	$('input[name="management pct"]').change(function(){  manage_rate=$(this).val(); calculate_all(); }); 
	$('input[name="maintenance pct"]').change(function(){  maint_rate=$(this).val(); calculate_all(); }); 
	$('input[name="other costs"]').change(function(){  other_charge=$(this).val(); calculate_all(); }); 


	$('#calculate').click(function(){ 

		calculate_all();
	});

	$('#start_over').click(function(){ 
		location.reload();
	});

});

