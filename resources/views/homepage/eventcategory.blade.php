<x-user-layout>

    <x-slot name='title'>Evento - Category</x-slot>

    <x-slot name='main'> 
<main id="main">
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Explore Category</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section-news section-t4 section-b4 mt-4 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title-wrap d-flex justify-content-between">
                        <div class="title-box">
                            <h2 class="title-a">Featured Category</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div id="" class="category-section">
                <div class="row">
                      {{-- Different Category --}}
                      @foreach($categories as $category)
                      <div class="carousel-item-c col-lg-3 col-md-6 col-sm-6">
                          <div class="card-box-b card-shadow news-box radius-10">
                              <div class="img-box-b">
                                  <img src="{{ asset('storage/admin/category/'. $category->category_image) }}" alt="" class="img-b img-fluid">
                              </div>
                              <div class="card-overlay">
                                  <div class="card-header-b">
                                      <div class="card-title-b">
                                          <h2 class="title-2">
                                              <a href="{{ url('category/' . $category->category_name) }}">{{ $category->category_name }}</a>
                                          </h2>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      @endforeach

                  </div>
              </div>
          </div>
        </section>
    </main>
    </x-slot>
</x-user-layout>