  @extends('layouts.dashboard')

  @section('title')
      Store Settings
  @endsection

  @section('content')
  <!-- Content Section -->
   <div
      class="section-content section-dashboard-home"
      data-aos="fade-up"
    >
      <div class="container-fluid">
        <div class="dashboard-heading">
          <h2 class="dashboard-title">Store Settings</h2>
          <p class="dashboard-subtitle">Make store that profitable</p>
        </div>
        <div class="dashboard-content">
          <div class="row">
            <div class="col-12">
              <form action="{{ route('dashboard-settings-redirect', 'dashboard-settings-store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mt-3">
                          <label>Store Name</label>
                          <input
                            name="store_name"
                            value="{{ $user->store_name }}"
                            type="text"
                            class="form-control"
                            placeholder="Enter your store name"
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mt-3">
                          <label>Category</label>
                          <select name="category" class="form-control">
                            <option value="{{ $user->categories_id }}">Tidak diganti</option>
                            @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mt-3">
                          <label>Store Status</label>
                          <p class="text-muted">
                            Apakah saat ini toko Anda buka?
                          </p>
                          <div class="form-check form-check-inline">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="store_status"
                              id="openStoreTrue"
                              value="1"
                              {{ $user->store_status == 1 ? 'checked' : ''}}
                            />
                            <label
                              class="form-check-label"
                              for="openStoreTrue"
                              >Buka</label
                            >
                          </div>
                          <div class="form-check form-check-inline">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="is_store_open"
                              id="openStoreFalse"
                              value="0"
                              {{ $user->store_status == 0 || $user->store_status == NULL ? 'checked' : ''}}
                            />
                            <label
                              class="form-check-label"
                              for="openStoreFalse"
                              >Sementara Tutup</label
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col text-end mt-3">
                        <button
                          type="submit"
                          class="btn btn-success px-5"
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
        </div>
      </div>
   </div>
  @endsection
  