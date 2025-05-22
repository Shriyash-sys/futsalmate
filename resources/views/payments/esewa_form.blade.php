<!DOCTYPE html>
<html>

<head>
    <title>Redirecting to eSewa...</title>
</head>

<body>
    <form id="esewaForm" action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
        <input type="hidden" name="amount" value="{{ $amount }}">
        <input type="hidden" name="tax_amount" value="{{ $tax_amount }}">
        <input type="hidden" name="total_amount" value="{{ $total_amount }}">
        <input type="hidden" name="transaction_uuid" value="{{ $transaction_uuid }}">
        <input type="hidden" name="product_code" value="{{ $product_code }}">
        <input type="hidden" name="product_service_charge" value="{{ $product_service_charge }}">
        <input type="hidden" name="product_delivery_charge" value="{{ $product_delivery_charge }}">
        <input type="hidden" name="success_url" value="{{ $success_url }}">
        <input type="hidden" name="failure_url" value="{{ $failure_url }}">
        <input type="hidden" name="signed_field_names" value="{{ $signed_field_names }}">
        <input type="hidden" name="signature" value="{{ $signature }}">
    </form>

    <script>
        document.getElementById('esewaForm').submit();
    </script>
</body>

</html>
