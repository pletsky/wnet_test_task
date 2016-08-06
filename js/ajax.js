

function loadCustomer(customer) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     $("#customer_info").text(xhttp.responseText);
    }
  };
  xhttp.open("GET", "ajax.php?type=loadCustomer&customer="+customer, true);
  xhttp.send();
}



function loadCustomerJQuery() {

  $("#customer_form").submit(function(e) {

    var url = "ajax.php?type=loadCustomer"; // the script where you handle the form input.

    $.ajax({
           type: "GET",
           url: url,
           data: $("#customer_form").serialize(), // serializes the form's elements.
           success: function(data)
           {
		if ('' == data) {
			$("#customer_info").hide();
			$("#no_customer").show();
		} else {
			$("#no_customer").hide();
			$("#customer_info").show();

//			$("#response").text(data);

			var obj = jQuery.parseJSON(data);
			$("#name_customer").text(obj.name);
			$("#company").text(obj.company);

			$(".newElement").remove();

			for (var key in obj.ar_contracts) {
				$(".contract:first").clone().appendTo("#contract_container");

				$(".contract:last").addClass("newElement");

				$(".number_contract:last").text(obj.ar_contracts[key]['number']);
				$(".date_sign:last").text(obj.ar_contracts[key]['date_sign']);

				for (var serv_key in obj.ar_contracts[key]['ar_services']) {
//alert(serv_key);
//alert(obj.ar_contracts[key]['ar_services'][serv_key]);
					if (serv_key) {
				
						$(".services_name:last").html($(".services_name:last").html() + obj.ar_contracts[key]['ar_services'][serv_key]['title']+' ('+obj.ar_contracts[key]['ar_services'][serv_key]['status']+')'+'<br/>');
					} else {
						$(".services_name:last").html($(".services_name:last").html() + 'Сервисы отсутствуют' + '<br/>');
					}
				}

				$(".contract:last").show();
			}
		}
           }

         });

    e.preventDefault(); // avoid to execute the actual submit of the form.

  });

}
