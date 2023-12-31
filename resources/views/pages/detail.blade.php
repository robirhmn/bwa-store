  @extends('layouts.app')

  @section('title')
      Store Detail Page
  @endsection

  @section('content')
    <div class="page-content page-details">
      <section
      class="store-breadcrumbs"
      data-aos="fade-down"
      data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                  <a href="{{ route('home') }}">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Product-Details</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="store-gallery" id="gallery">
        <div class="container">
          <div class="row">
          <div class="col-lg-8" data-aos="zoom-in">
            <transition name="slide-fade" mode="out-in">
              <img
                  :src="photos[activePhoto].url"
                  :key="photos[activePhoto].id"
                  class="w-100 main-image"
                  alt=""
              />
            </transition>
          </div>
          <div class="col-lg-2">
            <div class="row">
              <div
                  class="col-3 col-lg-12 mt-2 mt-lg-0"
                  v-for="(photo, index) in photos"
                  :key="photo.id"
                  data-aos="zoom-in"
                  data-aos-delay="100"
              >
                  <a href="#" @click="changeActive(index)">
                    <img
                        :src="photo.url"
                        class="w-100 thumbnail-image"
                        :class="{active: index == activePhoto}"
                        alt=""
                    />
                  </a>
              </div>
            </div>
          </div>
          </div>
        </div>
      </section>
      <div class="store-details-container" data-aos="fade-up">
      <section class="store-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <h1>{{ $product->name }}</h1>
              <div class="owner">By {{ $product->user->store_name }}</div>
              <div class="price">${{ number_format($product->price) }}</div>
            </div>
            <div class="col-lg-2" data-aos="zoom-in">
              @auth
              <form action="{{ route('details-add', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <button
                  type="submit"
                  class="btn btn-success px-4 text-white btn-block mb-3"
                >
                  Add to Cart
                </button>  
              </form>
              @else
                <a
                  href="{{ route('login') }}"
                  class="btn btn-success px-4 text-white btn-block mb-3"
                >
                  Sign In to Add
                </a>     
              @endauth
            </div>
          </div>
        </div>
      </section>
      <section class="store-description">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-8">
              {!! $product->description !!}
            </div>
          </div>
        </div>
      </section>
      <section class="store-review">
        <div class="container">
          <div class="row">
            <div class="col-12 col-lg-8 mt-3 mb-3">
              <h5>Customer Review (3)</h5>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-8">
              <ul class="list-unstyled">
                <li>
                  <div class="d-flex">
                    <div class="flex-shrink-0 person-image-container">
                      <img
                          src="/images/icons-testimonial-1.png"
                          alt="user-testimonial-1"
                          class="me-3 rounded-circle"
                      />
                    </div>
                    <div class="flex-grow-1 ms-3 body-text">
                      <h5 class="mt-2 mb-1">Alejandro Garnacho</h5>
                      I thought it was not good for living room. I really
                      happy to decided buy this product last week now feels
                      like homey.
                    </div>
                  </div>
                </li>
                <li>
                  <div class="d-flex">
                    <div class="flex-shrink-0 person-image-container">
                      <img
                          src="/images/icons-testimonial-2.png"
                          alt="user-testimonial-1"
                          class="me-3 rounded-circle"
                      />
                    </div>
                    <div class="flex-grow-1 ms-3 body-text">
                      <h5 class="mt-2 mb-1">Marcus Rashford</h5>
                      Color is great with the minimalist concept. Even I
                      thought it was made by Cactus industry. I do really
                      satisfied with this.
                    </div>
                  </div>
                </li>
                <li>
                  <div class="d-flex">
                    <div class="flex-shrink-0 person-image-container">
                      <img
                          src="/images/icons-testimonial-3.png"
                          alt="user-testimonial-1"
                          class="me-3 rounded-circle"
                      />
                    </div>
                    <div class="flex-grow-1 ms-3 body-text">
                      <h5 class="mt-2 mb-1">Harry Maguire</h5>
                      When I saw at first, it was really awesome to have with.
                      Just let me know if there is another upcoming product
                      like this.
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
    </div>
    </div>
  @endsection

  @push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
      var gallery = new Vue({
        el: "#gallery",
        mounted() {
          AOS.init();
        },
        data: {
          activePhoto: 0,
          photos: [
            // {
            //   id: 1,
            //   url: "/images/product-details-1.jpg",
            // },
            // {
            //   id: 2,
            //   url: "/images/product-details-2.jpg",
            // },
            // {
            //   id: 3,
            //   url: "/images/product-details-3.jpg",
            // },
            // {
            //   id: 4,
            //   url: "/images/product-details-4.jpg",
            // },
            @foreach($product->galleries as $gallery)
              {
                id: {{ $gallery->id }},
                url: "{{ Storage::url($gallery->photo) }}",
              },
            @endforeach
          ],
        },
        methods: {
          changeActive(id) {
            this.activePhoto = id;
          },
        },
      });
    </script>
  @endpush
  