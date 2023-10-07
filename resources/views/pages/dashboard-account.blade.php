  @extends('layouts.dashboard')

  @section('title')
      Store Account
  @endsection

  @section('content')
    <!-- Section Content -->
    <div
      class="section-content section-dashboard-home"
      data-aos="fade-up"
    >
      <div class="container-fluid">
        <div class="dashboard-heading">
          <h2 class="dashboard-title">My Account</h2>
          <p class="dashboard-subtitle">Update your current profile</p>
        </div>
        <div class="dashboard-content">
          <div class="row">
            <div class="col-12">
              <form action="{{ route('dashboard-settings-redirect', 'dashboard-settings-account') }}" method="POST" enctype="multipart/form-data" id="locations">
                @csrf
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div>
                          <label for="name" class="form-label"
                            >Your Name</label
                          >
                          <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            value="{{ $user->name }}"
                            placeholder="Enter your name"
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div>
                          <label for="email" class="form-label"
                            >Your Email</label
                          >
                          <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            value="{{ $user->email }}"
                            placeholder="Enter your email"
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mt-3">
                          <label for="address_one" class="form-label"
                            >Address 1</label
                          >
                          <input
                            type="text"
                            class="form-control"
                            id="address_one"
                            name="address_one"
                            value="{{ $user->address_one }}"
                            placeholder="Enter your address 1"
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mt-3">
                          <label for="address_two" class="form-label"
                            >Address 2</label
                          >
                          <input
                            type="text"
                            class="form-control"
                            id="address_two"
                            name="address_two"
                            value="{{ $user->address_two }}"
                            placeholder="Enter your address 2"
                          />
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="mt-3">
                          <label for="provinces_id" class="form-label">Province</label>
                          <select name="provinces_id" id="provinces_id" class="form-control" v-if="provinces" v-model="provinces_id">
                            <option v-for="province in provinces" :value="province.id">@{{ province.name }}</option>
                          </select>
                          <select v-else class="form-control"></select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="mt-3">
                          <label for="regencies_id" class="form-label">City</label>
                          <select name="regencies_id" id="regencies_id" class="form-control" v-if="regencies" v-model="regencies_id">
                            <option v-for="regency in regencies" :value="regency.id">@{{ regency.name }}</option>
                          </select>
                          <select v-else class="form-control"></select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="mt-3">
                          <label for="zip_code" class="form-label"
                            >Postal Code</label
                          >
                          <input
                            type="text"
                            class="form-control"
                            id="zip_code"
                            name="zip_code"
                            value="{{ $user->zip_code }}"
                            placeholder="Enter your postal code"
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mt-3">
                          <label for="country" class="form-label"
                            >Country</label
                          >
                          <input
                            type="text"
                            class="form-control"
                            id="country"
                            name="country"
                            value="{{ $user->country }}"
                            placeholder="Enter your country"
                          />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mt-3">
                          <label for="phone_number" class="form-label"
                            >Mobile</label
                          >
                          <input
                            type="text"
                            class="form-control"
                            id="phone_number"
                            name="phone_number"
                            value="{{ $user->phone_number }}"
                            placeholder="Enter your phone number"
                          />
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
  @push('addon-script')
  <script src="/vendor/vue/vue.js"></script>
  <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
  <script>
    var locations = new Vue({
      el: "#locations",
      mounted() {
        AOS.init();
        this.getProvincesData();
      },
      data: {
        provinces: null,
        regencies: null,
        provinces_id: null,
        regencies_id: null
      },
      methods: {
        getProvincesData(){
          var self = this;

          axios.get('{{ route('api-provinces') }}')
            .then(function(response){
              self.provinces = response.data;
          });
        },
        getRegenciesData(){
          var self = this;

          axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
            .then(function(response){
              self.regencies = response.data;
          });
        }
      },
      watch: {
        provinces_id: function(val, oldVal){
          this.regencies_id = null;
          this.getRegenciesData();
        }
      }
    });
  </script>
@endpush