  @extends('layouts.dashboard')

  @section('title')
      Store Dashboard Product Add
  @endsection

  @section('content')
    <!-- Section Content -->
    <div
      class="section-content section-dashboard-home"
      data-aos="fade-up"
    >
      <div class="container-fluid">
        <div class="dashboard-heading">
          <h2 class="dashboard-title">Create New Product</h2>
          <p class="dashboard-subtitle">Create your own product</p>
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
              <form action="{{ route('dashboard-product-store') }}" method="POST" enctype="multipart/form-data">
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
                            placeholder="Enter your product name"
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
                            placeholder="Enter your product price"
                          />
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="mt-3">
                          <label>Category</label>
                          <select name="categories_id" class="form-control">
                            @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="mt-3">
                          <label>Description</label>
                          <textarea name="description" id="editor"></textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="mt-3">
                          <label>Thumbnails</label>
                          <input name="photo" type="file" class="form-control" />
                          <p class="text-muted">
                            Kamu dapat memilih lebih dari satu file
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col text-end mt-3">
                        <button
                          type="submit"
                          class="btn btn-success px-5 w-100"
                        >
                          Create Product
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection
  @pushOnce('addon-script')
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
  