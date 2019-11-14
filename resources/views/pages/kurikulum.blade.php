@extends('layouts.app')  

@section('content')
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
  
     
    

      <div class="container">
        <div class="row" style="padding-top: 100px">
          <div class="col-md-12 mt-lg-5 text-center">
              <h1 class="mb-5" data-aos="fade-up" style="font-family: 'Courier New', Courier, monospace">Semester {{ $semester }}</h1>
              <table class="table table-striped table-bordered" data-aos="fade-up">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">SKS</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $i = 1;
                      $sks = 0;
                  @endphp
                  @foreach ($kurikulums as $kurikulum)
                    <tr>
                      <th scope="row">{{ $i++ }}</th>
                      <td>{{ $kurikulum->code }}</td>
                      <td>{{ $kurikulum->name }}</td>
                      <td>{{ $kurikulum->sks }}</td>
                    </tr> 
                    @php
                        $sks = $sks + $kurikulum->sks;
                    @endphp
                  @endforeach
                    <tr>
                      <td colspan="3">Total SKS</td>
                      <td>{{ $sks }}</td>
                    </tr>
                </tbody>
              </table>
          </div>
        </div>      
      </div>
    

    </div>  
    
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-5">
                <h2 class="footer-heading mb-4">About Us</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque facere laudantium magnam voluptatum autem. Amet aliquid nesciunt veritatis aliquam.</p>
              </div>
              <div class="col-md-3 ml-auto">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#about-section" class="smoothscroll">About Us</a></li>
                  <li><a href="#contact-section" class="smoothscroll">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-md-3">
                <h2 class="footer-heading mb-4">Follow Us</h2>
                <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
            <form action="#" method="post" class="footer-subscribe">
              <div class="input-group mb-3">
                <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary text-black" type="button" id="button-addon2">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Teknik Komputer Sekolah Vokasi IPB | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        
            </div>
          </div>
          
        </div>
      </div>
    </footer>

  </div> <!-- .site-wrap -->

  @push('changeBackground')
    <script>
        window.onload = function () {
        //document.body.style.backgroundColor = "#808080";
        }
    </script>
      
  @endpush

@endsection
