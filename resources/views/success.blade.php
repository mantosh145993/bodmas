@extends('front_layouts.master')

@section('content')
<style>
 
    /* Heading styling */
    h3 {
        color: #1f2937;
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }

    p {
        color: #4b5563;
        text-align: center;
        margin-bottom: 30px;
        font-size: 16px;
    }

    /* Table styling */
    .table {
        margin-top: 20px;
    }

    .table th {
        background-color: #f9fafb;
        font-weight: bold;
        color: #1f2937;
    }

    .table th, .table td {
        padding: 12px;
        border: 1px solid #e5e7eb;
    }

    .table td {
        color: #374151;
    }

    /* Button styling */
    .btn-primary {
        display: inline-block;
        margin-top: 20px;
        background-color: #2563eb;
        color: #ffffff;
        padding: 10px 20px;
        border-radius: 5px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
    }

    .btn-primary:hover {
        background-color: #1d4ed8;
    }
</style>

<section>
    <div class="container">
        <h3>Payment Successful!</h3>
        <p>Your payment was successful. Thank you!</p>

        <table class="table table-bordered" id="payment-table">
            <tr>
                <th>Course</th>
                <td>{{ $payment->product_name }}</td>
            </tr>
            <tr>
                <th>Payment ID</th>
                <td>{{ $payment->payment_id }}</td>
            </tr>
            <tr>
                <th>Order ID</th>
                <td>{{ $payment->order_id }}</td>
            </tr>
            <tr>
                <th>Amount</th>
                <td>INR {{ number_format($payment->amount, 2) }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ ucfirst($payment->payment_status) }}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>{{ $payment->created_at->format('d-m-Y H:i:s') }}</td>
            </tr>
        </table>
        <button class="btn btn-primary" onclick="downloadPDF()">Download PDF</button>
        <!-- <a href="#" class="btn btn-primary">Download Receipt</a> -->
    </div>
</section>

<!-- Include jsPDF library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.22/jspdf.plugin.autotable.min.js"></script>
<script>
 function downloadPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    const logoUrl = "{{ asset('assets/img/Logo.jpg') }}";
    doc.addImage(logoUrl, 'JPEG', 10, 10, 50, 20);
    doc.setFontSize(20);
    doc.text("Payment Receipt", 105, 30, null, null, 'center');
    doc.setFontSize(12);
    const table = document.getElementById('payment-table');
    const rows = table.rows;
    let tableData = [];
    for (let i = 0; i < rows.length; i++) {
        const row = rows[i];
        const cells = row.cells;
        tableData.push([cells[0].innerText, cells[1].innerText]); // Store each row data as an array
    }
    doc.autoTable({
        startY: 50,  // Starting Y position for the table (below the title)
        head: [['Details', 'Information']],  // Table header
        body: tableData,  // Table rows
        theme: 'striped',  // Optional: striped rows for better readability
        margin: { top: 10 },
        styles: { fontSize: 12 },  // Set font size for the table
        headStyles: { fillColor: [255, 97, 97] },  // Set background color for header
        alternateRowStyles: { fillColor: [255, 245, 245] },  // Set color for alternate rows
    });
    doc.save('payment_receipt.pdf');
}

</script>
@stop
