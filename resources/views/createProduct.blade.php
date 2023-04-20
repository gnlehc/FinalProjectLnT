<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PT. Meksiko</title>
    <link rel="stylesheet" href="/css/product.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section>
        <div class="prod">
            <h2>Create Product</h2>
            <form id="product" action="/store-product" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="category" class="form-label" style="color: whitesmoke"><b>Category</b></label>
                    <select class="form-select py-20 px-20 bold border-none" aria-label="Default select example" style="border-radius: 2rem" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->categoryName}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="inputname">
                    <div class="input_box">
                        <input type="text" placeholder="Product Name" name="prodName" id="prodName" required>
                        <i class="fa fa-users" style="color: whitesmoke;"></i>
                    </div>
                </div>
                <div class="inputPrice">
                    <div class="input_box">
                        <input type="text" placeholder="Rp. 1.000.000" name="Price" id="Price" required>
                        <i class="fa fa-user icon" style="color: whitesmoke;"></i>
                    </div>
                </div>
                <div class="inputNum">
                    <div class="input_box">
                        <input type="number" placeholder="Total Stock" name="Total" id="Total" required>
                        <i class="fa fa-envelope-o" style="color: whitesmoke;"></i>
                    </div>
                    </div>
                    <div class="relative flex items-center min-h-screen justify-center overflow-hidden">
                            <label class="block mb-4">
                                <span class="sr-only">Choose File</span>
                                <input type="file" name="image" 
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                                @error('image')
                                <div class="alert" role="alert" style="color: palevioletred" >{{ $message }}</div>
                                @enderror
                            </label>
                    </div>
                    <div id="submit">
                        <button onclick="readData()">Post</button>
                    </div>
            </div>
        </form>
        </div>
    </section>
</body>
</html>