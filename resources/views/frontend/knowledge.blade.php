<x-home-layout>
    <!-- ***** BANNER ***** -->
    <style>
        b {
            color: #ee5586 !important
        }
    </style>
    <div class="top-header">
        <div class="total-grad-inverse"></div>
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="wrapper">
                <div class="heading mb-0">Knowledgebase List</div>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- ***** KNOWLEDGEBASE ***** -->
<section id="gotop" class="blog motpath pb-80 bg-colorstyle">
    <div class="container">
      <div class="row">
        <!-- sidebar -->
        <div class="col-md-12 col-lg-4">
          <aside id="sidebar" class="sidebar mt-80 sec-bg1 bg-seccolorstyle noshadow">
            <div class="menu categories clear">
              <h4 class="mergecolor"><b>Knowledgebase</b></h4>
            </div>
          </aside>
        </div>
        <div class="pt-35 col-md-12 col-lg-8">
          <div id="sidebar_content" class="wrap-blog">
            <div class="row">
              <div class="col-md-12 col-lg-12 knowledge">
                <div id="div3" class="wrapper targetDiv mt-5 bg-seccolorstyle noshadow">
                  <style>p{
                    color: white;
                  }</style>
                  {!! $information->knowledge ?? "" !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** HELP ***** -->
  <x-help />
</x-home-layout>
