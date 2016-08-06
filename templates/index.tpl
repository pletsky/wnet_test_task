<%include:header%>

<form id="customer_form">
  <input type="text" id="customer" name="customer"><br/>
  <%get_status_checkboxes:%>
  <input type="submit" value="Go!">
</form>


<div id="no_customer" style="display:none">Нет такого клиента</div>
<div id="customer_info" style="display:none"><%include:customer_info%></div>
<div id="response"></div>


<script type="text/javascript">
  loadCustomerAjax();
</script>

<%include:footer%>
