<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{ file_exists($category->image)?asset($category->image):asset('images/no_image.png') }});">
    <div class="text px-3 py-1">
        <h2 class="mb-0"><a href="#">{{ $category->name }}</a></h2>
    </div>
</div>
