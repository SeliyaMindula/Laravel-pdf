<!-- <div>{{ dd($labels) }}</div> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Labels PDF</title>
    <style>
        @page {
            margin: 0cm 0cm;
        }
        body {
            margin-top: 3cm;
            margin-bottom: 2cm;
            font-family: 'Helvetica', sans-serif;
        }
        .page-break {
            page-break-after: always;
        }
        .label-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: start;
            align-items: stretch;
            padding: 1cm;
        }
        .label {
            box-sizing: border-box;
            width: {{ $labels_width }}cm; /* Adjust based on your form input */
            height: {{ $labels_height }}cm; /* Adjust based on your form input */
            border: 1px solid #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0.5cm;
            padding: 10px;
            overflow: hidden;
            page-break-inside: avoid;
        }
        /* Orientation specific styles */
        @if($orientation === 'Landscape')
        body {
            width: 29.7cm;
            height: 21cm;
        }
        @else /* Assuming Portrait */
        body {
            width: 21cm;
            height: 29.7cm;
        }
        @endif
    </style>
</head>
<body>
<div class="label-container">
    @foreach($labels as $label)
        <div class="label">
            <!-- Customize this part with the actual data you want to display -->
            <p>Product Code: {{ $label->product->code }}</p>
            <p>Color: {{ $label->color }}</p>
            <p>Size: {{ $label->size }}</p>
        </div>
        @if($loop->iteration % 10 === 0)
            <div class="page-break"></div>
        @endif
    @endforeach
</div>
</body>
</html>
