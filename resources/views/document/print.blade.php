<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">

</head>
<body>

<div class="container">
  <h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>{{ $referral_name }}</th>
        
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
</div>
<div class="card">
  <div class="card-header">
      <h5>Laravel Signature Pad Tutorial Example</h5>
  </div>
  <div class="card-body">
      <form method="POST" action="{{ route('signaturepad.upload') }}">
          <!-- Signature Pad will be here -->
          <div id="signature-pad">
              <canvas id="signature-canvas"></canvas>
              <button id="clear">Clear</button>
              <input type="hidden" id="signature64" name="signature64">
          </div>
          <button type="submit">Submit</button>
          @csrf
      </form>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        var canvas = document.getElementById('signature-canvas');
        var signaturePad = new SignaturePad(canvas, {
            backgroundColor: '#f2f2f2', // Set your desired background color
            penColor: '#000000' // Set the pen color
        });

        $('#clear').click(function(e) {
            e.preventDefault();
            signaturePad.clear();
            $("#signature64").val('');
        });

        $("form").submit(function(e) {
            // Store the signature image in a hidden field
            $("#signature64").val(signaturePad.toDataURL());

            // Prevent the form submission for demonstration purposes
            e.preventDefault();

            // You can remove the following line once you're ready to submit the form
            alert("Signature image data:\n\n" + $("#signature64").val());
        });
    });
</script>
</body>
</html>

