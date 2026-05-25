<x-app-layout>

<link href="https://unpkg.com/cropperjs/dist/cropper.min.css" rel="stylesheet">
<script src="https://unpkg.com/cropperjs/dist/cropper.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>

<div class="p-6">

    <h2 class="text-xl font-bold mb-4">Edit Product</h2>

    <form method="POST"
          action="{{ route('products.update', $product->id) }}"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="text" name="name"
               value="{{ $product->name }}"
               class="border p-2 w-full mb-2">

        <textarea name="description"
                  class="border p-2 w-full mb-2">{{ $product->description }}</textarea>

        <input type="number" name="price"
               value="{{ $product->price }}"
               class="border p-2 w-full mb-2">

        <select name="category_id" class="border p-2 w-full mb-4">
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}"
                    {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>

        <!-- OLD IMAGE -->
        <p class="font-bold mb-2">Current Image</p>
        <img src="{{ asset('uploads/products/'.$product->image) }}"
             style="max-width:150px;" class="mb-3">

        <!-- FILE INPUT -->
        <input type="file"
               id="imageInput"
               name="image"
               accept="image/*"
               class="border p-2 w-full mb-4">

        <!-- CROPPER -->
        <img id="cropImage" style="max-width:2px; height:6px; display:none;">

        <!-- PREVIEW -->
        <img id="preview" style="max-width:200px; display:none;" class="mb-4">

        <button type="button" id="cropBtn"
                class="bg-green-600 text-white px-3 py-1 mt-2">
            Crop Image
        </button>

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 mt-4 rounded">
            Update Product
        </button>

    </form>
</div>

<script>
let cropper;

const imageInput = document.getElementById('imageInput');
const cropImage = document.getElementById('cropImage');
const cropBtn = document.getElementById('cropBtn');
const preview = document.getElementById('preview');

imageInput.addEventListener('change', function (e) {

    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();

    reader.onload = function (event) {
        cropImage.src = event.target.result;
        cropImage.style.display = 'block';

        cropImage.onload = function () {
            if (cropper) cropper.destroy();

            cropper = new Cropper(cropImage, {
                aspectRatio: 1,
                viewMode: 1,
                autoCropArea: 1
            });
        };
    };

    reader.readAsDataURL(file);
});

cropBtn.addEventListener('click', function () {

    if (!cropper) {
        alert("Pehle image select karo");
        return;
    }

    cropper.getCroppedCanvas({
        width: 500,
        height: 500
    }).toBlob(function (blob) {

        const file = new File([blob], "cropped.png", {
            type: "image/png"
        });

        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);

        imageInput.files = dataTransfer.files;

        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';

        alert("Image cropped successfully!");
    });

});
</script>

</x-app-layout>