  @extends('layouts.dashboard')

  @section('title')
      Store Dashboard Product Detail
  @endsection

  @section('content')
    <!-- Section Content -->
    <div
      class="section-content section-dashboard-home"
      data-aos="fade-up"
    >
      <div class="container-fluid">
        <div class="dashboard-heading">
          <h2 class="dashboard-title">Shirup Marzan</h2>
          <p class="dashboard-subtitle">Product Details</p>
        </div>
        <div class="dashboard-content">
          <div class="row">
            <div class="col-12">
              @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
              <form action="{{ route('dashboard-product-update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mt-3">
                          <label>Product Name</label>
                          <input
                            name="name"
                            type="text"
                            class="form-control"
                            value="{{ $product->name }}"
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mt-3">
                          <label>Price</label>
                          <input
                            name="price"
                            type="number"
                            class="form-control"
                            value="{{ $product->price }}"
                          />
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="mt-3">
                          <label>Category</label>
                          <select name="categories_id" class="form-control">
                            <option  value="{{ $product->categories_id }}">
                              Tidak diganti ({{ $product->category->name }})
                            </option>
                            @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="mt-3">
                          <label>Description</label>
                          <textarea name="description" id="editor">{!! $product->description !!}</textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col text-end mt-3">
                        <button
                          type="submit"
                          class="btn btn-success w-100"
                        >
                          Save Now
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    @foreach ($product->galleries as $gallery)
                      <div class="col-md-4 position-relative">
                        <div class="gallery-container">
                          <img
                            src="{{ Storage::url($gallery->photo ?? '') }}"
                            alt=""
                            class="w-100"
                          />
                          <a href="{{ route('dashboard-product-gallery-delete', $gallery->id) }}" class="delete-gallery">
                            <img src="/images/icon-delete.svg" alt="" />
                          </a>
                        </div>
                      </div>
                    @endforeach
                  </div>
                  <div class="row">
                    <div class="col text-end mt-3">
                      <form action="{{ route('dashboard-product-gallery-upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="products_id" value="{{ $product->id }}">
                        <input type="file" name="photo" id="file" style="display: none;" onchange="form.submit()">
                        <button
                          type="button"
                          class="btn btn-secondary w-100"
                          onclick="thisFileUpload()"
                        >
                          Add Photo
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
  @pushOnce('addon-script')
    <script>
      function thisFileUpload(){
        document.getElementById("file").click();
      }
    </script>
    <!-- CK Editor CDN untuk membuat text editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <script>
      ClassicEditor.create(document.querySelector("#editor"))
        .then((editor) => {
          console.log(editor);
        })
        .catch((error) => {
          console.error(error);
        });
    </script>
  @endPushOnce
  