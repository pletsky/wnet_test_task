		<table border="0" cellspacing="2" cellpadding="2">
			<tr>
 				 <td colspan=2><h1>информация про клиента</h1></td>
 			 </tr>
 			 <tr>
 				<td>название клиента</td>
				<td id="name_customer"><%:name_customer%></td>
 			 </tr>
 			 <tr>
 				<td>компания</td>
 				<td id="company"><%:company%></td>
 			 </tr>
			<tr>
				<td colspan=2 id="contract_container">
				<table class="contract" border="0" cellspacing="2" cellpadding="2" style="display:none">
					<tr>
						<td colspan=2><h2>информация про договор</h2></td>
					</tr>
					<tr>
 						<td>номер договора</td>
 						<td class="number_contract"><%:number%></td>
 					</tr>
 					<tr>
 						<td>дата подписания</td>
 						<td class="date_sign"><%:date_sign%></td>
	 				</tr>
					<tr>
 						<td colspan=2><h3>информация про сервисы</h3></td>
						<!-- в services_name вывести название сервисов через <br> --> 
					</tr>
					<tr>
						<td class="services_name" colspan=2><%:services_name%></td>
					</tr>
				</table>
				</td>
			</tr>
		</table>
