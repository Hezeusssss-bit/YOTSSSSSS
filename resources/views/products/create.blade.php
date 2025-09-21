<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Product</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        min-height: 100vh;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .container {
        background: #fff;
        border-radius: 20px;
        padding: 30px;
        width: 400px;
        max-width: 100%;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        position: relative;
        overflow: hidden;
    }

    .container::before {
        content: "";
        position: absolute;
        top: -40%;
        left: -40%;
        width: 180%;
        height: 180%;
        background: radial-gradient(circle at 30% 30%, #42a5f5, transparent 40%);
        opacity: 0.15;
        animation: rotateGrad 8s linear infinite;
        border-radius: 50%;
        pointer-events: none;
    }

    @keyframes rotateGrad {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    label {
        display: block;
        margin-bottom: 6px;
        color: #555;
        font-weight: bold;
    }

    input[type="text"] {
        width: 93%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 10px;
        margin-bottom: 5px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    input[type="text"]:focus {
        border-color: #1976d2;
        box-shadow: 0 0 10px rgba(25, 118, 210, 0.3);
        outline: none;
    }

    /* Inline error inside input field */
    .error-message {
        color: #842029;
        font-size: 12px;
        margin-bottom: 10px;
    }

    input[type="submit"] {
        width: 100%;
        background: linear-gradient(135deg, #1976d2, #42a5f5);
        border: none;
        color: white;
        padding: 12px;
        border-radius: 12px;
        cursor: pointer;
        font-weight: bold;
        transition: all 0.3s ease;
        margin-top: 10px;
    }

    input[type="submit"]:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }

    .return-btn {
        text-align: center;
        margin-top: 20px;
    }

    .return-btn a {
        display: inline-block;
        background: #ff9800;
        color: #fff;
        padding: 10px 16px;
        border-radius: 12px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .return-btn a:hover {
        background: #fb8c00;
        transform: scale(1.05);
    }
</style>
</head>
<body>
<div class="container">
    <h1>Create a New Product</h1>

    <form method="post" action="{{ route('product.store') }}">
        @csrf

        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Product name" value="{{ old('name') }}" />
            @error('name')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>Quantity</label>
            <input type="text" name="qty" placeholder="Quantity" value="{{ old('qty') }}" />
            @error('qty')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>Price</label>
            <input type="text" name="price" placeholder="Price" value="{{ old('price') }}" />
            @error('price')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>Description</label>
            <input type="text" name="description" placeholder="Description" value="{{ old('description') }}" />
            @error('description')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <input type="submit" value="Save New Product" />
        </div>
    </form>

    <div class="return-btn">
        <a href="{{ route('product.index') }}">← Return to Product List</a>
    </div>
</div>
</body>
</html>
