<section class="feature_product_area section_gap">
    <div class="main_box">
        <div class="container-fluid">
            <div class="product">
                <div class="container text-center p-6" style="">
                  <h2 class="h3 my-5 text-lg-center text-md-center text-sm-center" style="font-family: inter;">PRODUK TERBARU</h2>
                </div>
              </div>
            </div>
            <div class="row">

      <!-- PERHATIAKAN BAGIAN INI, LOOPING DATA PRODUK -->
      @forelse($guest as $row)
                <div class="col col1">
                    <div class="f_p_item">
                            <div class="p_icon">
                                <a href="{{ url('/guest/' . $row->slug) }}">
                                    <i class="lnr lnr-cart"></i>
                                </a>
                            </div>
                        </div>
          <!-- KETIKA PRODUK INI DIKLIK MAKA AKAN DIARAHKAN KE URL DIBAWAH -->
          <!-- HANYA SAJA URL TERSEBUT BELUM DISEDIAKAN PADA ARTIKEL KALI INI -->
          <a href="{{ url('/guest/' . $row->slug) }}">
            <!-- TAMPILKAN NAMA PRODUK -->
             <h4>{{ $row->name }}</h4>
                        </a>
                    </div>
                </div>
      @empty

      @endforelse
            </div>

    <!-- GENERATE PAGINATION UNTUK MEMBUAT NAVIGASI DATA SELANJUTNYA JIKA ADA -->
            <div class="row">
                {{ $guest->links() }}
            </div>
        </div>
    </div>
</section>
