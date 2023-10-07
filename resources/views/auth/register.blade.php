@extends('layouts.auth')

@section('content')
<div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center justify-content-center row-login">
        <div class="col-lg-4">
            <h2>
            Memulai untuk jual beli <br />
            dengan cara terbaru
            </h2>
            <form method="POST" action="{{ route('register') }}" class="mt-3">
                @csrf
                <div class="mt-3">
                    <label for="full-name" class="form-label">Full Name</label>
                    <input id="full-name" 
                        type="text" class="form-control @error('name') is-invalid @enderror" 
                        name="name" 
                        value="{{ old('name') }}" 
                        required 
                        autocomplete="name"
                        v-model="name"
                        placeholder="Enter your full name" 
                        autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="email-address" class="form-label">
                        Email Address
                    </label>
                    <input id="email-address" 
                        type="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        @change="checkEmailAvailability()"
                        :class="{ 'is-invalid' : this.email_unavailable }"
                        name="email" 
                        value="{{ old('email') }}" 
                        v-model="email"
                        required 
                        autocomplete="email"
                        placeholder="Enter your email address">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" 
                        type="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        name="password" 
                        required 
                        autocomplete="new-password"
                        placeholder="Enter your password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="password-confirmation" class="form-label">Password Confirmation</label>
                    <input id="password-confirm" 
                        type="password" 
                        class="form-control @error('password_confirmation') is-invalid @enderror" 
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password-confirm"
                        placeholder="Enter your password confirmation">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label>Store</label>
                    <p class="text-muted">Apakah anda juga ingin membuka toko?</p>
                    <div class="form-check form-check-inline">
                    <input
                        class="form-check-input"
                        type="radio"
                        name="is_store_open"
                        id="openStoreTrue"
                        v-model="is_store_open"
                        :value="true"
                    />
                    <label class="form-check-label" for="openStoreTrue"
                        >Iya, boleh.</label
                    >
                    </div>
                    <div class="form-check form-check-inline">
                    <input
                        class="form-check-input"
                        type="radio"
                        name="is_store_open"
                        id="openStoreFalse"
                        v-model="is_store_open"
                        :value="false"
                    />
                    <label class="form-check-label" for="openStoreFalse"
                        >Tidak, terimakasih.</label
                    >
                    </div>
                </div>
                <div class="mt-3" v-if="is_store_open">
                    <label>Nama Toko</label>
                    <input
                        v-model="store_name"
                        id="store_name"
                        class="form-control @error('store_name') is-invalid @enderror" 
                        name="store_name"
                        type="text"
                        placeholder="Enter your shop name"
                        required
                        autocomplete
                        autofocus
                    />
                    @error('store_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mt-3" v-if="is_store_open">
                    <label>Kategori</label>
                    <select name="categories_id" class="form-control">
                        <option value="" selected disabled>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success d-block mt-4 w-100" :disabled="this.email_unavailable"
                    >Sign Up Now
                </button>
                <a href="{{ route('login') }}" class="btn btn-signup d-block mt-2"
                    >Back to Sign In
                </a>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
<div class="container d-none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
    <!--memanggil library vue toasted untuk menampilkan alert-->
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios@1.1.2/dist/axios.min.js"></script>
    <script>
      // memanggil library vue toasted
      Vue.use(Toasted);

      var register = new Vue({
        el: '#register',
        mounted() {
           AOS.init();
        //    this.$toasted.error(
        //     "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
        //     {
        //       position: "top-center",
        //       className: "rounded",
        //       duration: 1000
        //     }
        //    );
        },
        methods: {
            checkEmailAvailability: function(){
                var self = this;

                axios.get('{{ route('api-register-check') }}', {
                    params: {
                        email: this.email
                    }
                })
                .then(function (response) {
                    if(response.data == 'Available'){
                        self.$toasted.show(
                            "Email anda tersedia!",
                            {
                                position: "top-center",
                                className: "rounded",
                                duration: 10000
                            }
                        ); 
                        self.email_unavailable = false;
                    }else{
                        self.$toasted.error(
                            "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
                            {
                                position: "top-center",
                                className: "rounded",
                                duration: 10000
                            }
                        ); 
                        self.email_unavailable = true;
                    }

                    // handle success
                    console.log(response);
                });
            }
        },
        data() {
          return {
                name: "Muhammad Robi Rahman",
                email: "robirahman2310@gmail.com",
                is_store_open: true,
                store_name: "",
                email_unavailable: false
            }
        }
      });
    </script>
@endpush
