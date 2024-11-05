<!DOCTYPE html>
<html>
<head>
    <title>Print Check</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            @foreach ($formDataArray as $formData)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text" style="float: right; margin: 10px">{{ $formData['checkNumber'] ?? 'N/A' }}{{ $formData['checkDate'] ?? 'N/A' }}</p>
                        <br>
                        <p class="card-text">{{ $formData['amountInWord'] ?? 'N/A' }}{{ $formData['amountInNumber'] ?? 'N/A' }}</p>
                        <p class="card-text">User: {{ $formData['user'] ?? 'N/A' }}</p>
                        <h5 class="card-title" style="float: right;">{{ $formData['payee'] ?? 'N/A' }}</h5>
                        <p class="card-text">Memo: {{ $formData['memo'] ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
