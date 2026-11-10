  <!-- Footer-->
  <footer class="bg-dark py-4 mt-auto">
      <div class="container px-5">
          <div class="row align-items-center justify-content-between flex-column flex-sm-row">
              <div class="col-auto">
                  <div class="small m-0 text-white">Hak Cipta &copy; <a href="{{ config_item('website') }}" style="text-decoration: none; color: white" rel="noopener noreferrer" target="_blank">{{ config_item('nama_lembaga') }}</a> {{ date('Y') }}</div>
              </div>
              <div class="col-auto">
                  <div class="small m-0 text-white">{{ $moduleJson['name'] ?? '' }} v{{ $moduleJson['version'] ?? '' }}</div>
              </div>
          </div>
      </div>
  </footer>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
      document.addEventListener("DOMContentLoaded", function() {


          /////// Prevent closing from click inside dropdown
          document.querySelectorAll('.dropdown-menu').forEach(function(element) {
              element.addEventListener('click', function(e) {
                  e.stopPropagation();
              });
          })



          // make it as accordion for smaller screens
          if (window.innerWidth < 992) {

              // close all inner dropdowns when parent is closed
              document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown) {
                  everydropdown.addEventListener('hidden.bs.dropdown', function() {
                      // after dropdown is hidden, then find all submenus
                      this.querySelectorAll('.submenu').forEach(function(everysubmenu) {
                          // hide every submenu as well
                          everysubmenu.style.display = 'none';
                      });
                  })
              });

              document.querySelectorAll('.dropdown-menu a').forEach(function(element) {
                  element.addEventListener('click', function(e) {

                      let nextEl = this.nextElementSibling;
                      if (nextEl && nextEl.classList.contains('submenu')) {
                          // prevent opening link if link needs to open dropdown
                          e.preventDefault();
                          console.log(nextEl);
                          if (nextEl.style.display == 'block') {
                              nextEl.style.display = 'none';
                          } else {
                              nextEl.style.display = 'block';
                          }

                      }
                  });
              })
          }
          // end if innerWidth

      });
  </script>
