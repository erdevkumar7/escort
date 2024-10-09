  <!-- first section slider start -->

  <div class="slider-section">

      @if ($allescorts->isEmpty())
          <div id="card-carousel" class="owl-carousel pmd-card-carousel outside-dots owl-theme text-center">
              <div class="item">
                  <div class="card pmd-card">
                      <div class="pmd-card-media">
                          <img src="{{ asset('/public/images/static_img/liza.png') }} " width="1184" height="666"
                              class="img-fluid" />
                      </div>

                      <div class="card-body">
                          <h3 class="card-title">Liza<img
                                  src="{{ asset('/public/images/static_img/right-check.png') }}"></h3>
                          <p class="card-text">Geneva</p>
                      </div>

                  </div>
              </div>
              <div class="item">
                  <div class="card pmd-card">
                      <div class="pmd-card-media">
                          <img src="{{ asset('/public/images/static_img/felina.png') }}" class="img-fluid" />
                      </div>

                      <div class="card-body">
                          <h3 class="card-title">Felina</h3>
                          <p class="card-text">Geneva</p>
                      </div>
                  </div>
              </div>
              <div class="item">
                  <div class="card pmd-card">
                      <div class="pmd-card-media">
                          <img src="{{ asset('/public/images/static_img/eva.png') }}" class="img-fluid" />
                      </div>
                      <div class="card-body">
                          <h3 class="card-title">Eva<img src="{{ asset('/public/images/static_img/right-check.png') }}">
                          </h3>
                          <p class="card-text">Geneva</p>
                      </div>
                  </div>
              </div>
              <div class="item">
                  <div class="card pmd-card">
                      <div class="pmd-card-media">
                          <img src="{{ asset('/public/images/static_img/natalia.png') }}" class="img-fluid" />
                      </div>
                      <div class="card-body">
                          <h3 class="card-title">Natalia<img
                                  src="{{ asset('/public/images/static_img/right-check.png') }}"></h3>
                          <p class="card-text">Geneva</p>
                      </div>
                  </div>
              </div>
              <div class="item">
                  <div class="card pmd-card">
                      <div class="pmd-card-media">
                          <img src="{{ asset('/public/images/static_img/alicia.png') }}" class="img-fluid" />
                      </div>

                      <div class="card-body">
                          <h3 class="card-title">Alicia</h3>
                          <p class="card-text">Geneva</p>
                      </div>
                  </div>
              </div>
              <div class="item">
                  <div class="card pmd-card">
                      <div class="pmd-card-media">
                          <img src="{{ asset('/public/images/static_img/liza.png') }}" class="img-fluid" />
                      </div>

                      <div class="card-body">
                          <h3 class="card-title">Liza</h3>
                          <p class="card-text">Geneva</p>
                      </div>
                  </div>
              </div>
              <div class="item">
                  <div class="card pmd-card">
                      <div class="pmd-card-media">
                          <img src="{{ asset('/public/images/static_img/felina.png') }}" class="img-fluid" />
                      </div>

                      <div class="card-body">
                          <h3 class="card-title">Felina</h3>
                          <p class="card-text">Geneva</p>
                      </div>
                  </div>
              </div>
          </div>
      @else
          <div id="card-carousel" class="owl-carousel pmd-card-carousel outside-dots owl-theme text-center">
              @foreach ($allNewActiveEscort as $escort)
                  <div class="item">
                      <div class="card pmd-card">
                          <div class="pmd-card-media">
                              @if ($escort->profile_pic)
                                  <img src="{{ asset('/public/images/profile_img') . '/' . $escort->profile_pic }}"
                                      width="1184" height="666" class="img-fluid" />
                              @else
                                  <img src="{{ asset('/public/images/static_img/default_profile.png') }}"
                                      width="1184" height="666" class="img-fluid" />
                              @endif
                          </div>

                          <div class="card-body">
                              <h3 class="card-title">{{ $escort->nickname }}
                                  @if ($escort->is_certified )
                                  <img src="{{ asset('/public/images/badge_icons'). '/' . $certifiedBadgeDetail->icon}}">
                                      {{-- <img src="{{ asset('/public/images/static_img/right-check.png') }}"> --}}
                                  @endif
                              </h3>
                              <p class="card-text">{{ $escort->city }}</p>
                          </div>

                      </div>
                  </div>
              @endforeach
          </div>
      @endif

  </div>

  <!--first section slider end-->
